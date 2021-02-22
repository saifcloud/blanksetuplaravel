<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;
use Session;
use App\Investor;
use App\Wallet;
use App\Referral_user;
use App\Setting;
use View;
use App\Notification;
use App\Referral_wallet;
use App\Helpers\Helper as Helper;
class RegisterController extends Controller
{
    //
   public function __construct()
    {
      $facebook =  Setting::where('field_key','facebook')->first();
      $linkedin =  Setting::where('field_key','linkedin')->first();
      $tweeter  =  Setting::where('field_key','tweeter')->first();
      $whatsapp =  Setting::where('field_key','whatsapp')->first();
       $instagram =  Setting::where('field_key','instagram')->first();

      View::share('facebook',$facebook);
      View::share('linkedin',$linkedin);
      View::share('tweeter',$tweeter);
      View::share('whatsapp',$whatsapp);
       View::share('instagram',$instagram);



      $website_email =  Setting::where('field_key','website_email')->first();
      $website_logo =  Setting::where('field_key','website_logo')->first();
      $contact_1  =  Setting::where('field_key','contact_1')->first();
      $contact_2 =  Setting::where('field_key','contact_2')->first();
      $contact_3 =  Setting::where('field_key','contact_3')->first();


      View::share('website_email',$website_email);
      View::share('website_logo',$website_logo);
      View::share('contact_1',$contact_1);
      View::share('contact_2',$contact_2);
      View::share('contact_3',$contact_3);
    }


    public function agent()
    {
      if(Auth::check() && Auth::user()->role==1)
      {
        return redirect('agent/dashboard');
      }

      if(Auth::check() && Auth::user()->role==2)
      {
        return redirect('investor/dashboard');
      }
    	return view('agent.signup');
    }







     public function checkifExist()
    {
           $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz'; 
           $reffCode  = substr(str_shuffle($str_result), 0, 7); 

         $alreadyExitCode = User::where('referral_code',$reffCode)->count();
         if($alreadyExitCode > 0)
         {
             $this->checkifExist();
         }else{
             return $reffCode;
         }
    }




    public function agent_post(Request $request)
    {
    	
      
      $validatedData = $request->validate([
        'title'    => 'required',
        'firstname'=> 'required',
        'lastname' => 'required',
        'number'   => 'required',
        'email'    => 'required|email',
        'dob'      => 'required',
        'password'      => 'required|min:6',
        'term_of_service'=>'required'

     ]);

      // $referral_code =  $this->random_strings(7);
    $user_status =  User::where('email',$request->email)->where('role',1)->first();
      // print_r($user_status); die;

     if(!empty($user_status))
     {
      return redirect()->back()->withInput()->with('emailexist','email is already exist');
     }

      $getFinal =  $this->checkifExist();
    
      // print_r($getFinal); die;
      $agent = new User();
      $agent->title    = $request->title;
      $agent->name     = $request->firstname;
      $agent->lastname = $request->lastname;
      $agent->number   = $request->number;
      $agent->email    = $request->email;
      $agent->dob      = $request->dob;
      $agent->password = Hash::make($request->password);
      $agent->role     = 1;
      $agent->referral_code = $getFinal;
      $agent->save();

      // Auth::loginUsingId($user->id);


      $wallet = new Wallet();
      $wallet->user_id =$agent->id;
      $wallet->email   =$request->email;
      $wallet->balance  = 00;
      $wallet->save();
      
      
       $newrfWallet = new Referral_wallet(); 
       $newrfWallet->user_id = $agent->id;
       $newrfWallet->email = $request->email;
       $newrfWallet->balance = 00;
       $newrfWallet->save();

      // dd($request->all());
     
           $fourdigitrandom = rand(1000,9999);
           $usr = User::find($agent->id);
           $usr->otp = $fourdigitrandom;
           $usr->save();
           
           $notification = new Notification();
           $notification->user_id = $agent->id;
           $notification->message = "New Agent Has been Registered";
           $notification->save();



           $email_content = [
                             'receipent_email'=>$request->email,
                             'name'           =>$request->firstname,
                             'subject'        =>'Agent Registration Verification',
                             'user_type'      =>1,
                             'otp'            =>$fourdigitrandom
                           ];

            Helper::sendMailOtp($email_content,'registration_verfication','');

            $email_content1 = [
                             'receipent_email'=>$request->email,
                             'name'           =>$request->firstname,
                              'subject'       =>'New Agent registered',
                             'message'        =>'New Agent has been registered successfully',
                             'heading_four'   =>'',
                             'heading_five'   =>'',
                           
                             // 'otp'            =>$fourdigitrandom
                           ];

            Helper::NewUserSendNotification($email_content1,'registration_investor_admin_notification','');

            // if(Auth::check() && Auth::user()->role == 2)
            // {
            //   return redirect('investor/dashboard');

            // }else{
              // return redirect('register-verification-investor')->with('email',$request->email);
              Session::put('phresh-agent-email',$usr->email);
             return redirect('register-verification-agent');
      

      // if(Auth::check() && Auth::user()->role == 1)
      // {
      // 	return redirect('agent/dashboard');

      // }else{
      // 	return redirect('/');
      // }




    }

  

   
    // function random_strings($length_of_string) 
    // { 
    //     $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz'; 
    //     return substr(str_shuffle($str_result), 0, $length_of_string); 
    // } 







