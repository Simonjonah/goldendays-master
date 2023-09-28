<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TransactionController extends Controller
{
    //
      public function paylounge($ref_no){
        $pay_lounge = Transaction::where('ref_no', $ref_no)->first();
        return view('dashboard.paylounge', compact('pay_lounge'));
      }

      public function paymenthistory(){
        $getyour_payments = Transaction::where('user_id', auth::guard('web')->id()
        )->latest()->get();
        return view('dashboard.paymenthistory', compact('getyour_payments'));
      }
      public function viewpayment1($ref_no){
        $viewsingle_payment = Transaction::where('ref_no', $ref_no)->first();
        return view('dashboard.viewpayment1', compact('viewsingle_payment'));
      }
      public function paymentspdf1($ref_no){
        $printsingle_payment = Transaction::where('ref_no', $ref_no)->first();
        return view('dashboard.paymentspdf1', compact('printsingle_payment'));
      }
      public function viewallpayment(){
        $viewall_payments = Transaction::latest()->get();
        return view('dashboard.account.viewallpayment', compact('viewall_payments'));
      }

      public function viewsinglepayment($ref_no){
        $viewsingle_paymentacc = Transaction::where('ref_no', $ref_no)->first();
        return view('dashboard.account.viewsinglepayment', compact('viewsingle_paymentacc'));
      }

      public function printsinglepaymentspdfs($ref_no){
        $printsingle_payment = Transaction::where('ref_no', $ref_no)->first();
        return view('dashboard.account.printsinglepaymentspdfs', compact('printsingle_payment'));
      }

      public function viewallpaymentsad(){
        $viewall_paymentsads = Transaction::latest()->get();
        return view('dashboard.admin.viewallpaymentsad', compact('viewall_paymentsads'));
      }
      

      public function printsinglepaymentspdf($ref_no){
        $print_single_payment = Transaction::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.printsinglepaymentspdf', compact('print_single_payment'));
      }
      
      public function viewsinglepaymentsad($ref_no){
        $view_single_payment = Transaction::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.viewsinglepaymentsad', compact('view_single_payment'));
      }
      
      

      
      

      
}
