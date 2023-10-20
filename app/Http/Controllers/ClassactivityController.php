<?php

namespace App\Http\Controllers;

use App\Models\Classactivity;
use App\Models\User;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;
class ClassactivityController extends Controller
{
    //
    public function addaclassctivities(){

        return view('dashboard.addaclassctivities');
    }

    

    public function createclassactivity (Request $request){
        //dd($request->all());

        $request->validate([
            'user_id' => ['required', 'string', 'max:255'],
            'classname' => ['required', 'string', 'max:255'],
            'section' => ['required', 'string', 'max:255'],
           
            'subject' => ['required', 'string'],
            'youtube' => ['required', 'string'],
            'topic' => ['required', 'string'],
            'messages' => ['required', 'string'],
            // 'images' => 'required|mimes:jpg,png,jpeg'

            
        ]);
        // dd($request->all());
        $add_classactivity = new Classactivity();
        $add_classactivity->user_id = $request->user_id;
        $add_classactivity->classname = $request->classname;
        $add_classactivity->section = $request->section;
        $add_classactivity->images = $request->images;
        $add_classactivity->topic = $request->topic;
        $add_classactivity->slug = SlugService::createSlug(Classactivity::class, 'slug', $request->topic);
        $add_classactivity->subject = $request->subject;
        $add_classactivity->youtube = $request->youtube;
        $add_classactivity->messages = $request->messages;
        $add_classactivity->save();
        if ($add_classactivity) {
            return redirect()->back()->with('success', 'you have added successfully');
            
        }else{
            return redirect()->back()->with('fail', 'you have not added successfully');
        }

    }
    public function viewclassactivity(){
        $view_activities = Classactivity::where('user_id', auth::guard('web')->id()
        )->get();
        return view('dashboard.viewclassactivity', compact('view_activities'));
    }
    public function viewsingleactivies($slug){
        $view_singlactivity = Classactivity::where('slug', $slug)->first();
        return view('dashboard.viewsingleactivies', compact('view_singlactivity'));
    }

    public function editactivies($slug){
        $edit_activities = Classactivity::where('slug', $slug)->first();
        return view('dashboard.editactivies', compact('edit_activities'));
    }
    
    public function updateclassactivity(Request $request, $id){
        $edit_activities = Classactivity::find($id);


        $request->validate([
            'user_id' => ['required', 'string', 'max:255'],
            'subject' => ['required', 'string'],
            'youtube' => ['required', 'string'],
            'topic' => ['required', 'string'],
            'messages' => ['required', 'string'],
            // 'images' => 'required|mimes:jpg,png,jpeg'

            
        ]);
     
        $edit_activities->user_id = $request->user_id;
        $edit_activities->topic = $request->topic;
        $edit_activities->subject = $request->subject;
        $edit_activities->youtube = $request->youtube;
        $edit_activities->messages = $request->messages;
        $edit_activities->update();
        if ($edit_activities) {
            return redirect()->back()->with('success', 'you have edited successfully');
            
        }else{
            return redirect()->back()->with('fail', 'you have not added successfully');
        }

    }
    

    public function sendtospecificparent (){
        $viewparent_sendactivites = User::where('status', null)->get();
        return view('dashboard.sendtospecificparent', compact('viewparent_sendactivites'));
    }


    
    public function createclassactivityspec (Request $request){
        $request->validate([
            'user_id' => ['required', 'string', 'max:255'],
            'student_id' => ['required', 'string', 'max:255'],
           
            'subject' => ['required', 'string'],
            'youtube' => ['required', 'string'],
            'topic' => ['required', 'string'],
            'messages' => ['required', 'string'],
            // 'images' => 'required|mimes:jpg,png,jpeg'

            
        ]);
        // dd($request->all());
        $add_classactivity = new Classactivity();
        $add_classactivity->user_id = $request->user_id;
        $add_classactivity->student_id = $request->student_id;
        $add_classactivity->topic = $request->topic;
        $add_classactivity->slug = SlugService::createSlug(Classactivity::class, 'slug', $request->topic);
        $add_classactivity->subject = $request->subject;
        $add_classactivity->youtube = $request->youtube;
        $add_classactivity->messages = $request->messages;
        $add_classactivity->save();
        if ($add_classactivity) {
            return redirect()->back()->with('success', 'you have added successfully');
            
        }else{
            return redirect()->back()->with('fail', 'you have not added successfully');
        }
        
    }


    public function viewspecific (){
        $view_specifics = Classactivity::where('user_id', auth::guard('web')->id()
        )->get();
        return view('dashboard.viewspecific', compact('view_specifics'));
    }

    public function viewclassactivitypare (){
        
        $vieew_clasactivities = Classactivity::where('status', 'approved')->get();
        return view('dashboard.viewclassactivitypare', compact('vieew_clasactivities'));
    }

    public function addclassactivitiesad (){
       
        return view('dashboard.admin.addclassactivitiesad');
    }

    public function viewclassactivityparespecial (){
        $view_specialactivities = Classactivity::where('student_id', auth::guard('web')->id()
        )->where('status', 'approved')->get();
        return view('dashboard.viewclassactivityparespecial', compact('view_specialactivities'));
    }

    

    