    public function investor()
    {
        $ref = isset($_GET['ref']) ? $_GET['ref']:'' ;
    	return view('investor.signup',compact('ref'));
    }

    public function investor_post(Request $request)
    {
    	// dd($request->all());
      
      $validatedData = $request->validate([
        'title'    => 'required',
        'firstname'=> 'required',
        'lastname' => 'required',
        'number'   => 'required',
        'email'    => 'required',
        'dob'      => 'required',
        'password'      => 'required|min:6',
        'term_of_service'=>'required'

     ]);

     $user_status =  User::where('email',$request->email)->where('role',2)->first();

     if(!empty($user_status))
     {
      return redirect()->back()->withInput()->with('emailexist','email is already exist');
     }
      
      $referral_code=$request->code;
      $ifExistCode ="";
     if(!empty($referral_code)){

      $ifExistCode = User::where('referral_code',$referral_code)->where('role',1)->first();
      // print_r($ifExistCode); die;
      if(empty($ifExistCode))
      {    
           return redirect()->back()->withInput()->with('rfc_error','Invalid referral code');
      } 

    }



            $investor = new User();
            $investor->title    = $request->title;
            $investor->name     = $request->firstname;
            $investor->lastname = $request->lastname;
            $investor->number   = $request->number;
            $investor->email    = $request->email;
            $investor->dob      = $request->dob;
            $investor->password = Hash::make($request->password);
            $investor->role     = 2;
            $investor->save();

           


            $wallet = new Wallet();
            $wallet->user_id =$investor->id;
            $wallet->email   =$request->email;
            $wallet->balance  = 00;
            $wallet->save();

       // $referral_code=$request->code;


    //   if(!empty($referral_code)){

    //   $ifExistCode = User::where('referral_code',$referral_code)->where('role',1)->first();
    //   // print_r($ifExistCode); die;
    //   if(!empty($ifExistCode))
        if(!empty($ifExistCode)){

            $rfc = new Referral_user();
            $rfc->referral_code = $referral_code;
            $rfc->agent_id    = $ifExistCode->id;
            $rfc->user_id   = $investor->id;
            $rfc->save();
          }
    //    else{

    //           return redirect()->back()->withInput()->with('rfc_error','Invalid referral code');
    //   } 

    // }


           
           

            // Auth::loginUsingId($investor->id);
           // $user = User::where('email',$request->email)->where('role',$request->user_type)->first();
           $fourdigitrandom = rand(1000,9999);
           $usr = User::find($investor->id);
           $usr->otp = $fourdigitrandom;
           $usr->save();
           
           
           $notification = new Notification();
           $notification->user_id = $investor->id;
           $notification->message = "New Investor Has been Registered";
           $notification->save();


           $email_content = [
                             'receipent_email'=>$request->email,
                             'name'           =>$request->firstname,
                             'subject'        =>'Investor Registration Verification',
                             'user_type'      =>2,
                             'otp'            =>$fourdigitrandom
                           ];

            $mail = Helper::sendMailOtp($email_content,'registration_verfication','');



               $email_content1 = [
                             'receipent_email'=>$request->email,
                             'name'           =>$request->firstname,
                             'subject'        =>'New Investor registered',
                             'message'        =>'New Investor has been registered successfully',
                             'heading_four'   =>'',
                             'heading_five'   =>'',
                             
                           
                             // 'otp'            =>$fourdigitrandom
                           ];

            Helper::NewUserSendNotification($email_content1,'registration_investor_admin_notification','');
            // print_r($mail); die;

            // if(Auth::check() && Auth::user()->role == 2)
            // {
            //   return redirect('investor/dashboard');

            // }else{
              // return redirect('register-verification-investor')->with('email',$request->email);
               Session::put('phresh-user-email',$investor->email);
            //  return redirect('register-verification-investor');
             return  view('investor.verification_register_investor');
            // }
     

     




    }
}
