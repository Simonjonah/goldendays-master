<?php

namespace App\Http\Controllers;

use App\Models\Academicsession;
use App\Models\Classname;
use Illuminate\Http\Request;
use App\Models\Result;
use App\Models\Pin;
use App\Models\User;
use App\Models\Psycomotor;
use App\Models\Subject;
use PDF;
use Illuminate\Support\Facades\Auth;
class ResultController extends Controller
{
    public function createresults(Request $request){
        
       if (Auth::guard('web')->user()->section == 'Secondary') {
        $data = [];
        $subjectnames = $request->input('subjectname');
        $test_1s = $request->input('test_1');
        $test_2s = $request->input('test_2');
        // $test_3s = $request->input('test_3');
        $tnames= $request->input('tname');
        $tsurnames = $request->input('tsurname');
        $examss = $request->input('exams');
        $user_ids = $request->input('user_id');
        $teacher_ids = $request->input('teacher_id');
        $academic_sessions = $request->input('academic_session');
        $regnumbers = $request->input('regnumber');
        $terms = $request->input('term');
        $sections = $request->input('section');
        $classnames = $request->input('classname');
        $fnames = $request->input('fname');
        $middlenames = $request->input('middlename');
        $surnames = $request->input('surname');
        $genders = $request->input('gender');
        $images_ds = $request->input('images');
        $titles = $request->input('title');
        
        for ($i = 0; $i < count($subjectnames); $i++) {
            $data[] = [

                'subjectname' => $subjectnames[$i],
                'test_1' => $test_1s[$i],
                'test_2' => $test_2s[$i],
                // 'test_3' => $test_3s[$i],
                'tname' => $tnames[$i],
                'tsurname' => $tsurnames[$i],
                'exams' => $examss[$i],
                'user_id' => $user_ids[$i],
                'teacher_id' =>$teacher_ids[$i],

                'academic_session' =>$academic_sessions[$i],
                'regnumber' =>$regnumbers[$i],
                'term' => $terms[$i],
                'section' => $sections[$i],
                'classname' => $classnames[$i],
                'fname' => $fnames[$i],
                'middlename' => $middlenames[$i],
                'surname' => $surnames[$i],
                'gender' => $genders[$i],
                'images' => $images_ds[$i],
                'title' => $titles[$i],
                
            ];
        }
       }elseif (Auth::guard('web')->user()->section == 'Primary') {
        # code...

        $data = [];
        $subjectnames = $request->input('subjectname');
        $test_1s = $request->input('test_1');
        $test_2s = $request->input('test_2');
        $test_3s = $request->input('test_3');
        $examss = $request->input('exams');
        $user_ids = $request->input('user_id');
        $tnames= $request->input('tname');
        $tsurnames = $request->input('tsurname');
        $teacher_ids = $request->input('teacher_id');
        $academic_sessions = $request->input('academic_session');
        $regnumbers = $request->input('regnumber');
        $terms = $request->input('term');
        // $user_ids = $request->input('user_id');
        $classnames = $request->input('classname');
        $fnames = $request->input('fname');
        $middlenames = $request->input('middlename');
        $surnames = $request->input('surname');
        $genders = $request->input('gender');
        $images_ds = $request->input('images');
        // $titles = $request->input('title');
        
        
        
      
        for ($i = 0; $i < count($subjectnames); $i++) {
            $data[] = [

                'subjectname' => $subjectnames[$i],
                'test_1' => $test_1s[$i],
                'test_2' => $test_2s[$i],
                'test_3' => $test_3s[$i],
                'exams' => $examss[$i],
                'user_id' => $user_ids[$i],
                'teacher_id' =>$teacher_ids[$i],
                'tname' =>$tnames[$i],
                'tsurname' =>$tsurnames[$i],

                'academic_session' =>$academic_sessions[$i],
                'regnumber' =>$regnumbers[$i],
                'term' => $terms[$i],
                // 'user_id' => $user_ids[$i],
                'classname' => $classnames[$i],
                'fname' => $fnames[$i],
                'middlename' => $middlenames[$i],
                'surname' => $surnames[$i],
                'gender' => $genders[$i],
                'images' => $images_ds[$i],
                // 'title' => $titles[$i],
                
            ];
        }

       }else{

        $data = [];
        $subjectnames = $request->input('subjectname');
        $test_1s = $request->input('test_1');
        $test_2s = $request->input('test_2');
        $test_3s = $request->input('test_3');
        $examss = $request->input('exams');
        $user_ids = $request->input('user_id');
        $teacher_ids = $request->input('teacher_id');
        $academic_sessions = $request->input('academic_session');
        $regnumbers = $request->input('regnumber');
        $terms = $request->input('term');
        // $user_ids = $request->input('user_id');
        $classnames = $request->input('classname');
        $fnames = $request->input('fname');
        $middlenames = $request->input('middlename');
        $surnames = $request->input('surname');
        $genders = $request->input('gender');
        $images_ds = $request->input('images');
        // $titles = $request->input('title');
        
        
        
      
        for ($i = 0; $i < count($subjectnames); $i++) {
            $data[] = [

                'subjectname' => $subjectnames[$i],
                'test_1' => $test_1s[$i],
                'test_2' => $test_2s[$i],
                'test_3' => $test_3s[$i],
                'exams' => $examss[$i],
                'user_id' => $user_ids[$i],
                'teacher_id' =>$teacher_ids[$i],

                'academic_session' =>$academic_sessions[$i],
                'regnumber' =>$regnumbers[$i],
                'term' => $terms[$i],
                // 'user_id' => $user_ids[$i],
                'classname' => $classnames[$i],
                'fname' => $fnames[$i],
                'middlename' => $middlenames[$i],
                'surname' => $surnames[$i],
                'gender' => $genders[$i],
                'images' => $images_ds[$i],
                // 'title' => $titles[$i],
                
            ];
        }
       }


        Result::insert($data);

        
        //return redirect()->route('psycomotor', ['ref_no' =>$user_ids->ref_no]); 
       return redirect()->back()->with('success', 'you have added successfully');
    }


