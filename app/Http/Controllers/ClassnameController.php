<?php

namespace App\Http\Controllers;

use App\Models\Academicsession;
use App\Models\Classname;
use App\Models\Result;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class ClassnameController extends Controller
{
    public function addclass (){

        return view('dashboard.admin.addclass');
    }

    public function createclasses (Request $request){
        $request->validate([
            'classname' => ['required', 'string', 'max:255'],
            'section' => ['required', 'string', 'max:255'],
            
        ]);
        $addclasses = new Classname();
        $addclasses->classname = $request->classname;
        $addclasses->section = $request->section;
       
        $addclasses->save();

        return redirect()->back()->with('success', 'you have added successfully');
    }

    public function viewclassestables(){
        $view_clesses = Classname::orderBy('created_at', 'ASC')->get();
        return view('dashboard.admin.viewclassestables', compact('view_clesses'));
    }

    public function editclasses($id){
        $edit_clesses = Classname::find($id);
        return view('dashboard.admin.editclasses', compact('edit_clesses'));
    }
    
    public function updateclass (Request $request, $id){
        $edit_clesses = Classname::find($id);
        $request->validate([
            'classname' => ['required', 'string', 'max:255'],
            'section' => ['required', 'string', 'max:255'],
            
        ]);

        $edit_clesses->classname = $request->classname;
        $edit_clesses->section = $request->section;

        $edit_clesses->update();

        return redirect()->back()->with('success', 'you have added successfully');
    }

    public function classesdelete($id){
        $classdelted = Classname::where('id', $id)->delete();
        return redirect()->back()->with('success', 'you have approved successfully');
    }

    public function classrooms($classname){
        $view_classstudents = Classname::where('classname', $classname)->first();
        $view_classstudents = user::where('classname', $classname)->where('role', 'student')
        ->where('section', 'Primary')->get();

        $view_student_abujas = Classname::where('classname', $classname)->first();
        $view_student_abujas = user::where('classname', $classname)->where('role', 'student')
        ->where('section', 'Secondary')->get();

        $view_classes = Classname::all();
    



        return view('dashboard.admin.classrooms', compact('view_classes', 'view_student_abujas', 'view_classstudents'));
    }

    


    public function printregclass($classname){
        $print_studentclasses = Classname::where('classname', $classname)->first();
        $print_studentclasses = user::where('classname', $classname)
        ->where('status', null)
        ->where('section', 'Primary')->get();

        return view('dashboard.admin.printregclass', compact('print_studentclasses'));
    }


    public function classes($classname){
        $view_classes = Classname::where('classname', $classname)->first();
        $view_classes = user::where('classname', $classname)
        ->where('status', null)->get();
        return view('dashboard.classes', compact('view_classes'));
    }

    public function classpayments($classname){
        $view_classes = Classname::where('classname', $classname)->first();
        $view_classes = Transaction::where('classname', $classname)->get();
        return view('dashboard.account.classpayments', compact('view_classes'));
    }
   

    

    public function classpaymentad($classname){
        $view_classes = Classname::where('classname', $classname)->first();
        $view_classes = Transaction::where('classname', $classname)->get();
        return view('dashboard.admin.classpaymentad', compact('view_classes'));
    }

    public function addresultsad($classname){
        $view_addresults = Classname::where('classname', $classname)->first();
        $view_addresults = User::where('classname', $classname)->where('role', 'student')->latest()->get();
        return view('dashboard.admin.addresultsad', compact('view_addresults'));
    }

    public function viewclassresults($classname){
        $view_addresults = Classname::where('classname', $classname)->first();
        $view_addresults = Result::where('classname', $classname)->latest()->get();
        
        return view('dashboard.admin.viewclassresults', compact('view_addresults'));
    }

    public function addresultinclass($classname){
        $view_studentsclassresults = Classname::where('classname', $classname)->first();
        $view_studentsclassresults = User::where('classname', $classname)->where('role', 'student')->latest()->get();
        return view('dashboard.addresultinclass', compact('view_studentsclassresults'));
    }
    
    public function highschoolresult($classname){
        $view_studentstermresults = Classname::where('classname', $classname)->first();
        $view_studentstermresults = Result::where('classname', $classname)->latest()->get();
        $academic_sessions = Academicsession::latest()->get();
        return view('dashboard.highschoolresult', compact('academic_sessions', 'view_studentstermresults'));
    }

    public function highschoolmidtermresult($classname){
        $view_studentstermresults = Classname::where('classname', $classname)->first();
        $view_studentstermresults = Result::where('classname', $classname)
        ->where('type', 'Midterm')
        ->latest()->get();

        $academic_sessions = Academicsession::latest()->get();
        return view('dashboard.highschoolmidtermresult', compact('academic_sessions', 'view_studentstermresults'));
    }
    
    public function elementresults($classname){
        $view_studentstermresults = Classname::where('classname', $classname)->first();
        $view_studentstermresults = Result::where('classname', $classname)->latest()->get();

        $academic_sessions = Academicsession::latest()->get();
        return view('dashboard.elementresults', compact('academic_sessions', 'view_studentstermresults'));
    }

    public function highschools($classname){
        $view_classess = Classname::where('classname', $classname)->first();
        $view_highstudents = User::where('classname', $classname)->where('role', 'student')
        ->where('section', 'Secondary')->get();
        return view('dashboard.highschools', compact('view_classess', 'view_highstudents'));
    }

    
    public function preschoolad($classname){
        $view_classess = Classname::where('classname', $classname)->first();

        // $view_classess = Classname::where('section', 'Pre-School')->get();
        $view_preschools = User::where('role', 'student')->where('classname', $classname)->get();
        return view('dashboard.admin.preschoolad', compact('view_preschools'));
    }
    
    
}
