<?php

namespace App\Http\Controllers;

use App\Models\Classactivity;
use App\Models\Guardian;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Classname;
use App\Models\Notification;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Result;

class GuardianController extends Controller
{
    public function createparent1(Request $request){
        

        $request->validate([
            'fathername' => ['required', 'string'],
            'section' => ['required', 'string'],
            'mothername' => ['required', 'string'],
            'motheroccupation' => ['required', 'string'],
            'fatheroccupation' => ['required', 'string'],
            'phone' => ['required', 'string'],
            
            'academic_session' => ['required', 'string'],
            'stateoforigin' => ['required', 'string'],
           
            'maritalstatus' => ['required', 'string'],
            'officeaddress' => ['required', 'string'],
            'homeaddress' => ['required', 'string'],
            'doctorphone' => ['required', 'string'],
            'doctorname' => ['required', 'string'],
            'emergencyphone' => ['required', 'string'],
            'emergencyaddress' => ['required', 'string'],
            'whointro' => ['required', 'string'],
            'academic_session' => ['required', 'string'],
            
          'email' => ['required', 'string', 'email', 'max:255', 'unique:guardians'],
            
        ]);
        // dd($request->all());
        $addsec_admission = new Guardian ();
        $addsec_admission->section = $request->section;
        $addsec_admission->academic_session = $request->academic_session;
        
        $addsec_admission->fathername = $request->fathername;
        $addsec_admission->mothername = $request->mothername;
        $addsec_admission->phone = $request->phone;
        $addsec_admission->ref_no = substr(rand(0,time()),0, 9);
        $addsec_admission->email = $request->email;
        $addsec_admission->fatheroccupation = $request->fatheroccupation;
        $addsec_admission->motheroccupation = $request->motheroccupation;
        $addsec_admission->maritalstatus = $request->maritalstatus;
        $addsec_admission->officeaddress = $request->officeaddress;
        $addsec_admission->homeaddress = $request->homeaddress;
        $addsec_admission->stateoforigin = $request->stateoforigin;
        $addsec_admission->doctorname = $request->doctorname;
        $addsec_admission->doctorphone = $request->doctorphone;
        $addsec_admission->emergencyphone = $request->emergencyphone;
        $addsec_admission->emergencyaddress = $request->emergencyaddress;
        $addsec_admission->whointro = $request->whointro;
        // $addsec_admission->emergencyphone = $request->emergencyphone;
        $addsec_admission->academic_session = $request->academic_session;
        
        
        $addsec_admission->password = \Hash::make($request->password);

        $addsec_admission->save();

        return redirect()->back()->with('success', 'You have seccessfully register one Parent')->withInput();

    }


    public function guardiancheck(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'exists:guardians'],
            'password' => ['required', 'string', 'min:8']
        ], [
            'email.exist'=>'This email does not exist in the guardians table'
        ]);
        $creds = $request->only('email', 'password');
        if (Auth::guard('guardian')->attempt($creds)) {
            return redirect()->route('guardian.home')->with('success', 'You have successfully login');
        }else{
            return redirect()->route('guardian.login')->with('error', 'Failed to login');
        }
    }
    
    
    public function home(){
        $countstudents = User::where('guardian_id', auth::guard('guardian')->id()
        )->count();
        $countclassactivity = Classactivity::where('status', 'approved')->count();
        $viewourstudents = User::where('guardian_id', auth::guard('guardian')->id()
        )->get();

        $viewoursreplyactivity = Classactivity::where('user_id', auth::guard('guardian')->id()
        )->where('reply', 'reply')->count();
        $view_notice = Notification::latest()->take(1)->get();
        $sumpayments = Transaction::where('guardian_id', auth::guard('guardian')->id()
        )->sum('amount');

        $countresults = Result::where('guardian_id', auth::guard('guardian')->id()
        )->count();
        return view('dashboard.guardian.home', compact('countresults', 'sumpayments', 'view_notice', 'viewoursreplyactivity', 'countclassactivity', 'viewourstudents', 'countstudents'));
    }
       
    public function profile(){
        $countstudents = User::where('guardian_id', auth::guard('guardian')->id()
        )->count();
        return view('dashboard.guardian.profile', compact('countstudents'));
    }
    
    

    public function viewparents(){
        $view_parents = Guardian::latest()->get();
        return view('dashboard.admin.viewparents', compact('view_parents'));
    }

    public function viewparent($ref_no){
        $view_parent = Guardian::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.viewparent', compact('view_parent'));
    }

    public function editparent($ref_no){
        $edit_parent = Guardian::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.editparent', compact('edit_parent'));
    }

    public function updateparent(Request $request, $ref_no){
        $edit_parent = Guardian::where('ref_no', $ref_no)->first();
        

        $request->validate([
            'fathername' => ['required', 'string'],
            'section' => ['required', 'string'],
            'mothername' => ['required', 'string'],
            'motheroccupation' => ['required', 'string'],
            'fatheroccupation' => ['required', 'string'],
            'phone' => ['required', 'string'],
            
            'academic_session' => ['required', 'string'],
            'stateoforigin' => ['required', 'string'],
           
            'maritalstatus' => ['required', 'string'],
            'officeaddress' => ['required', 'string'],
            'homeaddress' => ['required', 'string'],
            'doctorphone' => ['required', 'string'],
            'doctorname' => ['required', 'string'],
            'emergencyphone' => ['required', 'string'],
            'emergencyaddress' => ['required', 'string'],
            'whointro' => ['required', 'string'],
            
        ]);
        // dd($request->all());
        $edit_parent->section = $request->section;
        $edit_parent->fathername = $request->fathername;
        $edit_parent->mothername = $request->mothername;
        $edit_parent->phone = $request->phone;
        $edit_parent->fatheroccupation = $request->fatheroccupation;
        $edit_parent->motheroccupation = $request->motheroccupation;
        $edit_parent->maritalstatus = $request->maritalstatus;
        $edit_parent->officeaddress = $request->officeaddress;
        $edit_parent->homeaddress = $request->homeaddress;
        $edit_parent->stateoforigin = $request->stateoforigin;
        $edit_parent->doctorname = $request->doctorname;
        $edit_parent->doctorphone = $request->doctorphone;
        $edit_parent->emergencyphone = $request->emergencyphone;
        $edit_parent->emergencyaddress = $request->emergencyaddress;
        $edit_parent->whointro = $request->whointro;
        // $edit_parent->emergencyphone = $request->emergencyphone;
        $edit_parent->academic_session = $request->academic_session;
        
        $edit_parent->update();

        return redirect()->back()->with('success', 'You have seccessfully updated one Parent')->withInput();

    }
    

    public function addchild($id){
        $add_childtoparents = Guardian::find($id);
        $view_classes = Classname::latest()->get();
        return view('dashboard.admin.addchild', compact('view_classes', 'add_childtoparents'));
    }
    
 

    public function parentochild1($ref_no){
        $find_parentstudents = Guardian::where('ref_no', $ref_no)->first();
        $find_parentstudents = $view_childtoparents = User::where('ref_no', $ref_no)->get();

        return view('dashboard.admin.parentochild1', ['view_childtoparents' => $view_childtoparents, 'find_parentstudents' => $find_parentstudents]);
    }


    public function logout(){
        Auth::guard('guardian')->logout();
        return redirect('guardian/login');
    }
    
}