    public function createclassactivityad (Request $request){
        //dd($request->all());

        $request->validate([
            'user_id' => ['required', 'string', 'max:255'],
           
            'subject' => ['required', 'string'],
            'youtube' => ['required', 'string'],
            'topic' => ['required', 'string'],
            'messages' => ['required', 'string'],
            // 'images' => 'required|mimes:jpg,png,jpeg'

            
        ]);
        // dd($request->all());
        $add_classactivity = new Classactivity();
        $add_classactivity->user_id = $request->user_id;
        $add_classactivity->images = $request->images;
        $add_classactivity->topic = $request->topic;
        $add_classactivity->slug = SlugService::createSlug(Classactivity::class, 'slug', $request->topic);
        $add_classactivity->subject = $request->subject;
        $add_classactivity->youtube = $request->youtube;
        $add_classactivity->messages = $request->messages;
        $add_classactivity->save();
        if ($add_classactivity) {
            return redirect()->back()->with('success', 'you have added successfully');
            
        }else{
            return redirect()->back()->with('fail', 'you have not added successfully');
        }

    }

    public function viewclassactivitiesads(){

        $view_aclassactivitis = Classactivity::all();
        return view('dashboard.admin.viewclassactivitiesads', compact('view_aclassactivitis'));
    }


    public function viewclassactivities(){

        $view_activities = Classactivity::all();
        return view('dashboard.viewclassactivities', compact('view_activities'));
    }
    

    public function viewsingclassactivity($slug){

        $view_singclassactivitis = Classactivity::where('slug', $slug)->first();
        return view('dashboard.admin.viewsingclassactivity', compact('view_singclassactivitis'));
    }
    public function editclassactivity($slug){

        $edit_singclassactivitis = Classactivity::where('slug', $slug)->first();
        return view('dashboard.admin.editclassactivity', compact('edit_singclassactivitis'));
    }
    
    
    public function updateclassactivityad(Request $request, $slug){
        $edit_activitiesad = Classactivity::where('slug', $slug)->first();


        $request->validate([
            'user_id' => ['required', 'string', 'max:255'],
            'subject' => ['required', 'string'],
            'youtube' => ['required', 'string'],
            'topic' => ['required', 'string'],
            'messages' => ['required', 'string'],

        ]);
     
        $edit_activitiesad->user_id = $request->user_id;
        $edit_activitiesad->topic = $request->topic;
        $edit_activitiesad->subject = $request->subject;
        $edit_activitiesad->youtube = $request->youtube;
        $edit_activitiesad->messages = $request->messages;
        $edit_activitiesad->update();
        if ($edit_activitiesad) {
            return redirect()->back()->with('success', 'you have edited successfully');
            
        }else{
            return redirect()->back()->with('fail', 'you have not added successfully');
        }

    }
    
    public function classactivityapproved($slug){
        $approved_classactivity = Classactivity::where('slug', $slug)->first();
        $approved_classactivity->status = 'approved';
        $approved_classactivity->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }
    
    public function classactivitysuspend($slug){
        $approved_classactivity = Classactivity::where('slug', $slug)->first();
        $approved_classactivity->status = 'suspend';
        $approved_classactivity->save();
        return redirect()->back()->with('success', 'you have suspend successfully');
    }

    public function suspendclassactivity($slug){
        $approved_classactivity = Classactivity::where('slug', $slug)->first();
        $approved_classactivity->status = 'suspend';
        $approved_classactivity->save();
        return redirect()->back()->with('success', 'you have suspend successfully');
    }

    

    public function approveclassactivity($slug){
        $approved_classactivity = Classactivity::where('slug', $slug)->first();
        $approved_classactivity->status = 'approved';
        $approved_classactivity->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }
    
    public function classactivitydelete($slug){
        $approved_classactivity = Classactivity::where('slug', $slug)->delete();
       
        return redirect()->back()->with('success', 'you have deleted successfully');
    }

    public function parentviewsingleactivity($slug){
       $view_singleclassactivities = Classactivity::where('slug', $slug)->first();
        return view('dashboard.parentviewsingleactivity', compact('view_singleclassactivities'));
    }
    public function replyclassactivity($id){
        $view_singleclassactivities = Classactivity::find($id);
         return view('dashboard.replyclassactivity', compact('view_singleclassactivities'));
     }


     public function replyclassactivitys (Request $request, $id){
      //  dd($request->all());
        $view_singleclassactivities = Classactivity::find($id);
//dd($request->all());
        $request->validate([
            'user_id' => ['required', 'string', 'max:255'],
            'student_id' => ['required', 'string'],
            // 'fname' => ['required', 'string'],
            // 'surname' => ['required', 'string'],
            // 'classname' => ['required', 'string'],
            // 'middlename' => ['required', 'string'],
           
            'subject' => ['required', 'string'],
           
            'topic' => ['required', 'string'],
            'messages' => ['required', 'string'],
            // 'images' => 'required|mimes:jpg,png,jpeg'

            
        ]);
        // dd($request->all());
        $view_singleclassactivities = new Classactivity();
        $view_singleclassactivities->student_id = $request->student_id;
        $view_singleclassactivities->user_id = $request->user_id;
        $view_singleclassactivities->topic = $request->topic;
        $view_singleclassactivities->slug = SlugService::createSlug(Classactivity::class, 'slug', $request->topic);
        $view_singleclassactivities->subject = $request->subject;
        $view_singleclassactivities->messages = $request->messages;
        $view_singleclassactivities->reply = 'reply';
        $view_singleclassactivities->save();
        if ($view_singleclassactivities) {
            return redirect()->back()->with('success', 'you have added successfully');
            
        }else{
            return redirect()->back()->with('fail', 'you have not added successfully');
        }

    }

    public function classactivities(){
        $view_aclassactivitisbyheads = Classactivity::where('section', 'Secondary')->latest()->get();
        return view('dashboard.classactivities', compact('view_aclassactivitisbyheads'));
    }
    
    
}


