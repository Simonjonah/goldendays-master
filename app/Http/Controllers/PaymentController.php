<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use App\Models\Classname;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Paystack;

class PaymentController extends Controller
{
 




    public function addpayment(){
        $view_classes = Classname::all();
        return view('dashboard.account.addpayment', compact('view_classes'));
    }

    public function addfeedingpayment(){
      $view_classes = Classname::all();
      return view('dashboard.account.addfeedingpayment', compact('view_classes'));
    }

  public function addbusfeespaymentad(){
    $view_classes = Classname::all();
    return view('dashboard.admin.addbusfeespaymentad', compact('view_classes'));
  }

  public function addpartyfeespaymentad(){
    $view_classes = Classname::all();
    return view('dashboard.admin.addpartyfeespaymentad', compact('view_classes'));
  }
  
  
  public function addbuspayment(){
    $view_classes = Classname::all();
    return view('dashboard.account.addbuspayment', compact('view_classes'));
  }
  public function addpartypayment(){
    $view_classes = Classname::all();
    return view('dashboard.account.addpartypayment', compact('view_classes'));
  }

  public function addfeedingfeespaymentad(){
    $view_classes = Classname::all();
    return view('dashboard.admin.addfeedingfeespaymentad', compact('view_classes'));
  }

  

    public function payment(){

      return view('dashboard.guardian.payment');
    }

    public function updatepayments (Request $request, $id){
      $edit_fees = Payment::find($id);
          $request->validate([
            //   'user_id' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'string'],
            'classname' => ['required', 'string'],
            'extracuri_fee' => ['nullable', 'string'],
            'term' => ['nullable', 'string'],
            'medicals' => ['nullable', 'string'],
            'dev_amount' => ['nullable', 'string'],
            'bookamount' => ['nullable', 'string'],
            'uniforms_amount' => ['nullable', 'string'],
            'pta_amount' => ['nullable', 'string'],
            'form_amount' => ['nullable', 'string'],
            'tuition' => ['nullable', 'string'],
            
              
          ]);
        //    dd($request->all());
         
          $edit_fees->tuition = $request->tuition;
          $edit_fees->amount = $request->amount;
          $edit_fees->extracuri_fee = $request->extracuri_fee;
          $edit_fees->classname = $request->classname;
          $edit_fees->term = $request->term;
          $edit_fees->medicals = $request->medicals;
          $edit_fees->dev_amount = $request->dev_amount;
          $edit_fees->bookamount = $request->bookamount;
          $edit_fees->uniforms_amount = $request->uniforms_amount;
          $edit_fees->pta_amount = $request->pta_amount;
          $edit_fees->form_amount = $request->form_amount;
          $edit_fees->update();
          if ($edit_fees) {
              return redirect()->back()->with('success', 'you have added successfully');
              
          }else{
              return redirect()->back()->with('fail', 'you have not added successfully');
          }
    }

