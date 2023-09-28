<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use KingFlamez\Rave\Facades\Rave as Flutterwave;
use Illuminate\Support\Facades\Auth;
class FlutterwaveController extends Controller
{
    /**
     * Initialize Rave payment process
     * @return void
     */
    public function initialize()
    {
        //This generates a payment reference
        $reference = Flutterwave::generateReference();

        // Enter the details of the payment
        $data = [
            'payment_options' => 'card,banktransfer',
            'amount' => request()->amount,
            'email' => request()->email,
            'tx_ref' => $reference,
            'currency' => "NGN",
            'redirect_url' => route('callback'),

            'customer' => [
                'email' => request()->email,
                "phone_number" => request()->phone,
                "name" => request()->name,
                "surname" => request()->surname,
                "classname" => request()->classname,
                "term" => request()->term,
                "section" => request()->section,
                "user_id" => request()->user_id,
                "address" => request()->address,
                "student_id" => request()->student_id,
                "dev_amount" => request()->dev_amount,
                "pta_amount" => request()->pta_amount,
                "medicals" => request()->medicals,
                "extracuri_fee" => request()->extracuri_fee,
                "bookamount" => request()->bookamount,
                "uniforms_amount" => request()->uniforms_amount,
                "form_amount" => request()->form_amount,
                "tuition" => request()->tuition,
                "feeding" => request()->feeding,
                "payment_id" => request()->payment_id,
                
            ],

            "meta" => [
                'student_id' => request()->student_id,
                'user_id' => request()->user_id,
                'address' => request()->address,
                'email' => request()->email,
                'amount' => request()->amount,
                "fname" => request()->fname,
                "surname" => request()->surname,
                "middlename" => request()->middlename,
                "phone" => request()->phone,
                "tuition" => request()->tuition,
                "forms_amount" => request()->forms_amount,
                "extracuri_fee" => request()->extracuri_fee,
                "uniforms_amount" => request()->uniforms_amount,
                "form_amount" => request()->form_amount,
                'section' => request()->section,
                'term' => request()->term,
                'classname' => request()->classname,
                'medicals' => request()->medicals,
                'pta_amount' => request()->pta_amount,
                'bookamount' => request()->bookamount,
                'dev_amount' => request()->dev_amount,
                'section' => request()->section,
                "feeding" => request()->feeding,
                "payment_id" => request()->payment_id,

            ],

            "customizations" => [
                "title" => 'School Levies',
                "description" => "Payments"
            ]
        ];

        $payment = Flutterwave::initializePayment($data);


        if ($payment['status'] !== 'success') {
            // notify something went wrong
            return;
        }

        return redirect($payment['data']['link']);
    }