    public function createresultsad(Request $request){
        
            $data = [];
            $subjectnames = $request->input('subjectname');
            $test_1s = $request->input('test_1');
            $test_2s = $request->input('test_2');
            $test_3s = $request->input('test_3');
            $examss = $request->input('exams');
            $user_ids = $request->input('user_id');
            // $teacher_ids = $request->input('teacher_id');
            $academic_sessions = $request->input('academic_session');
            $regnumbers = $request->input('regnumber');
            $terms = $request->input('term');
            $sections = $request->input('section');
            $classnames = $request->input('classname');
            $fnames = $request->input('fname');
            $middlenames = $request->input('middlename');
            $surnames = $request->input('surname');
            $genders = $request->input('gender');
            $images_ds = $request->input('images');
           
            for ($i = 0; $i < count($subjectnames); $i++) {
                $data[] = [
    
                    'subjectname' => $subjectnames[$i],
                    'test_1' => $test_1s[$i],
                    'test_2' => $test_2s[$i],
                    'test_3' => $test_3s[$i],
                    'exams' => $examss[$i],
                    'user_id' => $user_ids[$i],
                    'section' =>$sections[$i],
    
                    'academic_session' =>$academic_sessions[$i],
                    'regnumber' =>$regnumbers[$i],
                    'term' => $terms[$i],
                    // 'user_id' => $user_ids[$i],
                    'classname' => $classnames[$i],
                    'fname' => $fnames[$i],
                    'middlename' => $middlenames[$i],
                    'surname' => $surnames[$i],
                    'gender' => $genders[$i],
                    'images' => $images_ds[$i],
                    // 'title' => $titles[$i],
                    
                ];
            
            Result::insert($data);
    
        }

       return redirect()->back()->with('success', 'you have added successfully');
    }

    public function createresultsadsec(Request $request){
        
        $data = [];
        $subjectnames = $request->input('subjectname');
        $test_1s = $request->input('test_1');
        $test_2s = $request->input('test_2');
        $test_3s = $request->input('test_3');
        $examss = $request->input('exams');
        $user_ids = $request->input('user_id');
        // $teacher_ids = $request->input('teacher_id');
        $academic_sessions = $request->input('academic_session');
        $regnumbers = $request->input('regnumber');
        $terms = $request->input('term');
        $sections = $request->input('section');
        $classnames = $request->input('classname');
        $fnames = $request->input('fname');
        $middlenames = $request->input('middlename');
        $surnames = $request->input('surname');
        $images_ds = $request->input('images');
        $genders = $request->input('gender');
        $titles = $request->input('title');
       
        for ($i = 0; $i < count($subjectnames); $i++) {
            $data[] = [

                'subjectname' => $subjectnames[$i],
                'test_1' => $test_1s[$i],
                'test_2' => $test_2s[$i],
                'test_3' => $test_3s[$i],
                'exams' => $examss[$i],
                'user_id' => $user_ids[$i],
                'section' =>$sections[$i],

                'academic_session' =>$academic_sessions[$i],
                'regnumber' =>$regnumbers[$i],
                'term' => $terms[$i],
                // 'user_id' => $user_ids[$i],
                'classname' => $classnames[$i],
                'fname' => $fnames[$i],
                'middlename' => $middlenames[$i],
                'surname' => $surnames[$i],
                'gender' => $genders[$i],
                'images' => $images_ds[$i],
                'title' => $titles[$i],
                
            ];
        
        Result::insert($data);

    }

   
   return redirect()->back()->with('success', 'you have added successfully');
}


    public function firstermresults(){
        $view_myresults = Result::where('teacher_id', auth::guard('web')->id())
         ->where('term', 'First Term')->where('type', null)
        ->get();
        $academic_sessions = Academicsession::latest()->get();
        return view('dashboard.firstermresults', compact('academic_sessions', 'view_myresults'));
    }

    public function firstmidtermresults(){
        $view_myresults = Result::where('teacher_id', auth::guard('web')->id())
         ->where('term', 'First Term')->where('type', 'Midterm')->get();
        $academic_sessions = Academicsession::latest()->get();
        return view('dashboard.firstmidtermresults', compact('academic_sessions', 'view_myresults'));
    }
    
    // public function teacherviewresults($user_id){
    //     $view_myresult_results = Result::where('user_id', $user_id)
    //     ->where('term', 'First Term')
    //     ->get();

    //     $view_results = Result::where('user_id', $user_id)->first();
           
    //     return view('dashboard.teacherviewresults', compact('view_results', 'view_myresult_results'));
    // }

    public function teacherviewresults2nd($user_id){
        $view_myresult_results = Result::where('user_id', $user_id)
        ->where('term', 'Second Term')->where('type', null)
        ->get();

        $view_results = Result::where('user_id', $user_id)->first();
           
        return view('dashboard.teacherviewresults', compact('view_results', 'view_myresult_results'));
    }


    public function teacherviewresults3rd($user_id){
        $view_myresult_results = Result::where('user_id', $user_id)
        ->where('term', 'third Term')->where('type', null)
        ->get();
        $view_results = Result::where('user_id', $user_id)->first();
           
        return view('dashboard.teacherviewresults3rd', compact('view_results', 'view_myresult_results'));
    }

