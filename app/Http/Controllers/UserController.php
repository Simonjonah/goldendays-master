<?php

namespace App\Http\Controllers;

use App\Models\Academicsession;
use App\Models\Classactivity;
use App\Models\User;
use App\Models\Classname;
use App\Models\Lessonnote;
use App\Models\Query;
use App\Models\Subject;
use App\Models\Teacherassign;
use App\Models\Result;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;



use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function addchildbyparent1(Request $request){
       
        $request->validate([
            //'user_id' => ['nullable', 'string'],
            'fname' => ['nullable', 'string', 'max:255'],
            'surname' => ['nullable', 'string'],
            'middlename' => ['nullable', 'string'],
            'age' => ['nullable', 'string'],
            'bloodgroup' => ['nullable', 'string'],
            'genotype' => ['nullable', 'string'],
            'previouschoolname' => ['nullable', 'string'],
            'preclassname' => ['nullable', 'string'],
            'gender' => ['nullable', 'string'],
            'classname' => ['nullable', 'string'],
            'lastschooladdress' => ['nullable', 'string'],
            'disability' => ['nullable', 'string'],
            'dob' => ['nullable', 'string'],
            'ref_no' => ['nullable', 'string'],
            'section' => ['nullable', 'string'],
            'academic_session' => ['nullable', 'string'],
            'term' => ['nullable', 'string'],
            'images' => 'required|mimes:jpg,png,jpeg',


            'fathername' => ['required', 'string'],
            'section' => ['required', 'string'],
            'mothername' => ['required', 'string'],
            'motheroccupation' => ['required', 'string'],
            'fatheroccupation' => ['required', 'string'],
            'phone' => ['required',  'string', 'unique:users'],
            
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

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['nullable', 'string'],
            // 'cpassword' => 'required|min:5|max:30|same:cpassword',

            
        ]);
       //dd($request->all());

        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }else{

            $path = 'noimage.jpg';
        }

        $add_adimission = new User();
        $add_adimission['images'] = $path;
        $add_adimission->teacher_id = Auth::guard('web')->user()->id;
        $add_adimission->surname = $request->surname;
        $add_adimission->middlename = $request->middlename;
        $add_adimission->previouschoolname = $request->previouschoolname;
        $add_adimission->fname = $request->fname;
        $add_adimission->age = $request->age;
        $add_adimission->dob = $request->dob;
        $add_adimission->gender = $request->gender;
        $add_adimission->bloodgroup = $request->bloodgroup;
        $add_adimission->genotype = $request->genotype;
        $add_adimission->user_id = Auth::guard('web')->user()->id;

        $add_adimission->preclassname = $request->preclassname;
        $add_adimission->classname = $request->classname;
        $add_adimission->lastschooladdress = $request->lastschooladdress;
        $add_adimission->disability = $request->disability;
        $add_adimission->section = $request->section;
        $add_adimission->designation = 'parent';
        $add_adimission->role = 'student';
        $add_adimission->term = $request->term;
        
         $add_adimission->ref_no = $request->ref_no;
        
        $add_adimission->password = \Hash::make($request->password);
        $add_adimission->ref_no1 = substr(rand(0,time()),0, 9);




        $add_adimission->section = $request->section;
        $add_adimission->academic_session = $request->academic_session;
        
        $add_adimission->fathername = $request->fathername;
        $add_adimission->mothername = $request->mothername;
        $add_adimission->phone = $request->phone;
        $add_adimission->ref_no = substr(rand(0,time()),0, 9);
        $add_adimission->email = $request->email;
        $add_adimission->fatheroccupation = $request->fatheroccupation;
        $add_adimission->motheroccupation = $request->motheroccupation;
        $add_adimission->maritalstatus = $request->maritalstatus;
        $add_adimission->officeaddress = $request->officeaddress;
        $add_adimission->homeaddress = $request->homeaddress;
        $add_adimission->stateoforigin = $request->stateoforigin;
        $add_adimission->doctorname = $request->doctorname;
        $add_adimission->doctorphone = $request->doctorphone;
        $add_adimission->emergencyphone = $request->emergencyphone;
        $add_adimission->emergencyaddress = $request->emergencyaddress;
        $add_adimission->whointro = $request->whointro;
        $add_adimission->academic_session = $request->academic_session;
        
        $add_adimission->password = \Hash::make($request->password);

        $add_adimission->save();
        if ($add_adimission) {
            DB::table('users')->updateOrInsert(
                ['user_id' => $add_adimission->user_id],
                // [
                //    'student_id' => Auth::guard('web')->user()->id,
                //     //'last_name' => $user->last_name,
                //     // Add more fields as needed
                // ]
            );
        }

        return redirect()->back()->with('success', 'You have successfully add child to parent');
        // if ($add_adimission) {
        //     return redirect()->route('web.home')->with('success', 'you have successfully registered');
                
        //     }else{
        //         return redirect()->back()->with('error', 'you have fail to registered');
        // }
        // return redirect()->back()->with('success', 'You have successfully add child to parent');

    }

    public function secondregistration($ref_no){
        $addsec_registration = User::where('ref_no', $ref_no)->first();
        return view('pages.secondregistration', compact('addsec_registration'));
    }
    public function thirdregistration($ref_no){
        $addthird_registration = User::where('ref_no', $ref_no)->first();
        return view('pages.thirdregistration', compact('addthird_registration'));
    }
    public function addchild($id){
        $add_childtoparents = User::find($id);
        $view_classes = Classname::latest()->get();
        $select_teachers = User::where('status', 'admitted')->get();
        return view('dashboard.admin.addchild', compact('select_teachers', 'view_classes', 'add_childtoparents'));
    }
    public function addchildbyparent(Request $request){
       
        $request->validate([
            //'user_id' => ['nullable', 'string'],
            'fname' => ['nullable', 'string', 'max:255'],
            'surname' => ['nullable', 'string'],
            'middlename' => ['nullable', 'string'],
            'age' => ['nullable', 'string'],
            'bloodgroup' => ['nullable', 'string'],
            'genotype' => ['nullable', 'string'],
            'previouschoolname' => ['nullable', 'string'],
            'preclassname' => ['nullable', 'string'],
            'gender' => ['nullable', 'string'],
            'classname' => ['nullable', 'string'],
            'lastschooladdress' => ['nullable', 'string'],
            'disability' => ['nullable', 'string'],
            'dob' => ['nullable', 'string'],
            'ref_no' => ['nullable', 'string'],
            'section' => ['nullable', 'string'],
            'academic_session' => ['nullable', 'string'],
            'term' => ['nullable', 'string'],
            'images' => 'required|mimes:jpg,png,jpeg',


            'fathername' => ['required', 'string'],
            'section' => ['required', 'string'],
            'mothername' => ['required', 'string'],
            'motheroccupation' => ['required', 'string'],
            'fatheroccupation' => ['required', 'string'],
            'phone' => ['required',  'string', 'unique:users'],
            
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

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['nullable', 'string'],
            // 'cpassword' => 'required|min:5|max:30|same:cpassword',

            
        ]);
       //dd($request->all());

        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }else{

            $path = 'noimage.jpg';
        }

        $add_adimission = new User();
        $add_adimission['images'] = $path;
        $add_adimission->surname = $request->surname;
        $add_adimission->middlename = $request->middlename;
        $add_adimission->previouschoolname = $request->previouschoolname;
        $add_adimission->fname = $request->fname;
        $add_adimission->age = $request->age;
        $add_adimission->dob = $request->dob;
        $add_adimission->gender = $request->gender;
        $add_adimission->bloodgroup = $request->bloodgroup;
        $add_adimission->genotype = $request->genotype;

        $add_adimission->preclassname = $request->preclassname;
        $add_adimission->classname = $request->classname;
        $add_adimission->lastschooladdress = $request->lastschooladdress;
        $add_adimission->disability = $request->disability;
        $add_adimission->section = $request->section;
        // $add_adimission->academic_session = $request->academic_session;
        $add_adimission->term = $request->term;
        
         $add_adimission->ref_no = $request->ref_no;
        
        $add_adimission->password = \Hash::make($request->password);
        $add_adimission->ref_no1 = substr(rand(0,time()),0, 9);




        $add_adimission->section = $request->section;
        $add_adimission->academic_session = $request->academic_session;
        
        $add_adimission->fathername = $request->fathername;
        $add_adimission->mothername = $request->mothername;
        $add_adimission->phone = $request->phone;
        $add_adimission->ref_no = substr(rand(0,time()),0, 9);
        $add_adimission->email = $request->email;
        $add_adimission->fatheroccupation = $request->fatheroccupation;
        $add_adimission->motheroccupation = $request->motheroccupation;
        $add_adimission->maritalstatus = $request->maritalstatus;
        $add_adimission->officeaddress = $request->officeaddress;
        $add_adimission->homeaddress = $request->homeaddress;
        $add_adimission->stateoforigin = $request->stateoforigin;
        $add_adimission->doctorname = $request->doctorname;
        $add_adimission->doctorphone = $request->doctorphone;
        $add_adimission->emergencyphone = $request->emergencyphone;
        $add_adimission->emergencyaddress = $request->emergencyaddress;
        $add_adimission->whointro = $request->whointro;
        $add_adimission->academic_session = $request->academic_session;
        
        $add_adimission->password = \Hash::make($request->password);

        $add_adimission->save();
        if ($add_adimission) {
            return redirect()->route('web.home')->with('success', 'you have successfully registered');
                
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
        return redirect()->back()->with('success', 'You have successfully add child to parent');

    }


   


    public function updateaddthirdondadmmin(Request $request, $ref_no){
        $addthid_admission = User::where('ref_no', $ref_no)->first();
        $request->validate([
            'lastschool' => ['nullable', 'string'],
            'landmark' => ['nullable', 'string'],
            'relationship' => ['nullable', 'string'],
            'brixtonsiblings' => ['nullable', 'string'],
            'schooladdress' => ['nullable', 'string'],
            'aboutus' => ['nullable', 'string'],
            'birthcert' => 'nullable|mimes:jpg,png,jpeg',
          
            
        ]);
        if ($request->hasFile('birthcert')){

            $file = $request['birthcert'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('birthcert')->storeAs('resourceimages', $filename);
        }
        $addthid_admission['birthcert'] = $path;
        $addthid_admission->lastschool = $request->lastschool;
        $addthid_admission->aboutus = $request->aboutus;
        $addthid_admission->schooladdress = $request->schooladdress;
        $addthid_admission->brixtonsiblings = $request->brixtonsiblings;
        $addthid_admission->landmark = $request->landmark;
        $addthid_admission->lastschool = $request->lastschool;
        $addthid_admission->relationship = $request->relationship;
        
        
        $addthid_admission->update();

        return redirect()->route('medicalreports', ['ref_no' =>$addthid_admission->ref_no]); 

    }

  
    public function medicalreports($ref_no){
        $addthid_admission = User::where('ref_no', $ref_no)->first();
        return view('pages.medicalreports', compact('addthid_admission'));
    }

    
    
    public function updateadmissionteacher (Request $request, $ref_no1){

        $edit_students = User::where('ref_no1', $ref_no1)->first();
       
        $request->validate([
            'fname' => ['nullable', 'string', 'max:255'],
            'surname' => ['nullable', 'string'],
            'middlename' => ['nullable', 'string'],
            'age' => ['nullable', 'string'],
            'bloodgroup' => ['nullable', 'string'],
            'genotype' => ['nullable', 'string'],
            'previouschoolname' => ['nullable', 'string'],
            'preclassname' => ['nullable', 'string'],
            'gender' => ['nullable', 'string'],
            'classname' => ['nullable', 'string'],
            'lastschooladdress' => ['nullable', 'string'],
            'disability' => ['nullable', 'string'],
            'dob' => ['nullable', 'string'],
            'section' => ['nullable', 'string'],
           'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        // dd($request->all());

        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }else{

            $path = 'noimage.jpg';
        }


        $edit_students['images'] = $path;
        $edit_students->surname = $request->surname;
        $edit_students->middlename = $request->middlename;
        $edit_students->previouschoolname = $request->previouschoolname;
        $edit_students->fname = $request->fname;
        $edit_students->age = $request->age;
        $edit_students->dob = $request->dob;
        $edit_students->gender = $request->gender;
        $edit_students->bloodgroup = $request->bloodgroup;
        $edit_students->genotype = $request->genotype;
        
       $edit_students->preclassname = $request->preclassname;
        $edit_students->classname = $request->classname;
        $edit_students->lastschooladdress = $request->lastschooladdress;
        $edit_students->disability = $request->disability;
        $edit_students->section = $request->section;
       
        $edit_students->update();
        return redirect()->back()->with('success', 'You have successfully add child to parent');

    }

    public function updateadmission (Request $request, $ref_no1){

        $edit_students = User::where('ref_no1', $ref_no1)->first();
       
        $request->validate([
            'fname' => ['nullable', 'string', 'max:255'],
            'surname' => ['nullable', 'string'],
            'middlename' => ['nullable', 'string'],
            'age' => ['nullable', 'string'],
            'bloodgroup' => ['nullable', 'string'],
            'genotype' => ['nullable', 'string'],
            'previouschoolname' => ['nullable', 'string'],
            'preclassname' => ['nullable', 'string'],
            'gender' => ['nullable', 'string'],
            'classname' => ['nullable', 'string'],
            'lastschooladdress' => ['nullable', 'string'],
            'disability' => ['nullable', 'string'],
            'dob' => ['nullable', 'string'],
            'section' => ['nullable', 'string'],
           'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        // dd($request->all());

        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }else{

            $path = 'noimage.jpg';
        }


        $edit_students['images'] = $path;
        $edit_students->surname = $request->surname;
        $edit_students->middlename = $request->middlename;
        $edit_students->previouschoolname = $request->previouschoolname;
        $edit_students->fname = $request->fname;
        $edit_students->age = $request->age;
        $edit_students->dob = $request->dob;
        $edit_students->gender = $request->gender;
        $edit_students->bloodgroup = $request->bloodgroup;
        $edit_students->genotype = $request->genotype;
        
       $edit_students->preclassname = $request->preclassname;
        $edit_students->classname = $request->classname;
        $edit_students->lastschooladdress = $request->lastschooladdress;
        $edit_students->disability = $request->disability;
        $edit_students->section = $request->section;
       
        $edit_students->update();
        return redirect()->back()->with('success', 'You have successfully add child to parent');

    }

    public function deleteparent($ref_no){
        $print_admissionform = User::where('ref_no', $ref_no)->delete();
        return redirect()->back()->with('success', 'You deleted successfully');
    }
    
    
    public function printadmissionform($ref_no){
        $print_admissionform = User::where('ref_no', $ref_no)->first();
        return view('pages.printadmissionform', compact('print_admissionform'));
    }

    public function edityourstudent($ref_no1){
        $edit_students = User::where('ref_no1', $ref_no1)->first();
        $add_class = Classname::latest()->get();
        return view('dashboard.edityourstudent', compact('add_class', 'edit_students'));
    }

    public function changeclassterm($ref_no1){
        $edit_students = User::where('ref_no1', $ref_no1)->first();
        $add_class = Classname::latest()->get();
        return view('dashboard.changeclassterm', compact('add_class', 'edit_students'));
    }

    public function updateclassterm(Request $request, $ref_no1){
        $edit_students = User::where('ref_no1', $ref_no1)->first();

        $request->validate([
            'term' => ['required', 'string', 'max:255'],
            'classname' => ['required', 'string', 'max:255'],
        ]);

        $edit_students->term = $request->term;
        $edit_students->classname = $request->classname;
        $edit_students->update();
        if ($edit_students) {
            return redirect()->back()->with('success', 'You have updated the student status successfully');
        }else{

            return redirect()->back()->with('success', 'You have not updated the student status successfully');

        }
    }

    
   public function adminprogress(){
        $admin_progress = User::where('role', 'student')->where('section', 'Primary')->latest()->get();
    return view('dashboard.admin.adminprogress', compact('admin_progress'));
   }

   public function viewstudent($ref_no1){
    $view_students = User::where('ref_no1', $ref_no1)->first();
    return view('dashboard.admin.viewstudent', compact('view_students'));
    }
    public function editstudent($ref_no1){
        $edit_students = User::where('ref_no1', $ref_no1)->first();
        $add_class = Classname::all();
        return view('dashboard.admin.editstudent', compact('add_class', 'edit_students'));
    }

    
    public function rejectstudent($ref_no1){
        $reject_student = User::where('ref_no1', $ref_no1)->first();
        $reject_student->status = 'reject';
        $reject_student->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }
    public function rejectedstudent(){
        $reject_students = User::where('role', 'student')->where('status', 'reject')->get();
        return view('dashboard.admin.rejectedstudent', compact('reject_students'));
    }
    public function suspendstudent($ref_no1){
        $suspend_student = User::where('ref_no1', $ref_no1)->first();
        $suspend_student->status = 'suspend';
        $suspend_student->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }
    public function suspendstudents(){
        $suspend_students = User::where('status', 'suspend')->get();
        return view('dashboard.admin.suspendstudents', compact('suspend_students'));
    }

    public function studentsaddmit($ref_no1){
        $admit_student = User::where('ref_no1', $ref_no1)->first();
        $admit_student->status = 'admitted';
        $admit_student->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }
    public function parentsaddmit($ref_no){
        $admit_student = User::where('ref_no', $ref_no)->first();
        $admit_student->status = 'admitted';
        $admit_student->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }
    public function suspendparent($ref_no){
        $admit_student = User::where('ref_no', $ref_no)->first();
        $admit_student->status = 'suspend';
        $admit_student->save();
        return redirect()->back()->with('success', 'you have suspend successfully');
    }
     
    public function editparent($ref_no){
        $edit_parent = User::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.editparent', compact('edit_parent'));
    }
    
    public function admittedstudents(){
        $admit_students = User::where('role', 'student')->where('section', 'Secondary')->latest()->get();
        return view('dashboard.admin.admittedstudents', compact('admit_students'));
    }
    public function addregno($ref_no1){
        $student_regno = User::where('ref_no1', $ref_no1)->first();
        return view('dashboard.admin.addregno', compact('student_regno'));
    }

    public function addingregno(Request $request, $id){
        $student_regno = User::where('id', $id)->first();
        $request->validate([
            //'regnumber' => ['nullable', 'string', 'max:255'],
            'regnumber' => ['nullable', 'string', 'max:255', 'unique:users'],

        ]);
       
        $student_regno->regnumber = $request->regnumber;
        $student_regno->update();
        if ($student_regno) {
            return redirect()->back()->with('success', 'you have successfully registered');
                
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }
    public function studentpdf($ref_no1){
        $print_students = User::where('ref_no1', $ref_no1)->first();
        return view('dashboard.admin.studentpdf', compact('print_students'));
    }

    public function medicalspdf($ref_no1){
        $printmedi_students = User::where('ref_no1', $ref_no1)->first();
        return view('dashboard.admin.medicalspdf', compact('printmedi_students'));
    }
    public function allstudents(){
        $all_students = User::latest()->where('role', 'student')->get();
        return view('dashboard.admin.allstudents', compact('all_students'));
    }
    public function allstudentpdf(){
        $printall_students = User::where('role', 'student')->latest()->get();
        return view('dashboard.admin.allstudentpdf', compact('printall_students'));
    }

    public function allcrechepdf(){
        $printallcreche_students = User::where('section', 'Creche')->latest()->get();
        return view('dashboard.admin.allcrechepdf', compact('printallcreche_students'));
    }

    public function allnurserypdf(){
        $printallnursery_students = User::where('section', 'Nursery')->latest()->get();
        return view('dashboard.admin.allnurserypdf', compact('printallnursery_students'));
    }
    public function allprimarypdf(){
        $printallPrimary_students = User::where('role', 'student')->where('section', 'Primary')->latest()->get();
        return view('dashboard.admin.allprimarypdf', compact('printallPrimary_students'));
    }

    public function allhighschpdf(){
        $printallhigh_students = User::where('role', 'student')->where('section', 'High School')->latest()->get();
        return view('dashboard.admin.allhighschpdf', compact('printallhigh_students'));
    }

 

    public function alluyocrechepdf(){
        $printalluyo_creches = User::where('centername', 'Uyo')
        ->where('section', 'Creche')->latest()->get();
        return view('dashboard.admin.alluyocrechepdf', compact('printalluyo_creches'));
    }

    public function alluyopreperatorypdf(){
        $printalluyo_preparatories = User::where('section', 'Preparatory')
        ->where('centername', 'Uyo')
        ->latest()->get();
        return view('dashboard.admin.alluyopreperatorypdf', compact('printalluyo_preparatories'));
    }

    public function allpreschoolpdf(){
        $printalluyo_preschools = User::where('centername', 'Uyo')
        ->where('section', 'Pre-School')->latest()->get();
        return view('dashboard.admin.allpreschoolpdf', compact('printalluyo_preschools'));
    }
    public function alluyonurserypdf(){
        $printalluyo_nurserys = User::where('centername', 'Uyo')
        ->where('section', 'Nursery')->latest()->get();
        return view('dashboard.admin.alluyonurserypdf', compact('printalluyo_nurserys'));
    }
    public function alluyoprimarypdf(){
        $printalluyo_primaries = User::where('centername', 'Uyo')
        ->where('section', 'Primary')->latest()->get();
        return view('dashboard.admin.alluyoprimarypdf', compact('printalluyo_primaries'));
    }

    public function alluyohighschpdf(){
        $printalluyo_highschools = User::where('centername', 'Uyo')
        ->where('section', 'High School')->latest()->get();
        return view('dashboard.admin.alluyohighschpdf', compact('printalluyo_highschools'));
    }

    public function alluyocentpdf(){
        $printall_uyocenters = User::where('centername', 'Uyo')->latest()->get();
        return view('dashboard.admin.alluyocentpdf', compact('printall_uyocenters'));
    }
    public function allabujapdf(){
        $printall_abujacenters = User::where('centername', 'Abuja')->latest()->get();
        return view('dashboard.admin.allabujapdf', compact('printall_abujacenters'));
    }
    
    public function viewpreparatory(){
        $display_uyopreparatorys = User::where('centername', 'Uyo')
        ->where('section', 'Preparatory')
        ->latest()->get();
        return view('dashboard.admin.viewpreparatory', compact('display_uyopreparatorys'));
    }
    public function viewpreschool(){
        $display_uyopreschools = User::where('centername', 'Uyo')
        ->where('section', 'Pre-School')
        ->latest()->get();
        return view('dashboard.admin.viewpreschool', compact('display_uyopreschools'));
    }
    public function viewnursery(){
        $display_uyonurserys = User::where('centername', 'Uyo')
        ->where('section', 'Nursery')
        ->latest()->get();
        return view('dashboard.admin.viewnursery', compact('display_uyonurserys'));
    }

    public function viewprimary(){
        $display_uyoprimarys = User::where('centername', 'Uyo')
        ->where('section', 'Primary')
        ->latest()->get();
        return view('dashboard.admin.viewprimary', compact('display_uyoprimarys'));
    }
    public function viewhighschool(){
        $display_uyohighschools = User::where('centername', 'Uyo')
        ->where('section', 'High School')
        ->latest()->get();
        return view('dashboard.admin.viewhighschool', compact('display_uyohighschools'));
    }

    public function viewallabuja(){
        $display_abujas = User::where('centername', 'Abuja')->where('role', null)
        ->latest()->get();
        return view('dashboard.admin.viewallabuja', compact('display_abujas'));
    }

    public function allabujacrechepdf(){
        $display_abujacrechs = User::where('centername', 'Abuja')
        ->where('section', 'Creche')
        ->latest()->get();
        return view('dashboard.admin.allabujacrechepdf', compact('display_abujacrechs'));
    }

    public function allabujapreperatorypdf(){
        $print_allabujapreparatorys = User::where('centername', 'Abuja')
        ->where('section', 'Preparatory')
        ->latest()->get();
        return view('dashboard.admin.allabujapreperatorypdf', compact('print_allabujapreparatorys'));
    }
    
    public function allabujapreschoolpdf(){
        $print_allabjpreschools = User::where('centername', 'Abuja')
        ->where('section', 'Pre-School')
        ->latest()->get();
        return view('dashboard.admin.allabujapreschoolpdf', compact('print_allabjpreschools'));
    }

    public function allabujanurserypdf(){
        $print_allabjnurserys = User::where('centername', 'Abuja')
        ->where('section', 'Nursery')
        ->latest()->get();
        return view('dashboard.admin.allabujanurserypdf', compact('print_allabjnurserys'));
    }

    public function allabujaprimarypdf(){
        $print_allabjprimarys = User::where('centername', 'Abuja')
        ->where('section', 'Primary')
        ->latest()->get();
        return view('dashboard.admin.allabujaprimarypdf', compact('print_allabjprimarys'));
    }
    public function allabujahighschpdf(){
        $print_allabjhighschools = User::where('centername', 'Abuja')
        ->where('section', 'Primary')
        ->latest()->get();
        return view('dashboard.admin.allabujahighschpdf', compact('print_allabjhighschools'));
    }

    public function viewabujapreparatory(){
        $view_abjpreparatorys = User::where('centername', 'Abuja')
        ->where('section', 'Preparatory')
        ->latest()->get();
        return view('dashboard.admin.viewabujapreparatory', compact('view_abjpreparatorys'));
    }

    public function abujapreschool(){
        $view_abjpreschools = User::where('centername', 'Abuja')
        ->where('section', 'Preparatory')
        ->latest()->get();
        return view('dashboard.admin.abujapreschool', compact('view_abjpreschools'));
    }
    public function viewabujanursery(){
        $view_abjnurserys = User::where('centername', 'Abuja')
        ->where('section', 'Nursery')
        ->latest()->get();
        return view('dashboard.admin.viewabujanursery', compact('view_abjnurserys'));
    }

    public function viewabujaprimary(){
        $view_abjprimarys = User::where('centername', 'Abuja')
        ->where('section', 'Nursery')
        ->latest()->get();
        return view('dashboard.admin.viewabujaprimary', compact('view_abjprimarys'));
    }

    
    public function viewabjhighschool(){
        $view_abjhighschools = User::where('centername', 'Abuja')
        ->where('section', 'High School')
        ->latest()->get();
        return view('dashboard.admin.viewabjhighschool', compact('view_abjhighschools'));
    }
    
    public function checkfirst (Request $request){
        $request->validate([
            'email' => ['nullable', 'string', 'email', 'max:255', 'exists:users'],
            'password' => ['nullable', 'string', 'min:3']
        ], [
            'email.exist'=>'This email does not exist in the admins table'
        ]);
        $creds = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($creds)) {
            return redirect()->route('web.home')->with('success', 'You have successfully login');
        }else{
            return redirect()->route('login')->with('error', 'Failed to login');
        }

    }

    public function home(){

        $countlessonnotes = Lessonnote::where('user_id', auth::guard('web')->id())->count();
        $countyourresults = Result::where('teacher_id', auth::guard('web')->id())->count();
        $countqueries = Query::where('user_id', auth::guard('web')->id())
        ->where('status', null)
        ->count();
        $countreplyqueries = Query::where('user_id', auth::guard('web')->id())
        ->where('status', 'reply')
        ->count();
        $countmysubjects = Teacherassign::where('user_id', auth::guard('web')->id())->count();
       $countmyactivity = Classactivity::where('user_id', auth::guard('web')->id())->count();
        return view('dashboard/home', compact('countlessonnotes', 'countmyactivity', 'countmysubjects', 'countreplyqueries', 'countqueries', 'countyourresults'));
    }

    public function profile($ref_no1){
        $view_profile = User::where('ref_no1', $ref_no1)->first();
        return view('dashboard.profile', compact('view_profile'));
    }

    public function admisionletter(){

        return view('dashboard.admisionletter');
    }

    public function registerteacher(){
       $dsplay_classes = Classname::all();
        return view('dashboard.registerteacher', compact('dsplay_classes'));
    }

    public function createteacher (Request $request){
       
        $request->validate([
            'fname' => ['nullable', 'string', 'max:255'],
            'surname' => ['nullable', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'middlename' => ['nullable', 'string'],
            'classname' => ['nullable', 'string'],
            'password' => ['nullable', 'string'],
            'section' => ['nullable', 'string'],
            'term' => ['nullable', 'string'],
            
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);

        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }else{

            $path = 'noimage.jpg';
        }

        $addteachers = new User();
        $addteachers['images'] = $path;
        $addteachers->surname = $request->surname;
        $addteachers->fname = $request->fname;
        $addteachers->middlename = $request->middlename;
        $addteachers->email = $request->email;
        $addteachers->section = $request->section;
        
        $addteachers->role = 'teacher';
        $addteachers->status = 'teacher';
        $addteachers->term = $request->term;
        $addteachers->classname = $request->classname;
        $addteachers->password = \Hash::make($request->password);
        $addteachers->ref_no1 = substr(rand(0,time()),0, 9);
        $addteachers->save();
        if ($addteachers) {
            return redirect()->route('web.home')->with('success', 'you have successfully registered');
                
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }
   
    public function printclasses(Request $request){
        $request->validate([
            'classname' => ['nullable', 'string'],
            'centername' => ['nullable', 'string'],
        ]);
        if($getyour_classes = user::where('classname', $request->classname)
        ->where('centername', $request->centername)
        ->exists()) {
            $getyour_classes = User::orderby('created_at', 'DESC')
            ->where('centername', $request->centername)
            ->where('classname', $request->classname)
       
            ->get(); 
            }else{
                return redirect()->back()->with('fail', 'There is no students in these class!');
            }
            return view('dashboard.admin.printregclass', compact('getyour_classes'));

        }


        public function firsterm(){
            $view_terms = User::where('term', 'First Term')->latest()->get();
          
            return view('dashboard.firsterm', compact('view_terms'));
        }

        public function secondterm(){
            $view_terms = User::where('term', 'Second Term')->latest()->get();
            return view('dashboard.secondterm', compact('view_terms'));
        }

        public function assignedteacher($section){
            $assign_teachers = User::where('section', $section)->first();
            $view_teachers = User::where('section', $section)
            ->where('status', 'teacher')->get();

            $view_classes = Classname::all();

            return view('dashboard.admin.assignedteacher', compact('view_classes', 'view_teachers', 'assign_teachers'));
        }

        public function assignteachertoclass (Request $request, $ref_no1){
            $add_assignteacher = User::where('ref_no1', $ref_no1)->first();
            $request->validate([
               
                'classname' => ['nullable', 'string', 'max:255'],
                'term' => ['nullable', 'string', 'max:255'],
                'section' => ['nullable', 'string', 'max:255'],
                
            ]);
            $add_assignteacher->classname = $request->classname;
            $add_assignteacher->term = $request->term;
            $add_assignteacher->section = $request->section;
            $add_assignteacher->update();
    
            return redirect()->back()->with('success', 'you have added successfully');
    
        }
         
        public function assignedstudent($ref_no1){
            $assign_teachers = User::where('ref_no1', $ref_no1)->first();
            $view_classes = Classname::all();
            return view('dashboard.assignedstudent', compact('view_classes', 'assign_teachers'));
        }
        
        public function thirdterm(){
            $view_terms = User::where('term', 'Third Term')->latest()->get();
          
            return view('dashboard.thirdterm', compact('view_terms'));
        }

        public function assignstudentclass(Request $request, $ref_no){
        $add_assignstudents = User::where('ref_no', $ref_no)->first();
        $request->validate([
            'classname' => ['nullable', 'string', 'max:255'],
            'term' => ['nullable', 'string', 'max:255'],
        ]);
        
        $add_assignstudents->classname = $request->classname;
        $add_assignstudents->term = $request->term;
 
        $add_assignstudents->update();

        return redirect()->back()->with('success', 'you have added successfully');
    }

    public function viewteachers(){
        $view_teachers = User::where('status', 'teacher')->get();
        return view('dashboard.admin.viewteachers', compact('view_teachers'));
    }

    public function viewsingleteacher($ref_no1){
        $view_singteachers = User::where('ref_no1', $ref_no1)->first();
        return view('dashboard.admin.viewsingleteacher', compact('view_singteachers'));
    }

    public function editteacher($ref_no1){
        $edit_singteachers = User::where('ref_no1', $ref_no1)->first();
        $view_classnames = Classname::all();
        
        return view('dashboard.admin.editteacher', compact('view_classnames', 'edit_singteachers'));
    }
    

    public function teacherupdated(Request $request, $ref_no1){
        $edit_singteachers = User::where('ref_no1', $ref_no1)->first();
       
        $request->validate([
            'fname' => ['nullable', 'string', 'max:255'],
            'surname' => ['nullable', 'string'],
            // 'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['nullable', 'string'],
            'middlename' => ['nullable', 'string'],
            'classname' => ['nullable', 'string'],
            'gender' => ['nullable', 'string'],
      
            'section' => ['nullable', 'string'],
            'term' => ['nullable', 'string'],
            
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);

        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }else{

            $path = 'noimage.jpg';
        }

        $edit_singteachers['images'] = $path;
        $edit_singteachers->surname = $request->surname;
        $edit_singteachers->fname = $request->fname;
        $edit_singteachers->middlename = $request->middlename;
        $edit_singteachers->phone = $request->phone;
        $edit_singteachers->section = $request->section;
        $edit_singteachers->gender = $request->gender;
       
        $edit_singteachers->term = $request->term;
        $edit_singteachers->classname = $request->classname;
       
        $edit_singteachers->update();
        if ($edit_singteachers) {
            return redirect()->back()->with('success', 'you have successfully updated');
                
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }

    public function teacherapprove($ref_no1){
        $approved_teacher = User::where('ref_no1', $ref_no1)->first();
        $approved_teacher->role = 'approved';
        $approved_teacher->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }

    public function teachersuspend($ref_no1){
        $approved_teacher = User::where('ref_no1', $ref_no1)->first();
        $approved_teacher->role = 'suspend';
        $approved_teacher->save();
        return redirect()->back()->with('success', 'you have suspend successfully');
    }

    public function teachersacked($ref_no1){
        $approved_teacher = User::where('ref_no1', $ref_no1)->first();
        $approved_teacher->role = 'sacked';
        $approved_teacher->save();
        return redirect()->back()->with('success', 'you have sacked successfully');
    }
    
    public function teacherquery($ref_no1){
        $query_singteachers = User::where('ref_no1', $ref_no1)->first();

        return view('dashboard.admin.teacherquery', compact('query_singteachers'));
    }
    public function teachersprint(){
        $print_teachers = User::where('status', 'teacher')->get();

        return view('dashboard.admin.teachersprint', compact('print_teachers'));
    }

    public function approveteachers(){
        $approves_teachers = User::where('role', 'approved')->get();
        return view('dashboard.admin.approveteachers', compact('approves_teachers'));
    }
    public function suspendedteachers(){
        $suspend_teachers = User::where('role', 'suspend')->get();
        return view('dashboard.admin.suspendedteachers', compact('suspend_teachers'));
    }
    public function sackedteachers(){
        $sacked_teachers = User::where('role', 'sacked')->get();
        return view('dashboard.admin.sackedteachers', compact('sacked_teachers'));
    }

    public function queriedteachers(){
        $queried_teachers = User::where('role', 'sacked')->get();
        return view('dashboard.admin.queriedteachers', compact('queried_teachers'));
    }

    public function allteachers(){
        $all_teachers = User::where('status', 'teacher')->get();
        return view('dashboard.admin.allteachers', compact('all_teachers'));
    }
    
    public function primaryteachers(){
        $view_uyoteachers = User::where('status', 'teacher')
        ->where('section', 'Primary')->get();
        return view('dashboard.admin.primaryteachers', compact('view_uyoteachers'));
    }
    public function secondaryteachers(){
        $view_abujateachers = User::where('status', 'teacher')
        ->where('section', 'Secondary')->get();
        return view('dashboard.admin.secondaryteachers', compact('view_abujateachers'));
    }
    public function studentsubjects($ref_no1){
        $view_studentsubjects = User::where('ref_no1', $ref_no1)->first();
        $view_subjects = Subject::where('section', 'Primary')->get();
        return view('dashboard.admin.studentsubjects', compact('view_studentsubjects', 'view_subjects'));
    }


    public function studentsubjectbyhead($ref_no1){
        $view_studentsubjects = User::where('ref_no1', $ref_no1)->first();
        $view_subjects = Subject::where('section', 'Primary')->get();
        return view('dashboard.studentsubjectbyhead', compact('view_studentsubjects', 'view_subjects'));
    }

    public function studentsubjectsbyheads($ref_no1){
        $view_studentsubjects = User::where('ref_no1', $ref_no1)->first();
        $view_subjects = Subject::where('section', 'Secondary')->get();
        return view('dashboard.studentsubjectsbyheads', compact('view_studentsubjects', 'view_subjects'));
    }
    
    public function studentsubjectsall($ref_no1){
        $view_studentsubjects = User::where('ref_no1', $ref_no1)->first();
        $view_subjects = Subject::all();
        return view('dashboard.studentsubjectsall', compact('view_studentsubjects', 'view_subjects'));
    }
    

    public function addresults($ref_no1){
        $view_studentsubject = User::where('ref_no1', $ref_no1)->first();
         
        // $view_teachersubjects = Subject::all();
        $view_teachersubjects = Teacherassign::where('user_id', auth::guard('web')->id())->get();
        return view('dashboard.addresults', compact('view_studentsubject', 'view_teachersubjects'));
    }

    
    public function addmidtermresults($ref_no1){
        $view_studentsubject = User::where('ref_no1', $ref_no1)->first();
         
        // $view_teachersubjects = Subject::all();
        $view_teachersubjects = Teacherassign::where('user_id', auth::guard('web')->id())->get();
        return view('dashboard.addmidtermresults', compact('view_studentsubject', 'view_teachersubjects'));
    }

    

    public function changeclasses ($ref_no){
        $assign_classestoTeacher = User::where('ref_no', $ref_no)->first();
        $view_centernames = Studycenter::all();
        $classnames = Classname::all();
        return view('dashboard.admin.changeclasses', compact('classnames', 'view_centernames', 'assign_classestoTeacher'));
    }
    
    public function changgeteacherclass (Request $request, $id){
        $change_classestoTeacher = User::find($id);
        $request->validate([
            'classname' => ['nullable', 'string', 'max:255'],
            'centername' => ['nullable', 'string', 'max:255'],
            'term' => ['nullable', 'string'],
            'section' => ['nullable', 'string'],
        ]);
      
        $change_classestoTeacher->classname = $request->classname;
        $change_classestoTeacher->centername = $request->centername;
        $change_classestoTeacher->term = $request->term;
        $change_classestoTeacher->section = $request->section;
        $change_classestoTeacher->update();
        if ($change_classestoTeacher) {
            return redirect()->back()->with('success', 'you have added successfully');
            
        }else{
            return redirect()->back()->with('fail', 'you have not added successfully');
        }

    }
   
    public function preschoolteachers(){
        $view_uyoteachers = User::where('status', 'teacher')
        ->where('section', 'Pre-School')->get();
        return view('dashboard.admin.preschoolteachers', compact('view_uyoteachers'));
    }


    public function addrole($id){
        $view_teachers = User::find($id);
        $view_classes = Classname::latest()->get();
        return view('dashboard.admin.addrole', compact('view_classes', 'view_teachers'));
    }

    public function viewroles(){
        $view_roles = User::where('status', 'teacher')->where('role', 'approved')->get();
        return view('dashboard.admin.viewroles', compact('view_roles'));
    }


    public function createrol (Request $request, $id){
        $add_roles = User::find($id);
        $request->validate([
            'promotion' => ['nullable', 'string', 'max:255'],
            'fname' => ['nullable', 'string', 'max:255'],
            'section' => ['nullable', 'string', 'max:255'],
            'classname' => ['nullable', 'string', 'max:255'],
        ]);
      
        $add_roles->fname = $request->fname;
        $add_roles->promotion = $request->promotion;
        $add_roles->section = $request->section;
        $add_roles->classname = $request->classname;
        $add_roles->update();
       
 
        if ($add_roles) {
            return redirect()->back()->with('success', 'you have successfully registered');
                
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }


    public function promotions(){
        $view_classess = Classname::all();
        $view_classstudents = User::all();
        return view('dashboard.promotions', compact('view_classess', 'view_classstudents'));
    }



    public function crecheheads(){
        $view_classess = Classname::all();
        $view_crecheclassstudents = User::where('section', 'Creche')->get();
        return view('dashboard.crecheheads', compact('view_classess', 'view_crecheclassstudents'));
    }

    public function nurseryschoolheads(){
        $view_classess = Classname::all();
        $view_nurseryclassstudents = User::where('section', 'Nursery')->get();
        return view('dashboard.nurseryschoolheads', compact('view_classess', 'view_nurseryclassstudents'));
    }
    
    public function printstudents ($ref_no1){
        $printyouchild = User::where('ref_no1', $ref_no1)->first();

        return view('dashboard.printstudents', compact('printyouchild'));
    }
    public function teacherdelete ($ref_no1){
        $printyouchild = User::where('ref_no1', $ref_no1)->delete();

        return redirect()->back()->with('success', 'you have successfully deleted the teacher');
    }
    

    public function preschoolheads(){
        $view_classess = Classname::all();
        $view_preschoolstudents = User::where('section', 'Pre-School')->get();
        return view('dashboard.preschoolheads', compact('view_classess', 'view_preschoolstudents'));
    }
    public function primaryheads(){
        $view_classess = Classname::where('section', 'Primary')->get();
        $view_primarystudents = User::where('section', 'Primary')->get();
        return view('dashboard.primaryheads', compact('view_classess', 'view_primarystudents'));
    }

   public function viewparent($ref_no){
        $view_parent = User::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.viewparent', compact('view_parent'));
    }

    public function highschools(){
        $view_classess = Classname::where('section', 'Secondary')->get();
        $view_highstudents = User::where('section', 'Secondary')->get();
        return view('dashboard.highschools', compact('view_classess', 'view_highstudents'));
    }

    
    public function preschoolshead(){
        $view_classess = Classname::where('section', 'Pre-School')->get();
        $view_highstudents = User::where('section', 'Pre-School')->get();
        return view('dashboard.preschoolshead', compact('view_classess', 'view_highstudents'));
    }

    public function preschoolad(){
        // $view_classess = Classname::where('section', 'Pre-School')->get();
        $view_preschools = User::where('role', 'student')->where('section', 'Pre-School')->get();
        return view('dashboard.admin.preschoolad', compact('view_preschools'));
    }

    public function viewaddresults(){
        $view_classess = Classname::where('section', 'Secondary')->get();
        $view_highstudents = User::where('section', 'Secondary')->get();
        return view('dashboard.viewaddresults', compact('view_classess', 'view_highstudents'));
    }
    
    public function createsection(){
        $view_classess = Classname::all();
        $view_crechsectionstudents = User::where('section', 'Creche')->get();
        return view('dashboard.createsection', compact('view_classess', 'view_crechsectionstudents'));
    }
    public function preschoolsection(){
        $view_classess = Classname::all();
        $view_preschstudents = User::where('section', 'Pre-School')->get();
        return view('dashboard.preschoolsection', compact('view_classess', 'view_preschstudents'));
    }
    public function primarysection(){
        $view_classess = Classname::where('section', 'Primary')->get();
        $view_primarystudents = User::where('section', 'Primary')->get();
        return view('dashboard.primarysection', compact('view_classess', 'view_primarystudents'));
    }

    public function nurserysection(){
        $view_classess = Classname::all();
        $view_nuserystudents = User::where('section', 'Nursery')->get();
        return view('dashboard.nurserysection', compact('view_classess', 'view_nuserystudents'));
    }
    public function highschoolsection(){
        $view_classess = Classname::where('section', 'Secondary')->get();
        $view_highstudents = User::where('section', 'Secondary')->get();
        return view('dashboard.highschoolsection', compact('view_classess', 'view_highstudents'));
    }
    public function addparent(){
        $display_acasessions = Academicsession::all();
        return view('dashboard.admin.addparent', compact('display_acasessions'));
    }
    public function createparent1(Request $request){
        

        $request->validate([
        'fathername' => ['required', 'string'],
        'section' => ['required', 'string'],
        'mothername' => ['required', 'string'],
        'motheroccupation' => ['required', 'string'],
        'fatheroccupation' => ['required', 'string'],
        'phone' => ['required', 'string', 'unique:users'],
        
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
        
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        

        'fname' => ['nullable', 'string', 'max:255'],
        'surname' => ['nullable', 'string'],
        'middlename' => ['nullable', 'string'],
        'age' => ['nullable', 'string'],
        'bloodgroup' => ['nullable', 'string'],
        'genotype' => ['nullable', 'string'],
        'previouschoolname' => ['nullable', 'string'],
        'preclassname' => ['nullable', 'string'],
        'gender' => ['nullable', 'string'],
        'classname' => ['nullable', 'string'],
        'lastschooladdress' => ['nullable', 'string'],
        'disability' => ['nullable', 'string'],
        'dob' => ['nullable', 'string'],
        'ref_no' => ['nullable', 'string'],
        'section' => ['nullable', 'string'],
        'academic_session' => ['nullable', 'string'],
        'term' => ['nullable', 'string'],
        'password' => ['nullable', 'string'],
        'cpassword' => 'required|min:5|max:30|same:cpassword',
        //'images' => 'nullable|mimes:jpg,png,jpeg'
        
        ]);
        //dd($request->all());
        $addsec_admission = new User ();
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
        $addsec_admission->role = 'student';
        $addsec_admission->designation = 'parent';
        $addsec_admission->academic_session = $request->academic_session;
        
        
        $addsec_admission->password = \Hash::make($request->password);

        $addsec_admission->save();

        return redirect()->back()->with('success', 'You have seccessfully register one Parent')->withInput();

    }
    
    public function parentviewstudent($ref_no1){
        $viewyour_child = User::where('ref_no1', $ref_no1)->first();
        $view_classes = Classname::all();
        return view('dashboard.parentviewstudent', compact('view_classes', 'viewyour_child'));
    }

    public function parenteditstudent ($ref_no1){
        $editby_parent = User::where('ref_no1', $ref_no1)->first();
        $view_classes = Classname::all();
        return view('dashboard.parenteditstudent', compact('view_classes', 'editby_parent'));
    }

    public function updatebyparent(Request $request, $ref_no1){

        $editby_parent = User::where('ref_no1', $ref_no1)->first();
       
        $request->validate([
            'fname' => ['nullable', 'string', 'max:255'],
            'surname' => ['nullable', 'string'],
            'middlename' => ['nullable', 'string'],
            'age' => ['nullable', 'string'],
            'bloodgroup' => ['nullable', 'string'],
            'genotype' => ['nullable', 'string'],
            'previouschoolname' => ['nullable', 'string'],
            'preclassname' => ['nullable', 'string'],
            'gender' => ['nullable', 'string'],
            'classname' => ['nullable', 'string'],
            'lastschooladdress' => ['nullable', 'string'],
            'disability' => ['nullable', 'string'],
            'dob' => ['nullable', 'string'],
            'section' => ['nullable', 'string'],
            'term' => ['nullable', 'string'],
            'gender' => ['nullable', 'string'],
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        // dd($request->all());

        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }else{

            $path = 'noimage.jpg';
        }


        $editby_parent['images'] = $path;
        $editby_parent->surname = $request->surname;
        $editby_parent->term = $request->term;
        $editby_parent->middlename = $request->middlename;
        $editby_parent->previouschoolname = $request->previouschoolname;
        $editby_parent->fname = $request->fname;
        $editby_parent->age = $request->age;
        $editby_parent->dob = $request->dob;
        $editby_parent->gender = $request->gender;
        $editby_parent->bloodgroup = $request->bloodgroup;
        $editby_parent->genotype = $request->genotype;
        
       $editby_parent->preclassname = $request->preclassname;
        $editby_parent->classname = $request->classname;
        $editby_parent->lastschooladdress = $request->lastschooladdress;
        $editby_parent->disability = $request->disability;
        $editby_parent->section = $request->section;
       
        $editby_parent->update();
        return redirect()->back()->with('success', 'You have successfully edited your child ');

    }


    public function addparenteacher(){
       $view_classes = Classname::all();
       $acas = Academicsession::all();
        return view('dashboard.addparenteacher', compact('acas', 'view_classes'));
    }

    public function addyourchild($id){
        $add_childtoparent = User::find($id);
       $view_classes = Classname::all();
       $acas = Academicsession::all();
        return view('dashboard.addyourchild', compact('add_childtoparent', 'acas', 'view_classes'));
    }
    public function yourchildren(){
        $viewyour_childrens = User::where('user_id', auth::guard('web')->id()
        )->get();
        return view('dashboard.yourchildren', compact('viewyour_childrens'));
    }
    public function payment(){
        $viewyour_childrens = User::where('user_id', auth::guard('web')->id()
        )->where('term', 'First Term')->get();
        return view('dashboard.payment', compact('viewyour_childrens'));
    }

    public function buspayment(){
        $bus_payments = User::where('user_id', auth::guard('web')->id()
        )->where('term', 'First Term')->get();
        return view('dashboard.buspayment', compact('bus_payments'));
    }
    public function feedingpaypayment(){
        $bus_payments = User::where('user_id', auth::guard('web')->id()
        )->where('term', 'First Term')->get();
        return view('dashboard.feedingpaypayment', compact('bus_payments'));
    }
    public function partypayment(){
        $bus_payments = User::where('user_id', auth::guard('web')->id()
        )->where('term', 'First Term')->get();
        return view('dashboard.partypayment', compact('bus_payments'));
    }
    

    public function payschoolfees($classname){
        $pay_fees = User::where('classname', $classname)->first();
        $view_classpayments = Payment::where('classname', $classname)->where('feeding', 'school')
        ->get();
        return view('dashboard.payschoolfees', ['pay_fees' => $pay_fees, 'view_classpayments' => $view_classpayments]);
    }
    public function payfeeding($classname){
        $pay_fees = User::where('classname', $classname)->first();
        $view_classpayments = Payment::where('classname', $classname)
        ->where('feeding', 'feeding')->get();
        return view('dashboard.payfeeding', ['pay_fees' => $pay_fees, 'view_classpayments' => $view_classpayments]);
    }

    public function paybuservicefee($classname){
        $pay_fees = User::where('classname', $classname)->first();
        $view_classpayments = Payment::where('classname', $classname)
        ->where('feeding', 'trans')->get();
        return view('dashboard.paybuservicefee', ['pay_fees' => $pay_fees, 'view_classpayments' => $view_classpayments]);
    }

    public function paypartfee($classname){
        $pay_fees = User::where('classname', $classname)->first();
        $view_classpayments = Payment::where('classname', $classname)
        ->where('feeding', 'party')->get();
        return view('dashboard.paypartfee', ['pay_fees' => $pay_fees, 'view_classpayments' => $view_classpayments]);
    }
    
    
    
    public function addyourchildren (Request $request){
       
        $request->validate([
            'fname' => ['nullable', 'string', 'max:255'],
            'surname' => ['nullable', 'string'],
            'middlename' => ['nullable', 'string'],
            'age' => ['nullable', 'string'],
            'bloodgroup' => ['nullable', 'string'],
            'genotype' => ['nullable', 'string'],
            'previouschoolname' => ['nullable', 'string'],
            'preclassname' => ['nullable', 'string'],
            'gender' => ['nullable', 'string'],
            'classname' => ['nullable', 'string'],
            'lastschooladdress' => ['nullable', 'string'],
            'disability' => ['nullable', 'string'],
            'dob' => ['nullable', 'string'],
            'ref_no' => ['nullable', 'string'],
            'section' => ['nullable', 'string'],
            'academic_session' => ['nullable', 'string'],
            'term' => ['nullable', 'string'],
            'mothername' => ['nullable', 'string'],
           'user_id' => ['nullable', 'string'],
           'teacher_id' => ['nullable', 'string'],

            'images' => 'nullable|mimes:jpg,png,jpeg',
            

        ]);
        // dd($request->all());
        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }else{

            $path = 'noimage.jpg';
        }

        $add_adimission = new User();

        $add_adimission['images'] = $path;
        $add_adimission->surname = $request->surname;
        $add_adimission->middlename = $request->middlename;
        $add_adimission->previouschoolname = $request->previouschoolname;
        $add_adimission->fname = $request->fname;
        $add_adimission->age = $request->age;
        $add_adimission->dob = $request->dob;
        $add_adimission->gender = $request->gender;
        $add_adimission->bloodgroup = $request->bloodgroup;
        $add_adimission->genotype = $request->genotype;
        $add_adimission->mothername = $request->mothername;
        
       $add_adimission->preclassname = $request->preclassname;
       $add_adimission->user_id = $request->user_id;
       $add_adimission->teacher_id = $request->teacher_id;
    //    $add_adimission->student_id = $request->student_id;
        $add_adimission->classname = $request->classname;
        $add_adimission->lastschooladdress = $request->lastschooladdress;
        $add_adimission->disability = $request->disability;
        $add_adimission->section = $request->section;
        $add_adimission->academic_session = $request->academic_session;
        $add_adimission->term = $request->term;
        $add_adimission->role = 'student';
        // $add_adimission->term = $request->term;
        // $add_adimission->classname = $request->classname;
         $add_adimission->ref_no = $request->ref_no;
        
        // $add_adimission->password = \Hash::make($request->password);
        $add_adimission->ref_no1 = substr(rand(0,time()),0, 9);

        $add_adimission->save();

        if ($add_adimission) {
            DB::table('users')->updateOrInsert(
                ['user_id' => $add_adimission->user_id],
                // [
                //    'student_id' => Auth::guard('web')->user()->id,
                //     //'last_name' => $user->last_name,
                //     // Add more fields as needed
                // ]
            );
        }

        return redirect()->back()->with('success', 'You have successfully add child to parent');

    }



    public function add_childto_parents (Request $request){
       
        $request->validate([
            'fname' => ['nullable', 'string', 'max:255'],
            'surname' => ['nullable', 'string'],
            'middlename' => ['nullable', 'string'],
            'age' => ['nullable', 'string'],
            'bloodgroup' => ['nullable', 'string'],
            'genotype' => ['nullable', 'string'],
            'previouschoolname' => ['nullable', 'string'],
            'preclassname' => ['nullable', 'string'],
            'gender' => ['nullable', 'string'],
            'classname' => ['nullable', 'string'],
            'lastschooladdress' => ['nullable', 'string'],
            'disability' => ['nullable', 'string'],
            'dob' => ['nullable', 'string'],
            'ref_no' => ['nullable', 'string'],
            'section' => ['nullable', 'string'],
            'academic_session' => ['nullable', 'string'],
            'term' => ['nullable', 'string'],
            'mothername' => ['nullable', 'string'],
            'user_id' => ['nullable', 'string'],
            'teacher_id' => ['nullable', 'string'],

            'images' => 'nullable|mimes:jpg,png,jpeg',
            

        ]);
        // dd($request->all());
        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }else{

            $path = 'noimage.jpg';
        }

        $add_adimission = new User();

        $add_adimission['images'] = $path;
        $add_adimission->surname = $request->surname;
        $add_adimission->middlename = $request->middlename;
        $add_adimission->previouschoolname = $request->previouschoolname;
        $add_adimission->fname = $request->fname;
        $add_adimission->age = $request->age;
        $add_adimission->dob = $request->dob;
        $add_adimission->gender = $request->gender;
        $add_adimission->bloodgroup = $request->bloodgroup;
        $add_adimission->genotype = $request->genotype;
        $add_adimission->mothername = $request->mothername;
        
       $add_adimission->preclassname = $request->preclassname;
       $add_adimission->user_id = $request->user_id;
       $add_adimission->teacher_id = $request->teacher_id;
    //    $add_adimission->student_id = $request->student_id;
        $add_adimission->classname = $request->classname;
        $add_adimission->lastschooladdress = $request->lastschooladdress;
        $add_adimission->disability = $request->disability;
        $add_adimission->section = $request->section;
        $add_adimission->academic_session = $request->academic_session;
        $add_adimission->term = $request->term;
        $add_adimission->role = 'student';
        // $add_adimission->term = $request->term;
        // $add_adimission->classname = $request->classname;
         $add_adimission->ref_no = $request->ref_no;
        
        // $add_adimission->password = \Hash::make($request->password);
        $add_adimission->ref_no1 = substr(rand(0,time()),0, 9);

        $add_adimission->save();

        if ($add_adimission) {
            DB::table('users')->updateOrInsert(
                ['user_id' => $add_adimission->user_id],
                // [
                //    'student_id' => Auth::guard('web')->user()->id,
                //     //'last_name' => $user->last_name,
                //     // Add more fields as needed
                // ]
            );
        }

        return redirect()->back()->with('success', 'You have successfully add child to parent');

    }


    public function teacherform(){
            $view_classes = Classname::all();
        return view('dashboard.teacherform', compact('view_classes'));
    }

    public function viewparenteacher(){
        $view_parents = User::where('user_id', auth::guard('web')->id())->latest()->get();
        return view('dashboard.viewparenteacher', compact('view_parents'));
    }

    public function viewyourstudents(){
        $view_students = User::where('teacher_id', auth::guard('web')->id())->latest()->get();
        return view('dashboard.viewyourstudents', compact('view_students'));
    }

    
    // public function viewparent($ref_no){
    //     $view_parent = Guardian::where('ref_no', $ref_no)->first();
    //     return view('dashboard.admin.viewparent', compact('view_parent'));
    // }
    
    public function sendspec ($id){
        $viewparent_sendpecti = User::find($id);
        return view('dashboard.sendspec', compact('viewparent_sendpecti'));
    }
    

    public function addresultsad1($ref_no1){
        $view_studentsubject = User::where('ref_no1', $ref_no1)->first();
         
        $view_teachersubjects = Subject::all();
       // $view_teachersubjects = Teacherassign::where('user_id', auth::guard('web')->id())->get();
        return view('dashboard.admin.addresultsad1', compact('view_teachersubjects','view_studentsubject'));
    }
    public function currentresult(){
        $view_yourresults = User::where('user_id', auth::guard('user')->id()
        )->get();
        return view('dashboard.currentresult', compact('view_yourresults'));
    }


    
    public function admissions(){
        $view_classes = Classname::latest()->get();
        $acas = Academicsession::latest()->get();
        
        return view('dashboard.admissions', compact('acas', 'view_classes'));
    }

    public function viewsingleparent($ref_no){
        $view_singleparent = User::where('ref_no', $ref_no)->first();
        return view('dashboard.viewsingleparent', compact('view_singleparent'));
    }

    public function editsingleparent($ref_no){
        $edit_singleparent = User::where('ref_no', $ref_no)->first();
        return view('dashboard.editsingleparent', compact('edit_singleparent'));
    }
    
    public function updateparent(Request $request, $ref_no){
        $edit_parent = User::where('ref_no', $ref_no)->first();
        

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


    public function updateparenteacher(Request $request, $ref_no){
        $edit_singleparent = User::where('ref_no', $ref_no)->first();
        

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
        $edit_singleparent->section = $request->section;
        $edit_singleparent->fathername = $request->fathername;
        $edit_singleparent->mothername = $request->mothername;
        $edit_singleparent->phone = $request->phone;
        $edit_singleparent->fatheroccupation = $request->fatheroccupation;
        $edit_singleparent->motheroccupation = $request->motheroccupation;
        $edit_singleparent->maritalstatus = $request->maritalstatus;
        $edit_singleparent->officeaddress = $request->officeaddress;
        $edit_singleparent->homeaddress = $request->homeaddress;
        $edit_singleparent->stateoforigin = $request->stateoforigin;
        $edit_singleparent->doctorname = $request->doctorname;
        $edit_singleparent->doctorphone = $request->doctorphone;
        $edit_singleparent->emergencyphone = $request->emergencyphone;
        $edit_singleparent->emergencyaddress = $request->emergencyaddress;
        $edit_singleparent->whointro = $request->whointro;
        // $edit_singleparent->emergencyphone = $request->emergencyphone;
        $edit_singleparent->academic_session = $request->academic_session;
        
        $edit_singleparent->update();

        return redirect()->back()->with('success', 'You have seccessfully updated one Parent')->withInput();

    }
    public function viewparents(){
        $view_parents = User::where('designation', 'parent')->latest()->get();
        return view('dashboard.admin.viewparents', compact('view_parents'));
    }

    public function highschoolparents(){

        $view_highschoolparents = User::where('designation', 'parent')
        ->where('section', 'Secondary')->latest()->get();
        return view('dashboard.highschoolparents', compact('view_highschoolparents'));
    }

    public function preschoolheadparents(){

        $view_highschoolparents = User::where('designation', 'parent')
        ->where('section', 'Pre-School')->latest()->get();
        return view('dashboard.preschoolheadparents', compact('view_highschoolparents'));
    }

    public function elementaryheadparents(){

        $view_highschoolparents = User::where('designation', 'parent')
        ->where('section', 'Primary')->latest()->get();
        return view('dashboard.elementaryheadparents', compact('view_highschoolparents'));
    }
    
    
    
    public function approvedparent($ref_no){
        $approve_parents = User::where('ref_no', $ref_no)->first();
        $approve_parents->status = 'admitted';
        $approve_parents->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect('login');
    }


 
    
    
   
    
    
}