    /**
     * Obtain Rave callback information
     * @return void
     */
    public function callback()
    {
        
        $status = request()->status;

        //if payment is successful
        if ($status ==  'successful') {
        
        $transactionID = Flutterwave::getTransactionIDFromCallback();
        $data = Flutterwave::verifyTransaction($transactionID);

        //dd($data);
        if ($data['data']['meta']['feeding'] == 'school') {
            $schoolfeespayment = new Transaction();
            $schoolfeespayment->student_id = $data['data']['meta']['student_id'];
            $schoolfeespayment->payment_id = $data['data']['meta']['payment_id'];
           $schoolfeespayment->user_id = Auth::guard('web')->user()->id;
            $schoolfeespayment->amount = $data['data']['meta']['amount'];
            $schoolfeespayment->form_amount = $data['data']['meta']['form_amount'];
            $schoolfeespayment->uniforms_amount = $data['data']['meta']['uniforms_amount'];
            
            $schoolfeespayment->fname = $data['data']['meta']['fname'];
            $schoolfeespayment->surname = $data['data']['meta']['surname'];
            $schoolfeespayment->middlename = $data['data']['meta']['middlename'];
            // $schoolfeespayment->semester = '';
            //$schoolfeespayment->status = 'Success';
            $schoolfeespayment->phone = $data['data']['meta']['phone'];
            $schoolfeespayment->email = $data['data']['meta']['email'];
            $schoolfeespayment->section = $data['data']['meta']['section'];
            $schoolfeespayment->classname = $data['data']['meta']['classname'];
            $schoolfeespayment->term = $data['data']['meta']['term'];
            $schoolfeespayment->extracuri_fee = $data['data']['meta']['extracuri_fee'];
            $schoolfeespayment->medicals = $data['data']['meta']['medicals'];
            $schoolfeespayment->pta_amount = $data['data']['meta']['pta_amount'];
            $schoolfeespayment->bookamount = $data['data']['meta']['bookamount'];
            $schoolfeespayment->dev_amount = $data['data']['meta']['dev_amount'];
            $schoolfeespayment->tuition = $data['data']['meta']['tuition'];
    
    
            $schoolfeespayment->first_6digits = $data['data']['card']['first_6digits'];
            $schoolfeespayment->last_4digits = $data['data']['card']['last_4digits'];
            $schoolfeespayment->issuer = $data['data']['card']['issuer'];
            $schoolfeespayment->country = $data['data']['card']['country'];
            $schoolfeespayment->type = $data['data']['card']['type'];
            $schoolfeespayment->token = $data['data']['card']['token'];
            $schoolfeespayment->expiry = $data['data']['card']['expiry'];
    
    
            $schoolfeespayment->tx_ref = $data['data']['tx_ref'];
            $schoolfeespayment->flw_ref = $data['data']['flw_ref'];
            $schoolfeespayment->device_fingerprint = $data['data']['device_fingerprint'];
            $schoolfeespayment->currency = $data['data']['currency'];
            $schoolfeespayment->charged_amount = $data['data']['charged_amount'];
            $schoolfeespayment->app_fee = $data['data']['app_fee'];
            $schoolfeespayment->merchant_fee = $data['data']['merchant_fee'];
            $schoolfeespayment->processor_response = $data['data']['processor_response'];
            $schoolfeespayment->auth_model = $data['data']['auth_model'];
            $schoolfeespayment->ip = $data['data']['ip'];
            $schoolfeespayment->narration = $data['data']['narration'];
            $schoolfeespayment->status = $data['data']['status'];
            $schoolfeespayment->payment_type = $data['data']['payment_type'];
            $schoolfeespayment->account_id = $data['data']['account_id'];
            
            
            $schoolfeespayment->ref_no = substr(rand(0,time()),0, 9);
            $schoolfeespayment->save();

            return view('dashboard.paylounge');

        } elseif($data['data']['meta']['feeding'] == 'feeding') { {
            $schoolfeespayment = new Transaction();
            $schoolfeespayment->student_id = $data['data']['meta']['student_id'];
            $schoolfeespayment->user_id = Auth::guard('web')->user()->id;
            $schoolfeespayment->amount = $data['data']['meta']['amount'];
          
            
            $schoolfeespayment->fname = $data['data']['meta']['fname'];
            $schoolfeespayment->surname = $data['data']['meta']['surname'];
            $schoolfeespayment->middlename = $data['data']['meta']['middlename'];
           
            $schoolfeespayment->phone = $data['data']['meta']['phone'];
            $schoolfeespayment->email = $data['data']['meta']['email'];
            $schoolfeespayment->section = $data['data']['meta']['section'];
            $schoolfeespayment->classname = $data['data']['meta']['classname'];
            $schoolfeespayment->term = $data['data']['meta']['term'];

    
    
            $schoolfeespayment->first_6digits = $data['data']['card']['first_6digits'];
            $schoolfeespayment->last_4digits = $data['data']['card']['last_4digits'];
            $schoolfeespayment->issuer = $data['data']['card']['issuer'];
            $schoolfeespayment->country = $data['data']['card']['country'];
            $schoolfeespayment->type = $data['data']['card']['type'];
            $schoolfeespayment->token = $data['data']['card']['token'];
            $schoolfeespayment->expiry = $data['data']['card']['expiry'];
    
    
            $schoolfeespayment->tx_ref = $data['data']['tx_ref'];
            $schoolfeespayment->flw_ref = $data['data']['flw_ref'];
            $schoolfeespayment->device_fingerprint = $data['data']['device_fingerprint'];
            $schoolfeespayment->currency = $data['data']['currency'];
            $schoolfeespayment->charged_amount = $data['data']['charged_amount'];
            $schoolfeespayment->app_fee = $data['data']['app_fee'];
            $schoolfeespayment->merchant_fee = $data['data']['merchant_fee'];
            $schoolfeespayment->processor_response = $data['data']['processor_response'];
            $schoolfeespayment->auth_model = $data['data']['auth_model'];
            $schoolfeespayment->ip = $data['data']['ip'];
            $schoolfeespayment->narration = $data['data']['narration'];
            $schoolfeespayment->status = $data['data']['status'];
            $schoolfeespayment->payment_type = $data['data']['payment_type'];
            $schoolfeespayment->account_id = $data['data']['account_id'];
            
            
            $schoolfeespayment->ref_no = substr(rand(0,time()),0, 9);
            $schoolfeespayment->save();

            return view('dashboard.paylounge');
        }

        
        }elseif($data['data']['meta']['feeding'] == 'trans'){
            $schoolfeespayment = new Transaction();
            $schoolfeespayment->student_id = $data['data']['meta']['student_id'];
            $schoolfeespayment->user_id = Auth::guard('web')->user()->id;
            $schoolfeespayment->address = $data['data']['meta']['address'];
            $schoolfeespayment->amount = $data['data']['meta']['amount'];
          
            
            $schoolfeespayment->fname = $data['data']['meta']['fname'];
            $schoolfeespayment->surname = $data['data']['meta']['surname'];
            $schoolfeespayment->middlename = $data['data']['meta']['middlename'];
           
            $schoolfeespayment->phone = $data['data']['meta']['phone'];
            $schoolfeespayment->email = $data['data']['meta']['email'];
            $schoolfeespayment->section = $data['data']['meta']['section'];
            $schoolfeespayment->classname = $data['data']['meta']['classname'];
            $schoolfeespayment->term = $data['data']['meta']['term'];

    
    
            $schoolfeespayment->first_6digits = $data['data']['card']['first_6digits'];
            $schoolfeespayment->last_4digits = $data['data']['card']['last_4digits'];
            $schoolfeespayment->issuer = $data['data']['card']['issuer'];
            $schoolfeespayment->country = $data['data']['card']['country'];
            $schoolfeespayment->type = $data['data']['card']['type'];
            $schoolfeespayment->token = $data['data']['card']['token'];
            $schoolfeespayment->expiry = $data['data']['card']['expiry'];
    
    
            $schoolfeespayment->tx_ref = $data['data']['tx_ref'];
            $schoolfeespayment->flw_ref = $data['data']['flw_ref'];
            $schoolfeespayment->device_fingerprint = $data['data']['device_fingerprint'];
            $schoolfeespayment->currency = $data['data']['currency'];
            $schoolfeespayment->charged_amount = $data['data']['charged_amount'];
            $schoolfeespayment->app_fee = $data['data']['app_fee'];
            $schoolfeespayment->merchant_fee = $data['data']['merchant_fee'];
            $schoolfeespayment->processor_response = $data['data']['processor_response'];
            $schoolfeespayment->auth_model = $data['data']['auth_model'];
            $schoolfeespayment->ip = $data['data']['ip'];
            $schoolfeespayment->narration = $data['data']['narration'];
            $schoolfeespayment->status = $data['data']['status'];
            $schoolfeespayment->payment_type = $data['data']['payment_type'];
            $schoolfeespayment->account_id = $data['data']['account_id'];
            
            
            $schoolfeespayment->ref_no = substr(rand(0,time()),0, 9);
            $schoolfeespayment->save();

            return view('dashboard.paylounge');
        }elseif($data['data']['meta']['feeding'] == 'party'){
            $schoolfeespayment = new Transaction();
            $schoolfeespayment->student_id = $data['data']['meta']['student_id'];
            $schoolfeespayment->user_id = Auth::guard('web')->user()->id;
            // $schoolfeespayment->address = $data['data']['meta']['address'];
            $schoolfeespayment->amount = $data['data']['meta']['amount'];
          
            
            $schoolfeespayment->fname = $data['data']['meta']['fname'];
            $schoolfeespayment->surname = $data['data']['meta']['surname'];
            $schoolfeespayment->middlename = $data['data']['meta']['middlename'];
           
            $schoolfeespayment->phone = $data['data']['meta']['phone'];
            $schoolfeespayment->email = $data['data']['meta']['email'];
            $schoolfeespayment->section = $data['data']['meta']['section'];
            $schoolfeespayment->classname = $data['data']['meta']['classname'];
            $schoolfeespayment->term = $data['data']['meta']['term'];

    
    
            $schoolfeespayment->first_6digits = $data['data']['card']['first_6digits'];
            $schoolfeespayment->last_4digits = $data['data']['card']['last_4digits'];
            $schoolfeespayment->issuer = $data['data']['card']['issuer'];
            $schoolfeespayment->country = $data['data']['card']['country'];
            $schoolfeespayment->type = $data['data']['card']['type'];
            $schoolfeespayment->token = $data['data']['card']['token'];
            $schoolfeespayment->expiry = $data['data']['card']['expiry'];
    
    
            $schoolfeespayment->tx_ref = $data['data']['tx_ref'];
            $schoolfeespayment->flw_ref = $data['data']['flw_ref'];
            $schoolfeespayment->device_fingerprint = $data['data']['device_fingerprint'];
            $schoolfeespayment->currency = $data['data']['currency'];
            $schoolfeespayment->charged_amount = $data['data']['charged_amount'];
            $schoolfeespayment->app_fee = $data['data']['app_fee'];
            $schoolfeespayment->merchant_fee = $data['data']['merchant_fee'];
            $schoolfeespayment->processor_response = $data['data']['processor_response'];
            $schoolfeespayment->auth_model = $data['data']['auth_model'];
            $schoolfeespayment->ip = $data['data']['ip'];
            $schoolfeespayment->narration = $data['data']['narration'];
            $schoolfeespayment->status = $data['data']['status'];
            $schoolfeespayment->payment_type = $data['data']['payment_type'];
            $schoolfeespayment->account_id = $data['data']['account_id'];
            
            
            $schoolfeespayment->ref_no = substr(rand(0,time()),0, 9);
            $schoolfeespayment->save();
            return view('dashboard.paylounge');

        }
    }
        elseif ($status ==  'cancelled'){
            //Put desired action/code after transaction has been cancelled here
            return redirect()->back();
        }
        else{
            //Put desired action/code after transaction has failed here
        }
        // Get the transaction from your DB using the transaction reference (txref)
        // Check if you have previously given value for the transaction. If you have, redirect to your successpage else, continue
        // Confirm that the currency on your db transaction is equal to the returned currency
        // Confirm that the db transaction amount is equal to the returned amount
        // Update the db transaction record (including parameters that didn't exist before the transaction is completed. for audit purpose)
        // Give value for the transaction
        // Update the transaction to note that you have given value for the transaction
        // You can also redirect to your success page from here

    }
}