    public function addpsychomotor($id){
        $add_psychomotor = Result::find($id);
        return view('dashboard.addpsychomotor', compact('add_psychomotor'));
    }
    public function thirdtermresults(){
        $view_myresults = Result::where('teacher_id', auth::guard('web')->id())
         ->where('term', 'third Term')->where('type', null)
        ->get();

       
       $academic_sessions = Academicsession::latest()->get();
        return view('dashboard.thirdtermresults', compact('academic_sessions', 'view_myresults'));
    }
    public function createpsychomotoro(Request $request, $user_id){
      //dd($request->all());
        $add_assignteacher = Result::find($user_id);
        $request->validate([
            'punt1' => ['nullable', 'string', 'max:255'],
            
        ]);

       
        $add_assignteacher->punt1 = $request->punt1;
        $add_assignteacher->punt2 = $request->punt2;
        $add_assignteacher->punt3 = $request->punt3;
        $add_assignteacher->punt4 = $request->punt4;

        
        $add_assignteacher->respond1 = $request->respond1;
        $add_assignteacher->respond2 = $request->respond2;
        $add_assignteacher->respond3 = $request->respond3;
        $add_assignteacher->respond4 = $request->respond4;

        
        $add_assignteacher->corporate1 = $request->corporate1;
        $add_assignteacher->corporate2 = $request->corporate2;
        $add_assignteacher->corporate3 = $request->corporate3;
        $add_assignteacher->corporate4 = $request->corporate4;


        $add_assignteacher->neat1 = $request->neat1;
        $add_assignteacher->neat2 = $request->neat2;
        $add_assignteacher->neat3 = $request->neat3;
        $add_assignteacher->neat4 = $request->neat4;


        $add_assignteacher->attentive1 = $request->attentive1;
        $add_assignteacher->attentive2 = $request->attentive2;
        $add_assignteacher->attentive3 = $request->attentive3;
        $add_assignteacher->attentive4 = $request->attentive4;

        $add_assignteacher->init1 = $request->init1;
        $add_assignteacher->init2 = $request->init2;
        $add_assignteacher->init3 = $request->init3;
        $add_assignteacher->init4 = $request->init4;


        $add_assignteacher->organ1 = $request->organ1;
        $add_assignteacher->organ2 = $request->organ2;
        $add_assignteacher->organ3 = $request->organ3;
        $add_assignteacher->organ4 = $request->organ4;

        
        $add_assignteacher->pers1 = $request->pers1;
        $add_assignteacher->pers2 = $request->pers2;
        $add_assignteacher->pers3 = $request->pers3;
        $add_assignteacher->pers4 = $request->pers4;


        $add_assignteacher->atti1 = $request->atti1;
        $add_assignteacher->atti2 = $request->atti2;
        $add_assignteacher->atti3 = $request->atti3;
        $add_assignteacher->atti4 = $request->atti4;


        $add_assignteacher->club1 = $request->club1;
        $add_assignteacher->club2 = $request->club2;
        $add_assignteacher->club3 = $request->club3;
        $add_assignteacher->club4 = $request->club4;

        $add_assignteacher->teacher_comment = $request->teacher_comment;
        $add_assignteacher->next_term = $request->next_term;
        $add_assignteacher->headteach_comment = $request->headteach_comment;
        $add_assignteacher->dayschopen = $request->dayschopen;
        $add_assignteacher->dayspresent = $request->dayspresent;
        
        $add_assignteacher->sports1 = $request->sports1;
        $add_assignteacher->sports2 = $request->sports2;
        $add_assignteacher->sports3 = $request->sports3;
        $add_assignteacher->sports4 = $request->sports4;

        $add_assignteacher->hand1 = $request->hand1;
        $add_assignteacher->hand2 = $request->hand2;
        $add_assignteacher->hand3 = $request->hand3;
        $add_assignteacher->hand4 = $request->hand4;

        $add_assignteacher->tech1 = $request->tech1;
        $add_assignteacher->tech2 = $request->tech2;
        $add_assignteacher->tech3 = $request->tech3;
        $add_assignteacher->tech4 = $request->tech4;

        $add_assignteacher->tool1 = $request->tool1;
        $add_assignteacher->tool2 = $request->tool2;
        $add_assignteacher->tool3 = $request->tool3;
        $add_assignteacher->tool4 = $request->tool4;

        $add_assignteacher->pract1 = $request->pract1;
        $add_assignteacher->pract2 = $request->pract2;
        $add_assignteacher->pract3 = $request->pract3;
        $add_assignteacher->pract4 = $request->pract4;

        
        $add_assignteacher->craft1 = $request->craft1;
        $add_assignteacher->craft2 = $request->craft2;
        $add_assignteacher->craft3 = $request->craft3;
        $add_assignteacher->craft4 = $request->craft4;

        $add_assignteacher->comp1 = $request->comp1;
        $add_assignteacher->comp2 = $request->comp2;
        $add_assignteacher->comp3 = $request->comp3;
        $add_assignteacher->comp4 = $request->comp4;
        
        
        $add_assignteacher->music1 = $request->music1;
        $add_assignteacher->music2 = $request->music2;
        $add_assignteacher->music3 = $request->music3;
        $add_assignteacher->music4 = $request->music4;

        $add_assignteacher->polite1 = $request->polite1;
        $add_assignteacher->polite2 = $request->polite2;
        $add_assignteacher->polite3 = $request->polite3;
        $add_assignteacher->polite4 = $request->polite4;


        $add_assignteacher->paint1 = $request->paint1;
        $add_assignteacher->paint2 = $request->paint2;
        $add_assignteacher->paint3 = $request->paint3;
        $add_assignteacher->paint4 = $request->paint4;

        $add_assignteacher->pins = substr(rand(0,time()),0, 9);
        $add_assignteacher->update();

        return redirect()->back()->with('success', 'you have added successfully');
    }
    





    

    public function secondtermresults(){
        $view_myresults = Result::where('teacher_id', auth::guard('web')->id())
         ->where('term', 'Second Term')->where('type', null)
        ->get();
        $academic_sessions = Academicsession::latest()->get();
        return view('dashboard.secondtermresults', compact('academic_sessions', 'view_myresults'));
    }
    
   
    public function checkresult(){
       $the_results = Academicsession::all();
       $the_classes = Classname::all();
        return view('dashboard.checkresult', compact('the_classes', 'the_results'));
    }
    

    public function yourresult(Request $request){
        $request->validate([
            'pins' => ['required', 'string'],
            'regnumber' => ['required', 'string',],
            'academic_session' => ['required', 'string',],
            'term' => ['required', 'string',],

        ], [
            'pins.exist'=>'This email does not exist in the admins table'
        ]);
        if($getyour_results = Result::where('regnumber', $request->regnumber)->where('term', $request->term)
        ->where('pins', $request->pins)
        ->exists()) {
        $getyour_results = Result::where('user_id', auth::guard('web')->id()
        )->where('academic_session', $request->academic_session)->get();
        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }
       // $view_results = Result::where('user_id', $user_id)->first();
       $getyours = Result::where('user_id', auth::guard('web')->id()
       )->where('term', 'First Term')->take(1)
       ->get();
       
        // $pdf = PDF::loadView('dashboard.pdf', compact('getyours','getyour_results'));

        // return $pdf->download('school_report.pdf');
    return view('dashboard.web.yourresult', compact('getyours','getyour_results'));
      
    }

    public function printresult(Request $request, $user_id){
        $print_results = Result::where('user_id', $user_id)
        ->where('term', 'First Term')->get();
        return view('dashboard.printresult', compact('print_results'));
    }




