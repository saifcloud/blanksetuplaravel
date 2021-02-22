<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\investor;
use App\Setting;
use View;

class LoginController extends Controller
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

      $website_title =  Setting::where('field_key','website_title')->first();
      $website_email =  Setting::where('field_key','website_email')->first();
      $website_logo =  Setting::where('field_key','website_logo')->first();
      $website_logo2 =  Setting::where('field_key','website_logo2')->first();
      $contact_1  =  Setting::where('field_key','contact_1')->first();
      $contact_2 =  Setting::where('field_key','contact_2')->first();
      $contact_3 =  Setting::where('field_key','contact_3')->first();

      View::share('website_title',$website_title);
      View::share('website_email',$website_email);
      View::share('website_logo',$website_logo);
      View::share('website_logo2',$website_logo2);
      View::share('contact_1',$contact_1);
      View::share('contact_2',$contact_2);
      View::share('contact_3',$contact_3);

    }


    public function index()
    {
    	if(Auth::check() && Auth::user()->role==1)
    	{
    		return redirect('agent/dashboard');
    	}

    	if(Auth::check() && Auth::user()->role==2)
    	{
    		return redirect('investor/dashboard');
    	}

    	
    	return view('login');
    }



    public function agent_index()
    {
      if(Auth::check() && Auth::user()->role==1)
      {
        return redirect('agent/dashboard');
      }

      if(Auth::check() && Auth::user()->role==2)
      {
        return redirect('investor/dashboard');
      }

      
      return view('agent_login');
    }



 // investro login
    public function login_post(Request $request)
    {
     // print_r($request->all()); die;
         $validatedData = $request->validate([
         // 'user_type'    => 'required',
         'email'         => 'required|email',
         'password'      => 'required'
          ]);
        
          
          $user = User::where('email',$request->email)->where('role',2)->first();
          if(!empty($user) && $user->status ==0)
          {
              \Session::put('phresh-user-email',$request->email);
            return redirect('/')->withInput()->with('not_verified','Your account is not verified yet');
          }
         $credentials = $request->only('email','password');
         $credentials['role'] = 2;
         $credentials['is_deleted'] = 0;
       


         
         //investor
        
           if(Auth::attempt($credentials))
           {
             return redirect('investor/dashboard');
             
           }else{
            return redirect('/')->withInput()->with('error_msg','Please check email or password');
           }
         





    }



     public function login_post_agent(Request $request)
    {
     // print_r($request->all()); die;
         $validatedData = $request->validate([
         // 'user_type'    => 'required',
         'email'         => 'required|email',
         'password'      => 'required'
          ]);

          $user = User::where('email',$request->email)->where('role',1)->first();
          if(!empty($user) && $user->status ==0)
          {
               \Session::put('phresh-agent-email',$request->email);
            return redirect('agent/login')->withInput()->with('not_verified','Your account is not verified yet');
          }
        

         $credentials = $request->only('email','password');
         $credentials['role'] = 1;
         $credentials['is_deleted'] = 0;
         // print_r($credentials); die;
        //agent
         if(Auth::attempt($credentials))
           {
            return redirect('agent/dashboard');
           }else{
             return redirect('agent/login')->withInput()->with('error_msg','Please check email or password');
           }
        


    }

    




    
}



   