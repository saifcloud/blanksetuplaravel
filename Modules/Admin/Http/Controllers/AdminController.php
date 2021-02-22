<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Auth;
use App\User;
use App\Admin;
use App\Wallet;
use App\Subcategory;
use App\Transaction;
use App\Notification;

use App\Category;
use App\Order;
use App\Product;
use View;
use Hash;
use App\Helpers\Helper as Helper;
use DataTables;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
     
     
    public function __construct()
    {
      // $notification = Notification::where('is_deleted',0)->latest()->limit(5)->get();
     
      // View::share('unseen',Notification::where('is_deleted',0)->where('status',0)->count());
      // View::share('notification_count',Notification::where('is_deleted',0)->where('status',0)->count());
      // View::share('notification',$notification);
    }
    
    
    public function index()
    {   
        
        $page_title = 'dashboard';

        $admin = Admin::find(Auth::guard('admin')->id());
        
        $client = User::where('is_deleted',0)->latest()->count();
        // $product = Product::where('is_deleted',0)->latest()->count();
        // $order  = Order::latest()->count();

       



        return view('admin::index',compact('page_title','client','product','order'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        // print_r($request->all()); die;
        //
        // $validateData = $request->validate([
        //                 'name'=>'required',
        //                 // 'change_image'=>'required'
        // ]);
        
        // if($request->has('change_image'))
        // {
        //       $file = $request->file('change_image');
        //       $fileName = rand(9999,999999).'-'.time().'-'.$file->getClientOriginalExtension();
        //       $desctination = public_path('uploads/');
        //       $file->move($desctination,$fileName);
        // }else{
        //     $fileName = $request->old_image;
        // }

        $admin = Admin::find(Auth::guard('admin')->id());
        // $admin->image = $fileName;
        // $admin->save();

        $user            = Admin::find($request->id);
        $user->firstname = $request->firstname;
        $user->lastname  = $request->lastname;
        $user->email     = $request->email;
        $user->save();


        return redirect('admin/dashboard');
      

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show()
    {
        $page_title = 'Profile';
        $admin = Admin::find(Auth::guard('admin')->id()); 
        return view('admin::profile',compact('page_title','admin'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function subadmins(Request $request)
    {
        $page_title = 'Sub-Admins';

        if($request->ajax())
        {
            $data = Admin::where('role_type',2)->where('is_deleted',0)->latest()->get();
            return DataTables::of($data)
             ->addIndexColumn()
              ->addColumn('date', function($data){
                       $button = \Carbon\Carbon::parse($data->created_at)->format('d M Y');
                         
                        return $button;
                       })
             // ->addColumn('status', function($data){
             //            if($data->is_agent_approved == 1)
             //            {
             //                $button = '<p class="text-success">Active</p>'; 
             //            }else if($data->is_agent_approved == 2)
             //            {
             //               $button = '<p class="text-info">Pending</p>'; 
             //            }else if($data->is_agent_approved == 3)
             //            {
             //                $button = '<p class="text-danger">Reject</p>';
             //            }else{
             //                $button = '<p class="text-info">Inactive</p>';
             //            }
                         
             //            return $button;
             //           })

              
             ->addColumn('action', function($data){
                      

                        // $button = '<a href="details-agent/'.$data->id.'"><button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true" style="color:black"></i></button></a>';

                       $button= '&nbsp;&nbsp;&nbsp;<a href="edit-subadmin/'.base64_encode($data->id).'"><button type="button" name="edit" class="edit btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></button></a>';

                        $button .= '&nbsp;&nbsp;&nbsp;<a href="delete-subadmin/'.base64_encode($data->id).'"><button type="button" name="edit"  class="delete btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button><a>';
                        return $button;
                    })
                    ->rawColumns(['action','date'])
                    ->make(true);
        }

        return view('admin::subadmins.index',compact('page_title'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function create_subadmins(Request $request)
    {
        //
             $page_title = 'Sub-Admins';
             return view('admin::subadmins.create',compact('page_title'));
    }


    public function store_subadmins(Request $request)
    {
        //
             $validateData = $request->validate([
                             'username' =>'required|unique:admins',
                             'firstname'=>'required',
                             'lastname' =>'required',
                             'email'    =>'required|unique:admins',
                             'password' =>'required'
             ]);



             $admin = new Admin();
             $admin->username  = $request->username;
             $admin->firstname = $request->firstname;
             $admin->lastname  = $request->lastname;
             $admin->email     = $request->email;
             $admin->password  = Hash::make($request->password);
             $admin->role_type = 2;
             $admin->save();

             return redirect('admin/subadmins')->with('success','Sub admin has been created successfully');


    }


    

    public function edit_subadmins($subadmins_id)
    {
        //
             $page_title = 'Sub-Admins';
             $admin = Admin::find(base64_decode($subadmins_id));
             // print_r($admin); die;
             return view('admin::subadmins.edit',compact('page_title','admin'));
    }




    public function update_subadmins(Request $request)
    {
        //
        $validateData = $request->validate([
                             // 'username' =>'required',
                             'username' =>'required|unique:admins,username,'.base64_decode($request->subadmins_id),
                             'firstname'=>'required',
                             'lastname' =>'required',
                             'email'    =>'required|email|unique:admins,email,'.base64_decode($request->subadmins_id),
                             'password' =>'required'
             ]);

 // 'username' =>'required|unique:admins,username,'.base64_decode($request->subadmins_id),

             $admin = Admin::find(base64_decode($request->subadmins_id));
             $admin->username  = $request->username;
             $admin->firstname = $request->firstname;
             $admin->lastname  = $request->lastname;
             $admin->email     = $request->email;
             $admin->password  = Hash::make($request->password);
             // $admin->role_type = 2;
             $admin->save();

             return redirect('admin/subadmins')->with('success','Sub admin has been updated successfully');
    }



    public function delete_subadmins($subadmins_id)
    {
        //
             $admin = Admin::find(base64_decode($subadmins_id));
             $admin->is_deleted = 1;
             $admin->save();

            return redirect('admin/subadmins')->with('success','Sub admin has been deleted successfully');
    }


    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function logout(Request $request)
    {
        //
        Auth::guard('admin')->logout();
        return redirect('/');
    }


     public function change_password()
    {
        //
        $page_title='Change Password';
        $admin = Admin::find(Auth::guard('admin')->id()); 
       return view('admin::change_password',compact('page_title','admin'));
    }


    public function change_password_post(Request $request)
    {
        $validateData = $request->validate([
          'old_password'=>'required',
          'new_password'=>'required|min:6',
          'confirm_password'=>'required|min:6|same:new_password'
        ]);
       
      
      
      $admin = Admin::find(Auth::guard('admin')->id()); 
       if(Hash::check($request->old_password,$admin->password)){
           $admin->password = Hash::make($request->new_password);
           $admin->save();
          return redirect()->back()->with('success','Password has been changed successfully');
       }
        return redirect()->back()->with('failed','Old password is wrong');
      
    }


   




    public function send_verification($user_id)
    {
       $user = User::find(base64_decode($user_id));
       // print_r($user); die;
       $fourdigitrandom = rand(1000,9999);
       $user->otp = $fourdigitrandom;
       $user->save();

      if($user->role ==1)
       {
        $message = "Agent";
       }else{
        $message = "Investor";
       }
       // echo $message; die;
       $email_content = [
                             'receipent_email'=>$user->email,
                             'name'           =>$user->name,
                             'subject'        =>$message.' Registration Verification',
                             'user_type'      =>$user->role,
                             'otp'            =>$fourdigitrandom
                           ];

      Helper::sendMailOtp($email_content,'registration_verfication','');
      

       return redirect()
                       ->back()
                       ->with('success',"Email has been sent to ".$message);
    }






  





    public function transactions(Request $request)
    {
      $page_title = "Transaction";
    


    //   $transaction  = Transaction::latest()->get();
    //   print_r($transaction); die;

        if($request->ajax())
        {
          $transaction  = Transaction::latest()->get();
        //   print_r($transaction); die;

         return DataTables::of($transaction)
         ->addIndexColumn()
          ->addColumn('user_type',function($row){
            if($row->user_type==1)
            {
                return $button = "Agent";
            }

            if($row->user_type==2)
            {
                return $button = "Investor";
            }
                      
           })
          
           ->addColumn('name',function($row){
                       $button = $row->user->name;
                        return $button;
             })

          ->addColumn('amount',function($row){
                       $button = "₦".number_format($row->amount,2,'.',',');
                        return $button;
             })
         ->addColumn('date',function($row){
                       $button = \Carbon\Carbon::parse($row->created_at)->format('d F Y');
                        return $button;
             })



           ->addColumn('paymentType',function($row){
                      
                if($row->payment_type ==1){
                     return $button ='<td>CREDIT</td>';
                 }
                if($row->payment_type ==2){
                     return $button ='<td>PURCHASE ITEM</td>';
                 }
                if($row->payment_type ==3){
                     return $button ='<td>COMPLETED INVST</td>';
                 }
                 if($row->payment_type ==4){
                      return $button ='<td>SUBSCRIPTION</td>';
                 }
                if($row->payment_type ==5){
                      return $button ='<td>PAYOUT</td>';
                 }
                // if($row->payment_type ==6){
                //      return  $button ='<td>CREDIT</td>';
                //  }
                
                  if($row->payment_type ==6){
                     return  $button ='<td>CREDIT FROM ADMIN</td>';
                 }
                 if($row->payment_type ==7){
                     return  $button ='<td>DEBIT FROM ADMIN</td>';
                 }




                // return $button;
                  

             })


             ->addColumn('status',function($row){
                      
                if($row->payment_status==0){
                    return  $button = '<td class="text-danger">PENDING</td>';
                 }
                if($row->payment_status==1){
                     return $button = '<td class="text-danger">SUCCESS</td>';
                 }
                if($row->payment_status==3){
                     return $button = '<td class="text-danger">FAILED</td>';
                 }

               
                  
                 

             })
             
            
         ->rawColumns(['user_type','date','amount','name','status','paymentType'])
         ->make(true);
        }

      // print_r($transaction); die;

      return view('admin::transactions',compact('page_title'));
    }
    
    
    
    
    
    public function get_notification(Request $request)
    {
       
    
      $notification       = Notification::where('is_deleted',0)->latest()->limit(3)->get();
      $unseen             = Notification::where('is_deleted',0)->where('status',0)->count();
      $notification_count = Notification::where('is_deleted',0)->where('status',0)->count();
     


       $html = '<a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                <i class="fa fa-bell" aria-hidden="true"></i>';
                if($unseen > 0){
                    $html.='<span class="notification-dot"></span>';
                  }
                    
                  $html.= '</a>
                          <ul class="dropdown-menu feeds_widget">
                          <li class="header">You have '.(($notification_count) ? $notification_count:0).' new Notifications</li>';
                            if(count($notification) > 0){
                              foreach($notification as $row)
                               { 
                                 $html.= '<li>
                                   <a href="'.url('admin/show-details-by-notification/'.$row->id).'">
                                     <div class="feeds-left"><i class="fa fa-thumbs-o-up text-success"></i></div>
                                     <div class="feeds-body">
                                         <h4 class="title text-success">'.$row->user->name.' '.$row->user->lastname.'<small class="float-right text-muted">'. \Carbon\Carbon::parse($row->created_at)->diffForHumans().'</small></h4>';

                                          if($row->status==0){
                                               $html.= '<small class="font-weight-bold">'.$row->message.'</small>';
                                            }else{
                                               $html.= '<small class="">'.$row->message.'</small>';
                                            }

                                         
                                     $html.= '</div>
                                  </a>
                                </li>';
                              }
                            }else{
                             $html.='<p>No Any Notification</p>';
                            }
                               
                              
                      $html.=' <a href="'.url('admin/show-all-notification').'" style="color:#bf6b6b;">View All</a></ul>';


          return response()->json($html);
    }



    public function show_all_notification(Request $request)
    {
      $page_title   = "Notification List";
      $notification = Notification::where('is_deleted',0)->latest()->paginate(15);
      
      if($request->ajax())
      {

           return response()->json(View::make('admin::partials.notification_ajax', array('notification' => $notification))->render());
        // $html='';
        // // print_r($notification); die;
        //  if(count($notification) > 0){
        //        foreach($notification as $row){
        //             $html.= '<a href="'.url('admin/show-details-by-notification/'.$row->id).'">
        //                 <div class="card" style="margin-top: -20px;">
        //                     <div class="clearfix">
        //                          <div class="number m-2">
        //                                 <h5>'.$row->user->name.' '.$row->user->lastname.'</h5>';
                                      
        //                            if($row->status==0){
        //                                 $html.='<p style="color:#777;" class="font-weight-bold">'.$row->message.'</p>
        //                                 <p style="color:#777;" class="font-weight-bold">'.\Carbon\Carbon::parse($row->created_at)->diffForHumans() .'</p>';
        //                                 }else{
        //                                 $html.='<p style="color:#777;" >'.$row->message.'</p>
        //                                 <p style="color:#777;" >'.\Carbon\Carbon::parse($row->created_at)->diffForHumans().'</p>';
        //                               }
        //                          $html.='</div>
        //                     </div>
                         
                                   
        //                 </div>
        //             </a>';
        //       }

        //          $html.='<p class="">'.$notification->links().'<p>';
        //           }else{
        //            $html = '<p>No Any Notification</p>';
        //          }
        // return response()->json($html);
      }
      return view('admin::notification_list',compact('page_title','notification'));
    }


    public function show_details_by_notification(Request $request,$notification_id){
      // echo $notification_id;

      $notification =  Notification::find($notification_id);
      $notification->status = 1;
      $notification->save();
      
      $user = User::find($notification->user_id);

      if($user->role ==1){
        return redirect('admin/details-agent/'.$user->id);
      }


     if($user->role ==2){
         return redirect('admin/details-investor/'.$user->id);
      }


     
    }
}