    public function generatePDF(Request $request)
    {

        $request->validate([
            // 'classname' => ['required', 'string'],
            'regnumber' => ['required', 'string',],
            'academic_session' => ['required', 'string',],
            'term' => ['required', 'string'],
            'classname' => ['required', 'string'],
            'regnumber.exist'=>'This email does not exist in the admins table'
        ]);
        if($getyour_results = Result::where('regnumber', $request->regnumber)
        ->where('academic_session', $request->academic_session)
        ->where('term', $request->term)
        ->where('classname', $request->classname)

        ->exists()) {
        $getyour_results = Result::where('user_id', auth::guard('web')->id()
        )
        ->where('regnumber', $request->regnumber)
        ->where('classname', $request->classname)
        ->where('term', $request->term)
        ->where('academic_session', $request->academic_session)->get();
        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }

        $total_subject = Result::where('user_id', auth::guard('web')->id()
        )->where('classname', $request->classname)
        ->where('term', $request->term)->where('type', null)->count();

        $view_results = Result::where('academic_session', $request->academic_session)
        ->where('regnumber', $request->regnumber)
        ->where('classname', $request->classname)
        ->where('term', $request->term)->where('type', null)->first();

        $total_student = Result::where('user_id', auth::guard('web')->id()
        )->where('classname', $request->classname)
        ->where('term', $request->term)->count();
    
        $pdf = PDF::loadView('dashboard.pdf', compact('view_results', 'total_student', 'total_subject', 'getyour_results'));
     
        return $pdf->download('goldendestinyschools.pdf');
    }



    public function viewresultbyadmin(){
        $view_results = Result::latest()->get();
        return view('dashboard.admin.viewresultbyadmin', compact('view_results'));
    }



    public function viewresults($user_id){
        $view_myresult_results = Result::where('user_id', $user_id)->get();
        $view_results = Result::where('user_id', $user_id)->first();
           
        return view('dashboard.admin.viewresults', compact('view_results', 'view_myresult_results'));
    }

    public function viewresult($id){
        // $view_myresult_results = Result::where('id', $id)->get();
        $viewsingle_results = Result::where('id', $id)->first();
           
        return view('dashboard.admin.viewresult', compact('viewsingle_results'));
    }
   

    public function approveresults($id){
        $approved_results = Result::find($id);
        $approved_results->status = 'approved';
        $approved_results->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }

    public function approveresultshead($id){
        $approved_results = Result::find($id);
        $approved_results->status = 'approved';
        $approved_results->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }
    

    public function viewapproveresultsbyad(){
        $approve_results = Result::where('status', 'approved')->get();
        return view('dashboard.admin.viewapproveresultsbyad', compact('approve_results'));
    }
    
    public function addpsychomotorad($id){
        $add_psychomotorad = Result::find($id);
        return view('dashboard.admin.addpsychomotorad', compact('add_psychomotorad'));
    }

   
    
    
    public function createpsychomotoroad(Request $request, $user_id){
        
          $add_psychomotorad = Result::find($user_id);
          $request->validate([
              'punt1' => ['nullable', 'string', 'max:255'],
              
          ]);

         
          $add_psychomotorad->punt1 = $request->punt1;
          $add_psychomotorad->punt2 = $request->punt2;
          $add_psychomotorad->punt3 = $request->punt3;
          $add_psychomotorad->punt4 = $request->punt4;
  
          
          $add_psychomotorad->respond1 = $request->respond1;
          $add_psychomotorad->respond2 = $request->respond2;
          $add_psychomotorad->respond3 = $request->respond3;
          $add_psychomotorad->respond4 = $request->respond4;
  
          
          $add_psychomotorad->corporate1 = $request->corporate1;
          $add_psychomotorad->corporate2 = $request->corporate2;
          $add_psychomotorad->corporate3 = $request->corporate3;
          $add_psychomotorad->corporate4 = $request->corporate4;
  
  
          $add_psychomotorad->neat1 = $request->neat1;
          $add_psychomotorad->neat2 = $request->neat2;
          $add_psychomotorad->neat3 = $request->neat3;
          $add_psychomotorad->neat4 = $request->neat4;
  
  
          $add_psychomotorad->attentive1 = $request->attentive1;
          $add_psychomotorad->attentive2 = $request->attentive2;
          $add_psychomotorad->attentive3 = $request->attentive3;
          $add_psychomotorad->attentive4 = $request->attentive4;
  
          $add_psychomotorad->init1 = $request->init1;
          $add_psychomotorad->init2 = $request->init2;
          $add_psychomotorad->init3 = $request->init3;
          $add_psychomotorad->init4 = $request->init4;
  
  
          $add_psychomotorad->organ1 = $request->organ1;
          $add_psychomotorad->organ2 = $request->organ2;
          $add_psychomotorad->organ3 = $request->organ3;
          $add_psychomotorad->organ4 = $request->organ4;
  
          
          $add_psychomotorad->pers1 = $request->pers1;
          $add_psychomotorad->pers2 = $request->pers2;
          $add_psychomotorad->pers3 = $request->pers3;
          $add_psychomotorad->pers4 = $request->pers4;
  
  
          $add_psychomotorad->atti1 = $request->atti1;
          $add_psychomotorad->atti2 = $request->atti2;
          $add_psychomotorad->atti3 = $request->atti3;
          $add_psychomotorad->atti4 = $request->atti4;
  
  
          $add_psychomotorad->club1 = $request->club1;
          $add_psychomotorad->club2 = $request->club2;
          $add_psychomotorad->club3 = $request->club3;
          $add_psychomotorad->club4 = $request->club4;
  
          $add_psychomotorad->teacher_comment = $request->teacher_comment;
  
          $add_psychomotorad->sports1 = $request->sports1;
          $add_psychomotorad->sports2 = $request->sports2;
          $add_psychomotorad->sports3 = $request->sports3;
          $add_psychomotorad->sports4 = $request->sports4;
  
          $add_psychomotorad->hand1 = $request->hand1;
          $add_psychomotorad->hand2 = $request->hand2;
          $add_psychomotorad->hand3 = $request->hand3;
          $add_psychomotorad->hand4 = $request->hand4;
  
          $add_psychomotorad->tech1 = $request->tech1;
          $add_psychomotorad->tech2 = $request->tech2;
          $add_psychomotorad->tech3 = $request->tech3;
          $add_psychomotorad->tech4 = $request->tech4;
  
          $add_psychomotorad->tool1 = $request->tool1;
          $add_psychomotorad->tool2 = $request->tool2;
          $add_psychomotorad->tool3 = $request->tool3;
          $add_psychomotorad->tool4 = $request->tool4;
  
          $add_psychomotorad->pract1 = $request->pract1;
          $add_psychomotorad->pract2 = $request->pract2;
          $add_psychomotorad->pract3 = $request->pract3;
          $add_psychomotorad->pract4 = $request->pract4;
  
          
          $add_psychomotorad->craft1 = $request->craft1;
          $add_psychomotorad->craft2 = $request->craft2;
          $add_psychomotorad->craft3 = $request->craft3;
          $add_psychomotorad->craft4 = $request->craft4;
  
          $add_psychomotorad->comp1 = $request->comp1;
          $add_psychomotorad->comp2 = $request->comp2;
          $add_psychomotorad->comp3 = $request->comp3;
          $add_psychomotorad->comp4 = $request->comp4;
          
          
          $add_psychomotorad->music1 = $request->music1;
          $add_psychomotorad->music2 = $request->music2;
          $add_psychomotorad->music3 = $request->music3;
          $add_psychomotorad->music4 = $request->music4;
  
          $add_psychomotorad->polite1 = $request->polite1;
          $add_psychomotorad->polite2 = $request->polite2;
          $add_psychomotorad->polite3 = $request->polite3;
          $add_psychomotorad->polite4 = $request->polite4;
  
  
          $add_psychomotorad->paint1 = $request->paint1;
          $add_psychomotorad->paint2 = $request->paint2;
          $add_psychomotorad->paint3 = $request->paint3;
          $add_psychomotorad->paint4 = $request->paint4;
  
          $add_psychomotorad->pins = substr(rand(0,time()),0, 9);
          $add_psychomotorad->update();
  
          return redirect()->back()->with('success', 'you have added successfully');
      }
         
      
    public function pdf1(){
        $getyour_results = Result::all();
        return view('dashboard.web.pdf1', compact('getyour_results'));
    }
    public function addmidtermpsychomotor($id){
        $add_midtermpsychomotor = Result::find($id);
        return view('dashboard.addmidtermpsychomotor', compact('add_midtermpsychomotor'));
    }
    

