<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\AddBankRequest;
use App\Http\Requests\EditBankRequest;
use App\Http\Requests\LoadBankRequest;
use App\Http\Requests\MakePaymentRequest;
use Illuminate\Http\Request;
use Auth;
use App\Bank;
use App\Wallet;
use App\Profile;
use App\Payment;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $user = Auth::user();

        $userId = $user->id;

        $wallet = Profile::where( 'wallet_id', '=', $userId )->first();

        $banks = Bank::where( 'wallet_id', '=', $wallet->id )->get();

        return view('home')->with('user', $user) ->with('banks', $banks);
       
    }


   public function history()
    {
      
        $user = Auth::user();

        $userId = $user->id;

        $profile = Profile::where( 'user_id', '=', $userId )->first();

        $banks = Bank::where( 'wallet_id', '=',  profile->id)->get();

        $payments = Payment::where( 'wallet_id','=',  $banks->id )->get();

        return view('history')->with('user', $user)->with('banks', $banks) ->with('payments', $payments);

       
    }



   public function wallet()
    {
      
        $user = Auth::user();

        $userId = $user->id;

        $profile = Profile::where( 'wallet_id', '=', $userId )->first();

        $wallet = Wallet::where( 'profile_id', '=', $profile->id )->first();

        return view('wallet')->with('user', $user)->with('wallet', $wallet);

       
       
    }





    public function getAddBankAccount() {
       
           $user = Auth::user();
          
           $userId = $user->id;

           $profile = Profile::where( 'user_id', '=', $userId )->first();

            $wallet = Wallet::where( 'profile_id', '=', $profile->id )->first();

           return view('add-account')->with('wallet', $wallet) ;
    }






    public function getLoadBankAccount() {
       
           $user = Auth::user();
          
           $userId = $user->id;

           $profile = Profile::where( 'user_id', '=', $userId )->first();

           $wallet = Wallet::where( 'profile_id', '=', $profile->id )->first();

           $banks = Bank::all();


           return view('load-bank')->with('wallet', $wallet)->with('banks', $banks);
    }




 public function postLoaddBankAccount(LoaDBankRequest $request) {


    $wallet_id = $request->get('wallet_id');


     $bank1 = $request->get('bank1');


     $bank2 = $request->get('bank2');


     $amount = $request->get('amount');



    $check = Bank::where( 'wallet_id', '=', $wallet_id )->first()->count();
 
      
     if ($check !=0 ) {


     $bank = Bank::where( 'id', '=', $bank1 )->first();
   
     $bank->withdraw = $request->get('amount');

     $bank->wallet_id = $request->get('wallet_id');
    
     $bank->save();


     $bank = Bank::where( 'id', '=', $bank2 )->first();
   
     $bank->deposit = $request->get('amount');

     $bank->wallet_id = $request->get('wallet_id');
    
     $bank->save();




  
      return \Redirect::route('home')->with('message', 'Money loaded to the Bank Account');
 
       }


       else {


       return \Redirect::back()->withErrors('message', 'Something happened out there');

       }




   }





   public function postAddBankAccount(EditBankRequest $request) {


    $wallet_id = $request->get('wallet_id');

    $check = Bank::where( 'wallet_id', '=', $wallet_id )->first()->count();
 
      
     if ($check !=0 ) {
    
   
     $bank = new Bank;
    
     $bank->name = $request->get('name');
    
     $bank->account = $request->get('account');

     $bank->wallet_id = $request->get('wallet_id');
    
     $bank->type = $request->get('type');

     $bank->save();

  
      return \Redirect::route('home')->with('message', 'Bank Account just updated');
 
       }


       else {


       return \Redirect::back()->withErrors('message', 'Something happened out there');

       }




   }





   public function getEditBankAccount($id) {
       
           $user = Auth::user();
          
           $userId = $user->id;

           $bank_id = $id;

           $profile = Profile::where( 'user_id', '=', $userId )->first();

           $wallet = Wallet::where( 'profile_id', '=', $profile->id )->first();

           $bank = Bank::where( 'id', '=',  $bank_id )->first();

           return view('edit-account')->with('wallet', $wallet)->with('bank', $bank) ;
    }





  public function postEditBankAccount(AddBankRequest $request) {


    $wallet_id = $request->get('wallet_id');

    $check = Bank::where( 'wallet_id', '=', $wallet_id )->first()->count();
 
      
     if ($check !=0 ) {
    

    $bank = Bank::where( 'wallet_id', '=', $wallet_id )->first();
    
     $bank->name = $request->get('name');
    
     $bank->account = $request->get('account');
    
     $bank->type = $request->get('type');

     $bank->save();

  
      return \Redirect::route('home')->with('message', 'New Bank Account added');
 
       }


       else {


       return \Redirect::back()->withErrors('message', 'Something happened out there');

       }




   }





   public function getMakePayment($id) {
       
          $get_id =$id;

           $banks = Bank::all();


           $wallet = Wallet::where( 'id', '=', $get_id )->first();

           $bank = Bank::where( 'wallet_id', '=',  $wallet->id )->first();

           return view('make-payment')->with('wallet', $wallet)->with('banks', $banks);
    }




public function postMakePayment(MakePaymentRequest $request) {

  $user = Auth::user();
          
  $userId = $user->id;

  $profile = Profile::where( 'user_id', '=', $userId )->first();

  $wallet = Wallet::where( 'profile_id', '=', $profile->id )->first();




    $wallet_id = $request->get('wallet_id');

    $bank_id = $request->get('bank');

    $amount = $request->get('amount');

    $check = Bank::where( 'wallet_id', '=', $wallet_id )->first()->count();
 
      
     if ($check !=0 ) {


     $bank = Bank::where( 'id', '=',  $bank_id )->first();
     
     $current_deposit =  $bank->deposit;

     $new_deposit = $current_deposit - $amount;


    
     $payment = new Payment;
    
     $payment->email = $request->get('email');
    
     $payment->bank_id = $request->get('bank');

     $payment->wallet_id = $request->get('wallet_id');
    
     $payment->withdraw = $request->get('amount');

     $payment->save();

     $payment = Payment::where( 'wallet_id', '=', $wallet_id)->first();



     $wallet = new Wallet;
    
    
     $wallet->bank_id = $request->get('bank');

     $wallet->profile_id  = $profile->id;

     $wallet->card_number = $request->get('number');
    
     $wallet->card_name = $request->get('card');

     $wallet->expire = $request->get('datepicker');

     $wallet->cvv = $request->get('cvv');

     $wallet->payment_id = $payment->id;


     $wallet->save();


     $bank_id = $request->get('bank');

     $bank = Bank::where( 'id', '=', $bank_id )->first();
    
     $bank->name = $request->get('name');
    
     $bank->deposit = $new_deposit;

     $bank->withdraw = $request->get('withdraw');

     $bank->transwer = $request->get('transwer');

     $bank->wallet_id = $request->get('wallet_id');
    

     $bank->save();



     Mail::send('emails.payment', $data, function ($message) {


            $message->from(env('MAIL_FROM')); 
            $message->to($request->get('email'), env('MAIL_NAME')); 

    });

  
      return \Redirect::route('home')->with('message', 'The payment was done');
 
       }


       else {


       return \Redirect::back()->withErrors('message', 'Something happened out there');

       }




   }



























   


}
