<?php

namespace App\Http\Controllers;
use App\Models\Account;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AccountController extends Controller
{
    public function createaccount (Request $request){
        //create method
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:accounts'],
            'password' => ['required', 'string', 'min:8'],
            'cpassword' => 'required|min:5|max:30|same:cpassword'
           
        ]);
        $registration = new Account();
        $registration->name = $request->name;
        $registration->email = $request->email;
        $registration->password = \Hash::make($request->password);
        $registration->save();
 
        if ($registration) {
            return redirect()->route('account.home')->with('success', 'you have successfully registered');
                
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }

    

    public function checkaccount (Request $request){
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'exists:accounts'],
            'password' => ['required', 'string', 'min:8']
        ], [
            'email.exist'=>'This email does not exist in the accounts table'
        ]);
        $creds = $request->only('email', 'password');
        if (Auth::guard('account')->attempt($creds)) {
            return redirect()->route('account.home')->with('success', 'You have successfully login');
        }else{
            return redirect()->route('account.login')->with('error', 'Failed to login');
        }
    }

    public function home(){
        // $countstudent = User::where('role', null)->count();
        // $countsubjects = Subject::count();
        // $countsubjecthigh = Subject::where('section', 'High School')->count();
        // $countsubjectprim = Subject::where('section', 'Primary')->count();
        // $countteacher = User::where('status', 'teacher')->count();
        // $countteacheruyo = User::where('centername', 'Uyo')
        // ->where('status', 'teacher')->count();
        // $countteacherabuja = User::where('centername', 'Abuja')
        // ->where('status', 'teacher')->count();
        // $countstudenttsuspend = User::where('status', 'suspend')->count();
        // $countstudentapprove = User::where('status', 'suspend')->count();
        // $countstudentreject = User::where('status', 'reject')->count();
        // $countsqueries = Query::count();
        // $countsrepliedqueries = Query::where('status', 'reply')->count();
        // $countsevents = Event::where('status', 'reply')->count();
        $countspayment = Payment::count();
        
        
        return view('dashboard.account.home', compact('countspayment'));
    }

    public function profile() {

        return view('dashboard.account.profile');
    }


    public function addpayment(){

        return view('dashboard.account.addpayment');
    }
    public function ssdd(Request $request){
       
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255'],

            'phone' => ['required', 'string'],
            'address' => ['required', 'string'],
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
       // dd($request->all());
        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }
        $edit_profiles['images'] = $path;
        $edit_profiles->name = $request->name;
        $edit_profiles->email = $request->email;
        $edit_profiles->address = $request->address;
        $edit_profiles->phone = $request->phone;
        $edit_profiles->designation = $request->designation;


        $edit_profiles->update();

        return redirect()->back()->with('success', 'you have update successfully');

    }



    public function logout(){
        Auth::guard('account')->logout();
        return redirect('account/login');
    }
}