    public function searchresultbyteacher(Request $request){
        $request->validate([
            'regnumber' => ['required', 'string',],
            'academic_session' => ['required', 'string',],
            'term' => ['required', 'string',],

        ], [
            'regnumber.exist'=>'This Admission number does not exist in result table'
        ]);
        if($view_myresult_results = Result::where('regnumber', $request->regnumber)->where('term', $request->term)
        ->where('academic_session', $request->academic_session)->where('type', null)
        ->exists()) {
        $view_myresult_results = Result::where('academic_session', $request->academic_session)
        
        ->where('regnumber', $request->regnumber)->where('term', $request->term)->where('type', null)
        ->where('academic_session', $request->academic_session)
        ->get();
        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }
        $view_results = Result::where('term', $request->term)->where('regnumber', $request->regnumber)->first();
       
    return view('dashboard.teacherviewresults', compact('view_results', 'view_myresult_results'));
      
    }

    
    public function searchresultbyteacherprin(Request $request){
        $request->validate([
            'regnumber' => ['required', 'string',],
            'academic_session' => ['required', 'string',],
            'term' => ['required', 'string',],

        ], [
            'regnumber.exist'=>'This Admission number does not exist in result table'
        ]);
        if($view_myresult_results = Result::where('regnumber', $request->regnumber)->where('term', $request->term)
        ->where('academic_session', $request->academic_session)->where('type', null)
        ->exists()) {
        $view_myresult_results = Result::where('academic_session', $request->academic_session)
        
        ->where('regnumber', $request->regnumber)->where('term', $request->term)
        ->where('academic_session', $request->academic_session)->where('type', null)
        ->get();
        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }
        $view_results = Result::where('academic_session', $request->academic_session)
        
        ->where('regnumber', $request->regnumber)->where('term', $request->term)->first();
       
    return view('dashboard.teacherviewresultsprin', compact('view_results', 'view_myresult_results'));
      
    }


    public function searchresultbyteacherprinmid(Request $request){
        $request->validate([
            'regnumber' => ['required', 'string'],
            'academic_session' => ['required', 'string'],
            'term' => ['required', 'string'],

        ], [
            'regnumber.exist'=>'This Admission number does not exist in result table'
        ]);
        if($view_myresult_results = Result::where('regnumber', $request->regnumber)->where('term', $request->term)
        ->where('academic_session', $request->academic_session)->where('type', 'Midterm')
        ->exists()) {
        $view_myresult_results = Result::where('academic_session', $request->academic_session)
        
        ->where('regnumber', $request->regnumber)->where('term', $request->term)
        ->where('academic_session', $request->academic_session)->where('type', 'Midterm')
        ->get();
        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }
        $view_results = Result::where('term', $request->term)->first();
       
    return view('dashboard.teacherviewresultsprinmidterm', compact('view_results', 'view_myresult_results'));
      
    }


    public function searchresultbyteacherelementary(Request $request){
        $request->validate([
            'regnumber' => ['required', 'string',],
            'academic_session' => ['required', 'string',],
            'term' => ['required', 'string',],

        ], [
            'regnumber.exist'=>'This Admission number does not exist in result table'
        ]);
        if($view_myresult_results = Result::where('regnumber', $request->regnumber)->where('term', $request->term)
        ->where('academic_session', $request->academic_session)
        ->exists()) {
        $view_myresult_results = Result::where('academic_session', $request->academic_session)
        
        ->where('regnumber', $request->regnumber)->where('term', $request->term)
        ->where('academic_session', $request->academic_session)
        ->get();
        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }
        $view_results = Result::where('term', $request->term)->where('regnumber', $request->regnumber)->first();
       
    return view('dashboard.teacherviewlementary', compact('view_results', 'view_myresult_results'));
      
    }