    public function createpayments (Request $request){
      
      $request->validate([
        //   'user_id' => ['required', 'string', 'max:255'],
        'amount' => ['required', 'string'],
        'classname' => ['required', 'string'],
        'extracuri_fee' => ['nullable', 'string'],
        'term' => ['required', 'string'],
        'medicals' => ['nullable', 'string'],
        'dev_amount' => ['nullable', 'string'],
        'bookamount' => ['nullable', 'string'],
        'uniforms_amount' => ['nullable', 'string'],
        'pta_amount' => ['nullable', 'string'],
        'form_amount' => ['nullable', 'string'],
        'tuition' => ['nullable', 'string'],
       
          
      ]);
    //    dd($request->all());
      $view_singleclassactivities = new Payment();
      $view_singleclassactivities->amount = $request->amount;
      $view_singleclassactivities->tuition = $request->tuition;

      $view_singleclassactivities->extracuri_fee = $request->extracuri_fee;
      $view_singleclassactivities->classname = $request->classname;
      $view_singleclassactivities->term = $request->term;
      $view_singleclassactivities->medicals = $request->medicals;
      $view_singleclassactivities->dev_amount = $request->dev_amount;
      $view_singleclassactivities->bookamount = $request->bookamount;
      $view_singleclassactivities->uniforms_amount = $request->uniforms_amount;
      $view_singleclassactivities->pta_amount = $request->pta_amount;
      $view_singleclassactivities->form_amount = $request->form_amount;
      $view_singleclassactivities->feeding = 'school';
      
     
      $view_singleclassactivities->save();
      if ($view_singleclassactivities) {
          return redirect()->back()->with('success', 'you have added successfully');
          
      }else{
          return redirect()->back()->with('fail', 'you have not added successfully');
      }
}


public function createpaymentsads (Request $request){
      
  $request->validate([
    //   'user_id' => ['required', 'string', 'max:255'],
    'amount' => ['required', 'string'],
    'classname' => ['required', 'string'],
    'extracuri_fee' => ['nullable', 'string'],
    'term' => ['required', 'string'],
    'medicals' => ['nullable', 'string'],
    'dev_amount' => ['nullable', 'string'],
    'bookamount' => ['nullable', 'string'],
    'uniforms_amount' => ['nullable', 'string'],
    'pta_amount' => ['nullable', 'string'],
    'form_amount' => ['nullable', 'string'],
    'tuition' => ['nullable', 'string'],
   
      
  ]);
//    dd($request->all());
  $view_singleclassactivities = new Payment();
  $view_singleclassactivities->amount = $request->amount;
  $view_singleclassactivities->tuition = $request->tuition;

  $view_singleclassactivities->extracuri_fee = $request->extracuri_fee;
  $view_singleclassactivities->classname = $request->classname;
  $view_singleclassactivities->term = $request->term;
  $view_singleclassactivities->medicals = $request->medicals;
  $view_singleclassactivities->dev_amount = $request->dev_amount;
  $view_singleclassactivities->bookamount = $request->bookamount;
  $view_singleclassactivities->uniforms_amount = $request->uniforms_amount;
  $view_singleclassactivities->pta_amount = $request->pta_amount;
  $view_singleclassactivities->form_amount = $request->form_amount;
  $view_singleclassactivities->feeding = 'school';
  
 
  $view_singleclassactivities->save();
  if ($view_singleclassactivities) {
      return redirect()->back()->with('success', 'you have added successfully');
      
  }else{
      return redirect()->back()->with('fail', 'you have not added successfully');
  }
}


public function createfeeding(Request $request){
      
  $request->validate([
   
    'amount' => ['required', 'string'],
    'classname' => ['required', 'string'],
    'term' => ['required', 'string'],

  ]);
//    dd($request->all());
  $view_singleclassactivities = new Payment();
  $view_singleclassactivities->amount = $request->amount;
  $view_singleclassactivities->classname = $request->classname;
  $view_singleclassactivities->term = $request->term;
  $view_singleclassactivities->feeding = 'feeding';
  $view_singleclassactivities->save();
  if ($view_singleclassactivities) {
      return redirect()->back()->with('success', 'you have added successfully');
      
  }else{
      return redirect()->back()->with('fail', 'you have not added successfully');
  }


}


public function createfeedingads(Request $request){
      
  $request->validate([
   
    'amount' => ['required', 'string'],
    'classname' => ['required', 'string'],
    'term' => ['required', 'string'],

  ]);
//    dd($request->all());
  $view_singleclassactivities = new Payment();
  $view_singleclassactivities->amount = $request->amount;
  $view_singleclassactivities->classname = $request->classname;
  $view_singleclassactivities->term = $request->term;
  $view_singleclassactivities->feeding = 'feeding';
  $view_singleclassactivities->save();
  if ($view_singleclassactivities) {
      return redirect()->back()->with('success', 'you have added successfully');
      
  }else{
      return redirect()->back()->with('fail', 'you have not added successfully');
  }


}


public function createpartyngads(Request $request){
      
  $request->validate([
   
    'amount' => ['required', 'string'],
    'classname' => ['required', 'string'],
    'term' => ['required', 'string'],

  ]);
  $view_singleclassactivities = new Payment();
  $view_singleclassactivities->amount = $request->amount;
  $view_singleclassactivities->classname = $request->classname;
  $view_singleclassactivities->term = $request->term;
  $view_singleclassactivities->feeding = 'party';
  $view_singleclassactivities->save();
  if ($view_singleclassactivities) {
      return redirect()->back()->with('success', 'you have added successfully');
      
  }else{
      return redirect()->back()->with('fail', 'you have not added successfully');
  }


}


public function createpartypayments(Request $request){
      
  $request->validate([
   
    'amount' => ['required', 'string'],
    'classname' => ['required', 'string'],
    'term' => ['required', 'string'],

  ]);
//    dd($request->all());
  $view_singleclassactivities = new Payment();
  $view_singleclassactivities->amount = $request->amount;
  $view_singleclassactivities->classname = $request->classname;
  $view_singleclassactivities->term = $request->term;
  $view_singleclassactivities->feeding = 'party';
  $view_singleclassactivities->save();
  if ($view_singleclassactivities) {
      return redirect()->back()->with('success', 'you have added successfully');
      
  }else{
      return redirect()->back()->with('fail', 'you have not added successfully');
  }
}


public function createbuspaymentads(Request $request){
  $request->validate([
    'amount' => ['required', 'string'],
    'classname' => ['required', 'string'],
    'term' => ['required', 'string'],
    'address' => ['required', 'string'],

  ]);
  $view_singleclassactivities = new Payment();
  $view_singleclassactivities->amount = $request->amount;
  $view_singleclassactivities->classname = $request->classname;
  $view_singleclassactivities->term = $request->term;
  $view_singleclassactivities->address = $request->address;
  $view_singleclassactivities->feeding = 'trans';
  
  $view_singleclassactivities->save();
  if ($view_singleclassactivities) {
      return redirect()->back()->with('success', 'you have added successfully');
      
  }else{
      return redirect()->back()->with('fail', 'you have not added successfully');
  }

}


public function createbuspayments(Request $request){
      
  $request->validate([
   
    'amount' => ['required', 'string'],
    'classname' => ['required', 'string'],
    'term' => ['required', 'string'],
    'address' => ['required', 'string'],

  ]);
//    dd($request->all());
  $view_singleclassactivities = new Payment();
  $view_singleclassactivities->amount = $request->amount;
  $view_singleclassactivities->classname = $request->classname;
  $view_singleclassactivities->term = $request->term;
  $view_singleclassactivities->address = $request->address;
  $view_singleclassactivities->feeding = 'trans';
  
  $view_singleclassactivities->save();
  if ($view_singleclassactivities) {
      return redirect()->back()->with('success', 'you have added successfully');
      
  }else{
      return redirect()->back()->with('fail', 'you have not added successfully');
  }


}




