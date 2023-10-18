<?php

namespace App\Http\Controllers;

use App\Models\Academicsession;
use App\Models\Classname;
use App\Models\Lessonnote;
use App\Models\Subject;
use App\Models\Teacherassign;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class LessonnoteController extends Controller
{
    //
    public function addlessonnotes(){
        
        $view_academics = Academicsession::latest()->get();
       $view_teachersubjects = Teacherassign::where('user_id', auth::guard('web')->id())->get();

        return view('dashboard.addlessonnotes', compact('view_teachersubjects', 'view_academics'));
    }

    public function createlessonotes (Request $request){
        
        $request->validate([
            'user_id' => ['required', 'string', 'max:255'],
            'section' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'subjectname' => ['required', 'string', 'max:255'],
            'academic_session' => ['required', 'string', 'max:255'],
            'classname' => ['required', 'string', 'max:255'],
            'messages' => ['nullable', 'string'],
            'term' => ['nullable', 'string'],
            'images' => 'nullable|mimes:doc,docm,docx,dot'

            
        ]);
        // dd($request->all());

        if ($request->hasFile('images')){
            $file = $request['images'];
            $filename = 'gda-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }else{

            $path = 'noimage.jpg';
        }
        $add_lessonnote = new Lessonnote();

        $add_lessonnote['images'] = $path;
        $add_lessonnote->term = $request->term;
        $add_lessonnote->user_id = $request->user_id;
        $add_lessonnote->slug = SlugService::createSlug(Lessonnote::class, 'slug', $request->title);
        
        $add_lessonnote->academic_session = $request->academic_session;
        $add_lessonnote->classname = $request->classname;
        $add_lessonnote->subjectname = $request->subjectname;
        $add_lessonnote->title = $request->title;
        $add_lessonnote->section = $request->section;
        $add_lessonnote->messages = $request->messages;
        $add_lessonnote->save();
        if ($add_lessonnote) {
            return redirect()->back()->with('success', 'you have added successfully');
            
        }else{
            return redirect()->back()->with('fail', 'you have not added successfully');
        }

    }

    public function viewlessonnotesad(){
        $view_lessonnotes = Lessonnote::latest()->get();
        return view('dashboard.admin.viewlessonnotesad', compact('view_lessonnotes'));
    }

    public function viewsinglelesson($slug){
        $view_lessonnotesingle = Lessonnote::where('slug', $slug)->first();
        return view('dashboard.admin.viewsinglelesson', compact('view_lessonnotesingle'));
    }

    public function editsinglenotesad($id){
        $edit_lessonnotesingle = Lessonnote::find($id);
        return view('dashboard.admin.editsinglenotesad', compact('edit_lessonnotesingle'));
    }
    

    public function updatelesoonote (Request $request, $id){
        $edit_lessonnotesingle = Lessonnote::find($id);
        
        $request->validate([
            'user_id' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'subjectname' => ['required', 'string', 'max:255'],
            'academic_session' => ['required', 'string', 'max:255'],
            'classname' => ['required', 'string', 'max:255'],
            'messages' => ['nullable', 'string'],
            'term' => ['nullable', 'string'],
            'images' => 'nullable|mimes:doc,docm,docx,dot'

            
        ]);

        if ($request->hasFile('images')){
            $file = $request['images'];
            $filename = 'gda-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }else{

            $path = 'noimage.jpg';
        }
       

        $edit_lessonnotesingle['images'] = $path;
        $edit_lessonnotesingle->term = $request->term;
        $edit_lessonnotesingle->user_id = $request->user_id;
        $edit_lessonnotesingle->slug = SlugService::createSlug(Lessonnote::class, 'slug', $request->title);
        
        $edit_lessonnotesingle->academic_session = $request->academic_session;
        $edit_lessonnotesingle->classname = $request->classname;
        $edit_lessonnotesingle->subjectname = $request->subjectname;
        $edit_lessonnotesingle->title = $request->title;
        $edit_lessonnotesingle->messages = $request->messages;
        $edit_lessonnotesingle->update();
        if ($edit_lessonnotesingle) {
            return redirect()->back()->with('success', 'you have added successfully');
            
        }else{
            return redirect()->back()->with('fail', 'you have not added successfully');
        }

    }
    public function rejectlessonnote($slug){
        $reject_student = Lessonnote::where('slug', $slug)->first();
        $reject_student->status = 'reject';
        $reject_student->save();
        return redirect()->back()->with('success', 'you have reject successfully');
    }

    public function suspendlessonnotes($slug){
        $reject_student = Lessonnote::where('slug', $slug)->first();
        $reject_student->status = 'suspend';
        $reject_student->save();
        return redirect()->back()->with('success', 'you have suspended successfully');
    }
    public function lesonapprove($slug){
        $reject_student = Lessonnote::where('slug', $slug)->first();
        $reject_student->status = 'approved';
        $reject_student->save();
        return redirect()->back()->with('success', 'you have suspended successfully');
    }

    
    public function deleteslessonnote($slug){
        $view_lessonnotesingle = Lessonnote::where('slug', $slug)->first();
        return redirect()->back()->with('success', 'you have suspended successfully');

    }

    
    public function lessonnoteview(){
       $view_teacherlessonnotes = Lessonnote::where('user_id', auth::guard('web')->id())->get();

        return view('dashboard.lessonnoteview', compact('view_teacherlessonnotes'));
    }
    public function viewlessonnotesteacher($slug){
        $view_singlessonnotes = Lessonnote::where('slug', $slug)->first();
         return view('dashboard.viewlessonnotesteacher', compact('view_singlessonnotes'));
     }

     public function editlessonteacher($id){
        $edit_singlessonnotes = Lessonnote::where('id', $id)->first();
         return view('dashboard.editlessonteacher', compact('edit_singlessonnotes'));
     }
    

     public function updatelessonotesteacher (Request $request, $id){
        $edit_singlessonnotes = Lessonnote::where('id', $id)->first();

        
        $request->validate([
            'user_id' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'subjectname' => ['required', 'string', 'max:255'],
            'academic_session' => ['required', 'string', 'max:255'],
            'classname' => ['required', 'string', 'max:255'],
            'messages' => ['nullable', 'string'],
            'term' => ['nullable', 'string'],
            'images' => 'nullable|mimes:doc,docm,docx,dot'

            
        ]);

        if ($request->hasFile('images')){
            $file = $request['images'];
            $filename = 'gda-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }else{

            $path = 'noimage.jpg';
        }
       

        $edit_singlessonnotes['images'] = $path;
        $edit_singlessonnotes->term = $request->term;
        $edit_singlessonnotes->user_id = $request->user_id;
        $edit_singlessonnotes->slug = SlugService::createSlug(Lessonnote::class, 'slug', $request->title);
        
        $edit_singlessonnotes->academic_session = $request->academic_session;
        $edit_singlessonnotes->classname = $request->classname;
        $edit_singlessonnotes->subjectname = $request->subjectname;
        $edit_singlessonnotes->title = $request->title;
        $edit_singlessonnotes->messages = $request->messages;
        $edit_singlessonnotes->update();
        if ($edit_singlessonnotes) {
            return redirect()->back()->with('success', 'you have added successfully');
            
        }else{
            return redirect()->back()->with('fail', 'you have not added successfully');
        }

    }

    public function highschoolessonnotes(){
        $view_classess = Classname::where('section', 'Secondary')->get();
        $view_primarystudents = Lessonnote::where('section', 'Secondary')->get();
        return view('dashboard.highschoolessonnotes', compact('view_classess', 'view_primarystudents'));
    }

    public function preschoollessonnotes(){
        $view_classess = Classname::where('section', 'Pre-School')->get();
        $view_primarystudents = Lessonnote::where('section', 'Pre-School')->get();
        return view('dashboard.preschoollessonnotes', compact('view_classess', 'view_primarystudents'));
    }
    

    public function elementarylessonnotes(){
        $view_classess = Classname::where('section', 'Primary')->get();
        $view_primarystudents = Lessonnote::where('section', 'Primary')->get();
        return view('dashboard.elementarylessonnotes', compact('view_classess', 'view_primarystudents'));
    }
    
    public function approvelesssons($id){
        $reject_student = Lessonnote::find($id);
        $reject_student->status = 'approved';
        $reject_student->save();
        return redirect()->back()->with('success', 'you have approve the lesson notes successfully');
    }

    public function rejectlesssons($id){
        $reject_student = Lessonnote::find($id);
        $reject_student->status = 'reject';
        $reject_student->save();
        return redirect()->back()->with('success', 'you have rejected the lesson notes successfully');
    }
    public function suspendlesssons($id){
        $reject_student = Lessonnote::find($id);
        $reject_student->status = 'suspend';
        $reject_student->save();
        return redirect()->back()->with('success', 'you have suspended the lesson notes successfully');
    }


    
    public function deletelesons($id){
        $reject_student = Lessonnote::where('id', $id)->delete();
        
        return redirect()->back()->with('success', 'you have suspended the lesson notes successfully');
    }

    
    
     
}