    public function addcomment($id){
        $add_psychomotor = Result::find($id);
        return view('dashboard.addcomment', compact('add_psychomotor'));
    }

    
    public function createcomment(Request $request, $user_id){
        
        $add_psychomotorad = Result::find($user_id);
        $request->validate([
            'headteach_comment' => ['nullable', 'string', 'max:255'],
            
        ]);

       
        $add_psychomotorad->headteach_comment = $request->headteach_comment;
      
        $add_psychomotorad->update();

        return redirect()->back()->with('success', 'you have added successfully');
    }
 
    

    public function createmidtermresults(Request $request){
        
        if (Auth::guard('web')->user()->section == 'Secondary') {
         $data = [];
         $subjectnames = $request->input('subjectname');
         $test_1s = $request->input('test_1');
         $test_2s = $request->input('test_2');
         $tnames= $request->input('tname');
         $tsurnames = $request->input('tsurname');
         $types = $request->input('type');
         $user_ids = $request->input('user_id');
         $teacher_ids = $request->input('teacher_id');
         $academic_sessions = $request->input('academic_session');
         $regnumbers = $request->input('regnumber');
         $terms = $request->input('term');
         // $user_ids = $request->input('user_id');
         $classnames = $request->input('classname');
         $fnames = $request->input('fname');
         $middlenames = $request->input('middlename');
         $surnames = $request->input('surname');
         $genders = $request->input('gender');
         $images_ds = $request->input('images');
         $titles = $request->input('title');
         
         for ($i = 0; $i < count($subjectnames); $i++) {
             $data[] = [
 
                 'subjectname' => $subjectnames[$i],
                 'test_1' => $test_1s[$i],
                 'test_2' => $test_2s[$i],
                 'tname' => $tnames[$i],
                 'tsurname' => $tsurnames[$i],
                 'type' => $types[$i],
                 'user_id' => $user_ids[$i],
                 'teacher_id' =>$teacher_ids[$i],
 
                 'academic_session' =>$academic_sessions[$i],
                 'regnumber' =>$regnumbers[$i],
                 'term' => $terms[$i],
                 // 'user_id' => $user_ids[$i],
                 'classname' => $classnames[$i],
                 'fname' => $fnames[$i],
                 'middlename' => $middlenames[$i],
                 'surname' => $surnames[$i],
                 'gender' => $genders[$i],
                 'images' => $images_ds[$i],
                 'title' => $titles[$i],
                 
             ];
         }
        }elseif (Auth::guard('web')->user()->section == 'Primary') {
         # code...
 
         $data = [];
         $subjectnames = $request->input('subjectname');
         $test_1s = $request->input('test_1');
         $test_2s = $request->input('test_2');
         $test_3s = $request->input('test_3');
         $examss = $request->input('exams');
         $user_ids = $request->input('user_id');
         $tnames= $request->input('tname');
         $tsurnames = $request->input('tsurname');
         $types = $request->input('type');

         $teacher_ids = $request->input('teacher_id');
         $academic_sessions = $request->input('academic_session');
         $regnumbers = $request->input('regnumber');
         $terms = $request->input('term');
         // $user_ids = $request->input('user_id');
         $classnames = $request->input('classname');
         $fnames = $request->input('fname');
         $middlenames = $request->input('middlename');
         $surnames = $request->input('surname');
         $genders = $request->input('gender');
         $images_ds = $request->input('images');
         // $titles = $request->input('title');
         
         
         
       
         for ($i = 0; $i < count($subjectnames); $i++) {
             $data[] = [
 
                 'subjectname' => $subjectnames[$i],
                 'test_1' => $test_1s[$i],
                 'test_2' => $test_2s[$i],
                 'test_3' => $test_3s[$i],
                 'exams' => $examss[$i],
                 'user_id' => $user_ids[$i],
                 'teacher_id' =>$teacher_ids[$i],
                 'tname' =>$tnames[$i],
                 'tsurname' =>$tsurnames[$i],
                 'type' =>$types[$i],
 
                 'academic_session' =>$academic_sessions[$i],
                 'regnumber' =>$regnumbers[$i],
                 'term' => $terms[$i],
                 // 'user_id' => $user_ids[$i],
                 'classname' => $classnames[$i],
                 'fname' => $fnames[$i],
                 'middlename' => $middlenames[$i],
                 'surname' => $surnames[$i],
                 'gender' => $genders[$i],
                 'images' => $images_ds[$i],
                 // 'title' => $titles[$i],
                 
             ];
         }
 
        }elseif (Auth::guard('web')->user()->section == 'Primary') {
            $data = [];
         $subjectnames = $request->input('subjectname');
         $test_1s = $request->input('test_1');
         $test_2s = $request->input('test_2');
         $test_3s = $request->input('test_3');
         $examss = $request->input('exams');
         $user_ids = $request->input('user_id');
         $teacher_ids = $request->input('teacher_id');
         $academic_sessions = $request->input('academic_session');
         $regnumbers = $request->input('regnumber');
         $terms = $request->input('term');
         $tnames= $request->input('tname');
         $tsurnames = $request->input('tsurname');
         $types = $request->input('type');
         // $user_ids = $request->input('user_id');
         $classnames = $request->input('classname');
         $fnames = $request->input('fname');
         $middlenames = $request->input('middlename');
         $surnames = $request->input('surname');
         $genders = $request->input('gender');
         $images_ds = $request->input('images');
        //  $titles = $request->input('title');
         
         
         
       
         for ($i = 0; $i < count($subjectnames); $i++) {
             $data[] = [
 
                 'subjectname' => $subjectnames[$i],
                 'test_1' => $test_1s[$i],
                 'test_2' => $test_2s[$i],
                 'test_3' => $test_3s[$i],
                 'exams' => $examss[$i],
                 'user_id' => $user_ids[$i],
                 'teacher_id' =>$teacher_ids[$i],
 
                 'academic_session' =>$academic_sessions[$i],
                 'regnumber' =>$regnumbers[$i],
                 'term' => $terms[$i],
                 'tname' => $tnames[$i],
                 'tsurname' => $tsurnames[$i],
                 'type' => $user_ids[$i],
                 'classname' => $classnames[$i],
                 'fname' => $fnames[$i],
                 'middlename' => $middlenames[$i],
                 'surname' => $surnames[$i],
                 'gender' => $genders[$i],
                 'images' => $images_ds[$i],
                //  'title' => $titles[$i],
                 
             ];
         }
        }
 
         Result::insert($data);
 
        return redirect()->back()->with('success', 'you have added successfully');

        }