    public function addschoolfeespaymentad(){
        $view_classes = Classname::latest()->get();
        return view('dashboard.admin.addschoolfeespaymentad', compact('view_classes'));
    }
    public function viewfees(){
      $view_fees = Payment::where('feeding', 'school')->get();
      return view('dashboard.account.viewfees', compact('view_fees'));
  }
    public function viewfeedinfees(){
      $view_feedingfees = Payment::where('feeding', 'feeding')->get();
      return view('dashboard.account.viewfeedinfees', compact('view_feedingfees'));
  }

  public function viewallfees(){
    $view_all_fees = Payment::latest()->get();
    return view('dashboard.admin.viewallfees', compact('view_all_fees'));
  }
 

  


  public function viewbusfees(){
    $view_feedingfees = Payment::where('feeding', 'trans')->get();
    return view('dashboard.account.viewbusfees', compact('view_feedingfees'));
  }

  public function viewpartypayment(){
    $view_feedingfees = Payment::where('feeding', 'party')->get();
    return view('dashboard.account.viewpartypayment', compact('view_feedingfees'));
  }
  
  
  
    public function editfee($id){
      $edit_fees = Payment::find($id);
      $view_classes = Classname::all();

      return view('dashboard.account.editfee', compact('view_classes', 'edit_fees'));
    }
    
    public function viewfee($id){
      $view_fee = Payment::find($id);
      $view_classes = Classname::all();
      return view('dashboard.account.viewfee', compact('view_classes', 'view_fee'));
  }

  public function approvedfee($id){
    $approved_classactivity = Payment::where('id', $id)->first();
    $approved_classactivity->status = 'approved';
    $approved_classactivity->save();
    return redirect()->back()->with('success', 'you have approved successfully');
}

public function printfee($id){
  $print_fee = Payment::find($id);
  $view_classes = Classname::all();
  return view('dashboard.account.printfee', compact('view_classes', 'print_fee'));
}

public function printfeeall(){
  $print_allfees = Payment::all();
  return view('dashboard.account.printfeeall', compact('print_allfees'));
}



public function deletefee($id){
  $print_fee = Payment::where('id', $id)->delete();

  return redirect()->back()->with('success', 'You deleted successfully');
}

// public function buspayment(){
//   $ = Payment::where('feeding', 'trans')->get();
//   return view('dashboard.guardian.buspayment', compact('bus_payments'));
// }


}
