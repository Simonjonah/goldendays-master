<?php

namespace App\Http\Controllers;

use App\Models\Classname;
use App\Models\Subject;
use App\Models\User;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
    //
    public function addsubject(){
        $view_classes = Classname::all();
        return view('dashboard.admin.addsubject', compact('view_classes'));
    }

    public function createsubject (Request $request){
        $request->validate([
            'subjectname' => ['required', 'string', 'max:255'],
            'section' => ['required', 'string', 'max:255'],
            
        ]);
        $addsubjects = new Subject();
        $addsubjects->subjectname = $request->subjectname;
        $addsubjects->section = $request->section;
        $addsubjects->save();
        if ($addsubjects) {
            return redirect()->back()->with('success', 'you have successfully registered');
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }

    public function viewsubject(){
        $view_subjects = Subject::where('section', 'Secondary')->get();
        return view('dashboard.admin.viewsubject', compact('view_subjects'));
    }
    public function editsubject($id){
        $edit_subject = Subject::find($id);
        return view('dashboard.admin.editsubject', compact('edit_subject'));
    }
    public function deletesubject($id){
        $subjectsdelete = Subject::where('id', $id)->delete();
        return redirect()->back()->with('success', 'you have successfully deleted');
    }
    
    public function updatesubject (Request $request, $id){
        $edit_subject = Subject::find($id);

        $request->validate([
            'subjectname' => ['required', 'string', 'max:255'],
            'section' => ['required', 'string', 'max:255'],
            //'classname' => ['required', 'string', 'max:255'],
            
        ]);
        $edit_subject->subjectname = $request->subjectname;
        $edit_subject->section = $request->section;
       //$edit_subject->classname = $request->classname;
        $edit_subject->update();
        if ($edit_subject) {
            return redirect()->back()->with('success', 'you have successfully updated');
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }
    
    public function assignsubject($id){
        $assigned_subject = Subject::find($id);

        $assigned_teacherto_subjects = User::where('status', 'teacher')
        ->whereNotIn('section', ['Secondary'])->get();
        $assigned_highschool_subjects = User::where('status', 'teacher')
        ->where('section', 'Secondary')->get();

        $assigned_preschool_subjects = User::where('status', 'teacher')
        ->where('section', 'Pre-School')->get();

        $classnames = Classname::all();
        
        return view('dashboard.admin.assignsubject', compact('assigned_preschool_subjects', 'classnames', 'assigned_highschool_subjects', 'assigned_teacherto_subjects', 'assigned_subject'));
    }

    public function nurserysubjects(){
        $viewnursery_subjects = Subject::where('section', 'Primary')->get();
        return view('dashboard.admin.nurserysubjects', compact('viewnursery_subjects'));
    }
    public function preschoolsubjects(){
        $viewnursery_subjects = Subject::where('section', 'Pre-School')->get();
        return view('dashboard.admin.preschoolsubjects', compact('viewnursery_subjects'));
    }
    
     
    public function allsubjects(){
        $viewnursery_subjects = Subject::all();
        return view('dashboard.admin.allsubjects', compact('viewnursery_subjects'));
    }

    public function subdelte($id){
        $viewnursery_subjects = Subject::where('id', $id)->delete();
        return redirect()->back()->with('success', 'You have deleted successfully');
    }
    
    public function setsubjectquestions(){
        $view_subjects = Subject::all();
        return view('dashboard.admin.setsubjectquestions', compact('view_subjects'));
    }
    
    public function addquestions($id){
        $add_questionbyadmin = Subject::find($id);
        return view('dashboard.admin.addquestions', compact('add_questionbyadmin'));
    }  

    
}