     public function createmidtermresultsmidterm(Request $request){
        
        if (Auth::guard('web')->user()->section == 'Secondary') {
         $data = [];
         $subjectnames = $request->input('subjectname');
         $test_1s = $request->input('test_1');
         $test_2s = $request->input('test_2');
         $tnames= $request->input('tname');
         $tsurnames = $request->input('tsurname');
         $types = $request->input('type');
         $user_ids = $request->input('user_id');
         $teacher_ids = $request->input('teacher_id');
         $academic_sessions = $request->input('academic_session');
         $regnumbers = $request->input('regnumber');
         $terms = $request->input('term');
         // $user_ids = $request->input('user_id');
         $classnames = $request->input('classname');
         $fnames = $request->input('fname');
         $middlenames = $request->input('middlename');
         $surnames = $request->input('surname');
         $genders = $request->input('gender');
         $images_ds = $request->input('images');
         $titles = $request->input('title');
         
         for ($i = 0; $i < count($subjectnames); $i++) {
             $data[] = [
 
                 'subjectname' => $subjectnames[$i],
                 'test_1' => $test_1s[$i],
                 'test_2' => $test_2s[$i],
                 'tname' => $tnames[$i],
                 'tsurname' => $tsurnames[$i],
                 'type' => $types[$i],
                 'user_id' => $user_ids[$i],
                 'teacher_id' =>$teacher_ids[$i],
 
                 'academic_session' =>$academic_sessions[$i],
                 'regnumber' =>$regnumbers[$i],
                 'term' => $terms[$i],
                 // 'user_id' => $user_ids[$i],
                 'classname' => $classnames[$i],
                 'fname' => $fnames[$i],
                 'middlename' => $middlenames[$i],
                 'surname' => $surnames[$i],
                 'gender' => $genders[$i],
                 'images' => $images_ds[$i],
                 'title' => $titles[$i],
                 
             ];
         }
        }elseif (Auth::guard('web')->user()->section == 'Primary') {
         # code...
 
         $data = [];
         $subjectnames = $request->input('subjectname');
         $test_1s = $request->input('test_1');
         $test_2s = $request->input('test_2');
         $test_3s = $request->input('test_3');
         $examss = $request->input('exams');
         $user_ids = $request->input('user_id');
         $tnames= $request->input('tname');
         $tsurnames = $request->input('tsurname');
         $types = $request->input('type');

         $teacher_ids = $request->input('teacher_id');
         $academic_sessions = $request->input('academic_session');
         $regnumbers = $request->input('regnumber');
         $terms = $request->input('term');
         // $user_ids = $request->input('user_id');
         $classnames = $request->input('classname');
         $fnames = $request->input('fname');
         $middlenames = $request->input('middlename');
         $surnames = $request->input('surname');
         $genders = $request->input('gender');
         $images_ds = $request->input('images');
         // $titles = $request->input('title');
         
         
         
       
         for ($i = 0; $i < count($subjectnames); $i++) {
             $data[] = [
 
                 'subjectname' => $subjectnames[$i],
                 'test_1' => $test_1s[$i],
                 'test_2' => $test_2s[$i],
                 'test_3' => $test_3s[$i],
                 'exams' => $examss[$i],
                 'user_id' => $user_ids[$i],
                 'teacher_id' =>$teacher_ids[$i],
                 'tname' =>$tnames[$i],
                 'tsurname' =>$tsurnames[$i],
                 'type' =>$types[$i],
 
                 'academic_session' =>$academic_sessions[$i],
                 'regnumber' =>$regnumbers[$i],
                 'term' => $terms[$i],
                 // 'user_id' => $user_ids[$i],
                 'classname' => $classnames[$i],
                 'fname' => $fnames[$i],
                 'middlename' => $middlenames[$i],
                 'surname' => $surnames[$i],
                 'gender' => $genders[$i],
                 'images' => $images_ds[$i],
                 // 'title' => $titles[$i],
                 
             ];
         }
 
        }else{
 
         $data = [];
         $subjectnames = $request->input('subjectname');
         $test_1s = $request->input('test_1');
         $test_2s = $request->input('test_2');
         $test_3s = $request->input('test_3');
         $examss = $request->input('exams');
         $user_ids = $request->input('user_id');
         $teacher_ids = $request->input('teacher_id');
         $academic_sessions = $request->input('academic_session');
         $regnumbers = $request->input('regnumber');
         $terms = $request->input('term');
         $tnames= $request->input('tname');
         $tsurnames = $request->input('tsurname');
         $types = $request->input('type');
         // $user_ids = $request->input('user_id');
         $classnames = $request->input('classname');
         $fnames = $request->input('fname');
         $middlenames = $request->input('middlename');
         $surnames = $request->input('surname');
         $genders = $request->input('gender');
         $images_ds = $request->input('images');
        //  $titles = $request->input('title');
         
         
         
       
         for ($i = 0; $i < count($subjectnames); $i++) {
             $data[] = [
 
                 'subjectname' => $subjectnames[$i],
                 'test_1' => $test_1s[$i],
                 'test_2' => $test_2s[$i],
                 'test_3' => $test_3s[$i],
                 'exams' => $examss[$i],
                 'user_id' => $user_ids[$i],
                 'teacher_id' =>$teacher_ids[$i],
 
                 'academic_session' =>$academic_sessions[$i],
                 'regnumber' =>$regnumbers[$i],
                 'term' => $terms[$i],
                 'tname' => $tnames[$i],
                 'tsurname' => $tsurnames[$i],
                 'type' => $user_ids[$i],
                 'classname' => $classnames[$i],
                 'fname' => $fnames[$i],
                 'middlename' => $middlenames[$i],
                 'surname' => $surnames[$i],
                 'gender' => $genders[$i],
                 'images' => $images_ds[$i],
                // 'title' => $titles[$i],
                 
             ];
         }
        }
 
         Result::insert($data);
 
        return redirect()->back()->with('success', 'you have added successfully');
     }


