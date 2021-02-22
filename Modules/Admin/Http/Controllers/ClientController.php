<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\User;
use Hash;
use DataTables;
use App\Wallet;
use App\Admin;
use App\Notification;
use View;
use Auth;



class ClientController extends Controller
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
    
    public function index(Request $request)
    {   
       $page_title = 'Client';

      
       // print_r($data); die;
        if($request->ajax())
        {
             $data = User::where('is_deleted',0)->latest()->get();
             
            return DataTables::of($data)
             ->addIndexColumn()
             ->addColumn('date', function($data){
                       $button = \Carbon\Carbon::parse($data->created_at)->format('d M Y');
                         
                        return $button;
                       })
            
                ->addColumn('image',function($data){
                 return $button = '<img src="'.url('/').$data->image.'" height="120" width="120">';
                  })


                 // ->addColumn('status', function($data){
                 //        if($data->status == 1)
                 //        {
                 //            $button = '<p class="text-success">YES</p>'; 
                 //        }

                 //         if($data->status == 0)
                 //         {
                 //            $button = '<p class="text-danger">NO</p>'; 
                 //        }
                         
                 //        return $button;
                 //       })

            
                ->addColumn('action', function($data){
                      

                        // $button = '<a href="details-client/'.base64_encode($data->id).'"><button type="button" name="edit" id="'.base64_encode($data->id).'" class="edit btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true" style="color:black"></i></button></a>';

                       $button = '&nbsp;&nbsp;&nbsp;<a href="edit-client/'.base64_encode($data->id).'"><button type="button" name="edit" id="'.base64_encode($data->id).'" class="edit btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></button></a>';

                         $button .= '&nbsp;&nbsp;&nbsp;<a href="delete-client/'.$data->id.'"><button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button><a>';
                        return $button;
                    })
                    ->rawColumns(['image','action','date'])
                    ->make(true);
        }
        $admin = Admin::find(Auth::guard('admin')->id());
        return view('admin::client.index',compact('page_title','admin'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {   
        $page_title = 'Create Client';
        $admin = Admin::find(Auth::guard('admin')->id());
        return view('admin::client.create',compact('page_title','admin'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate([
         'username'   =>'required',
         'fullname'    =>'required',
         'email'   =>'required|email',
         'phone'  =>'required',
         'image'     =>'required',
         'password'=>'required'
        ]);


     $emailcheck =  User::where('email',$request->email)->where('type',1)->first();
          // print_r($user_status); die;
     if(!empty($emailcheck))
     {
      return redirect()->back()->withInput()->with('emailexist','email is already exist');
     }

     $usernameCheck =  User::where('username',$request->username)->where('type',1)->first();
         // print_r($usernameCheck); die;
     if(!empty($usernameCheck))
     {
      return redirect()->back()->withInput()->with('usernameexist','username is already exist');
     }

        $file = $request->file('image');
        $filename = time().'-'.$file->getClientOriginalName();
        $file->move(public_path('users'),$filename);

        $client = new User();
        $client->username  = $request->username;
        $client->fullname  = $request->fullname;
        $client->email     = $request->email;
        $client->phone     = $request->phone;
        $client->image     = '/public/users/'.$filename;
        $client->password  = Hash::make($request->password);
        $client->type      = 1;
        $client->save();

        return redirect('admin/client')->with('success','Client created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {   
        $page_title = 'Agent';
        $user = User::find($id);
        $afp = \DB::table('agent_first_plans')->where('user_id',$id)->first();

        
        // print_r($afp); die;
         $admin = Admin::find(Auth::guard('admin')->id());
        return view('admin::client.agent_details',compact('page_title','user','afp','admin','total_referred'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
         $page_title = 'Edit User';
         $client = User::find(base64_decode($id));
         $admin = Admin::find(Auth::guard('admin')->id());
        return view('admin::client.edit',compact('page_title','client','admin'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
        
         //
        $validateData = $request->validate([
         'username'   =>'required',
         'fullname'   =>'required',
         'email'      =>'required|email',
         'phone'      =>'required',
         // 'image'     =>'required',
         // 'password'   =>'required'
        ]);

       // print_r($request->all());
        $userDetails =  User::find(base64_decode($request->client_id));
       
        
        if($request->has('image')){

            $file = $request->file('image');
            $filenamerr = time().'-'.$file->getClientOriginalName();
            $file->move(public_path('users'),$filenamerr);
            $filename = '/public/users/'.$filenamerr;
        }else{
             $filename= $request->old_image;
        }

       // if same email

        // print_r($filename); die;
        if($userDetails->email == $request->email)
        {
            $client =  User::find(base64_decode($request->client_id));
            // $client->username  = $request->username;
            $client->fullname  = $request->fullname;
            $client->email     = $request->email;
            $client->phone     = $request->phone;
            $client->image     = $filename;
            // $client->password  = Hash::make($request->password);
            // $client->type      = 1;

            if($client->save())
                {
                  return redirect('admin/client')->with('success','Client updated successfully!!');
                }else{
                  return redirect('admin/client')->with('success','Client cannot created at this time !!');
                }

        }else{
          

              $emailcheck =  User::where('email',$request->email)->where('type',1)->first();
          // print_r($user_status); die;
             if(!empty($emailcheck))
             {
              return redirect()->back()->withInput()->with('emailexist','email is already exist');
             }

             $usernameCheck =  User::where('username',$request->username)->where('type',1)->first();
                 // print_r($usernameCheck); die;
             if(!empty($usernameCheck))
             {
              return redirect()->back()->withInput()->with('usernameexist','username is already exist');
             }

            $client =  User::find(base64_decode($request->client_id));
            // $client->username  = $request->username;
            $client->fullname  = $request->fullname;
            $client->email     = $request->email;
            $client->phone     = $request->phone;
            $client->image     = $filename;
            // $client->password  = Hash::make($request->password);
            // $client->type      = 1;
            if($client->save())
            {
              return redirect('admin/client')->with('success','Client updated successfully!!');
            }else{
              return redirect('admin/client')->with('success','Client cannot created at this time !!');
            }

        }

        // print_r($user); die;
       

       

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->is_deleted = 1;
        $user->save();


        return redirect('admin/client')->with('success','User Deleted Successfully');
    }



    public function approve_agent(Request $request)
    {
     // print_r($request->all()); die;
        $user = User::find($request->user_id);
        $user->is_agent_approved = $request->agent_status;
        $user->save();

        if($request->agent_status==1)
        {
            $msg ='activated';
        }

         if($request->agent_status==2)
        {
            $msg ='in pending';
        }

         if($request->agent_status==3)
        {
            $msg ='rejected';
        }
        return redirect()->back()->with('success','Agent account is "'.$msg.'" successfully');
    }
}