     public function searchresultbyteachermidterm(Request $request){
        $request->validate([
            'regnumber' => ['required', 'string',],
            'academic_session' => ['required', 'string',],
            'term' => ['required', 'string',],

        ], [
            'regnumber.exist'=>'This Admission number does not exist in result table'
        ]);
        if($view_myresult_results = Result::where('regnumber', $request->regnumber)->where('term', $request->term)
        ->where('academic_session', $request->academic_session)->where('type', 'Midterm')
        ->exists()) {
        $view_myresult_results = Result::where('academic_session', $request->academic_session)
        
        ->where('regnumber', $request->regnumber)->where('term', $request->term)
        ->where('academic_session', $request->academic_session)->where('type', 'Midterm')
        ->get();
        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }
        $view_results = Result::where('term', $request->term)->where('regnumber', $request->regnumber)
        ->where('type', 'Midterm')
        ->first();
       
    return view('dashboard.teacherviewresultsmidterm', compact('view_results', 'view_myresult_results'));
      
    }


    public function createmidpsychomotoro(Request $request, $user_id){
        //dd($request->all());
          $add_assignteacher = Result::find($user_id);
          $request->validate([
              'punt1' => ['nullable', 'string', 'max:255'],
              
          ]);
  
         
          $add_assignteacher->punt1 = $request->punt1;
          $add_assignteacher->punt2 = $request->punt2;
          $add_assignteacher->punt3 = $request->punt3;
          $add_assignteacher->punt4 = $request->punt4;
  
          
          $add_assignteacher->respond1 = $request->respond1;
          $add_assignteacher->respond2 = $request->respond2;
          $add_assignteacher->respond3 = $request->respond3;
          $add_assignteacher->respond4 = $request->respond4;
  
          
          $add_assignteacher->corporate1 = $request->corporate1;
          $add_assignteacher->corporate2 = $request->corporate2;
          $add_assignteacher->corporate3 = $request->corporate3;
          $add_assignteacher->corporate4 = $request->corporate4;
  
  
          $add_assignteacher->neat1 = $request->neat1;
          $add_assignteacher->neat2 = $request->neat2;
          $add_assignteacher->neat3 = $request->neat3;
          $add_assignteacher->neat4 = $request->neat4;
  
  
          $add_assignteacher->attentive1 = $request->attentive1;
          $add_assignteacher->attentive2 = $request->attentive2;
          $add_assignteacher->attentive3 = $request->attentive3;
          $add_assignteacher->attentive4 = $request->attentive4;
  
          $add_assignteacher->init1 = $request->init1;
          $add_assignteacher->init2 = $request->init2;
          $add_assignteacher->init3 = $request->init3;
          $add_assignteacher->init4 = $request->init4;
  
  
          $add_assignteacher->organ1 = $request->organ1;
          $add_assignteacher->organ2 = $request->organ2;
          $add_assignteacher->organ3 = $request->organ3;
          $add_assignteacher->organ4 = $request->organ4;
  
          
          $add_assignteacher->pers1 = $request->pers1;
          $add_assignteacher->pers2 = $request->pers2;
          $add_assignteacher->pers3 = $request->pers3;
          $add_assignteacher->pers4 = $request->pers4;
  
  
          $add_assignteacher->atti1 = $request->atti1;
          $add_assignteacher->atti2 = $request->atti2;
          $add_assignteacher->atti3 = $request->atti3;
          $add_assignteacher->atti4 = $request->atti4;
  
  
          $add_assignteacher->club1 = $request->club1;
          $add_assignteacher->club2 = $request->club2;
          $add_assignteacher->club3 = $request->club3;
          $add_assignteacher->club4 = $request->club4;
  
          $add_assignteacher->teacher_comment = $request->teacher_comment;
          $add_assignteacher->next_term = $request->next_term;
          $add_assignteacher->headteach_comment = $request->headteach_comment;
          $add_assignteacher->dayschopen = $request->dayschopen;
          $add_assignteacher->dayspresent = $request->dayspresent;
          
          $add_assignteacher->sports1 = $request->sports1;
          $add_assignteacher->sports2 = $request->sports2;
          $add_assignteacher->sports3 = $request->sports3;
          $add_assignteacher->sports4 = $request->sports4;
  
          $add_assignteacher->hand1 = $request->hand1;
          $add_assignteacher->hand2 = $request->hand2;
          $add_assignteacher->hand3 = $request->hand3;
          $add_assignteacher->hand4 = $request->hand4;
  
          $add_assignteacher->tech1 = $request->tech1;
          $add_assignteacher->tech2 = $request->tech2;
          $add_assignteacher->tech3 = $request->tech3;
          $add_assignteacher->tech4 = $request->tech4;
  
          $add_assignteacher->tool1 = $request->tool1;
          $add_assignteacher->tool2 = $request->tool2;
          $add_assignteacher->tool3 = $request->tool3;
          $add_assignteacher->tool4 = $request->tool4;
  
          $add_assignteacher->pract1 = $request->pract1;
          $add_assignteacher->pract2 = $request->pract2;
          $add_assignteacher->pract3 = $request->pract3;
          $add_assignteacher->pract4 = $request->pract4;
  
          
          $add_assignteacher->craft1 = $request->craft1;
          $add_assignteacher->craft2 = $request->craft2;
          $add_assignteacher->craft3 = $request->craft3;
          $add_assignteacher->craft4 = $request->craft4;
  
          $add_assignteacher->comp1 = $request->comp1;
          $add_assignteacher->comp2 = $request->comp2;
          $add_assignteacher->comp3 = $request->comp3;
          $add_assignteacher->comp4 = $request->comp4;
          
          
          $add_assignteacher->music1 = $request->music1;
          $add_assignteacher->music2 = $request->music2;
          $add_assignteacher->music3 = $request->music3;
          $add_assignteacher->music4 = $request->music4;
  
          $add_assignteacher->polite1 = $request->polite1;
          $add_assignteacher->polite2 = $request->polite2;
          $add_assignteacher->polite3 = $request->polite3;
          $add_assignteacher->polite4 = $request->polite4;
  
  
          $add_assignteacher->paint1 = $request->paint1;
          $add_assignteacher->paint2 = $request->paint2;
          $add_assignteacher->paint3 = $request->paint3;
          $add_assignteacher->paint4 = $request->paint4;

          $add_assignteacher->type = 'Midterm';

  
          $add_assignteacher->pins = substr(rand(0,time()),0, 9);
          $add_assignteacher->update();
  
          return redirect()->back()->with('success', 'you have added successfully');
      }
      

}


    
    // }
    


