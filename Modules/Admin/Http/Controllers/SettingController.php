<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Setting;
use App\Notification;
use App\Banner;
use View;
use Auth;
use Intervention\Image\ImageManagerStatic as Image;
use DataTables;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
     
   public function __construct()
    {
    //   $notification = Notification::where('is_deleted',0)->latest()->limit(5)->get();
    //   View::share('unseen',Notification::where('is_deleted',0)->where('status',0)->count());
    //   View::share('notification_count',Notification::where('is_deleted',0)->where('status',0)->count());
    //   View::share('notification',$notification);
    }
    
    
    public function index()
    {
        $page_title = 'Social';
        $facebook = Setting::where('field_key','facebook')->first();
        $linkedin = Setting::where('field_key','linkedin')->first();
        $twitter  = Setting::where('field_key','tweeter')->first();
        $whatsapp = Setting::where('field_key','whatsapp')->first();
        $instagram = Setting::where('field_key','instagram')->first();
        return view('admin::social_links',compact('page_title','facebook','linkedin','twitter','whatsapp','instagram'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
        // print_r($request->all()); die;
        // $validateData = $request->validate([
                     
        // ]);
        foreach ($request->except('_token') as $key => $value) {
            # code...
            // print_r($key.'-'.$value);
           

            $website_settings = Setting::firstOrCreate(['field_key'=>$key]);
            $website_settings->field_key   = $key;
            $website_settings->field_value = $value;
            $website_settings->save();
   


        //  if($request->file($key)) {
                

        //         $image       = $request->file($key);
        //         // print_r($image); die;
        //          // echo public_path('assets/images/phreshfarm_img'.$image) ; die;
        //         $logoName    = time().'-'.$image->getClientOriginalName();

        //         $image_resize = Image::make($image->getRealPath());              
        //         $image_resize->resize(180, 51);
        //         $image_resize->save(public_path('assets/images/phreshfarm_img/'.$logoName));


        //     $website_settings = Setting::firstOrCreate(['field_key'=>$key]);
        //     $website_settings->field_key   = $key;
        //     $website_settings->field_value = $logoName;
        //     $website_settings->save();

        //     }


       }

        return redirect()->back()->with('success','Fields has been updated');
        // return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Request $request)
    {
        $page_title    = 'Website';
        // $website_logo  = Setting::where('field_key','website_logo')->first();
        $website_email = Setting::where('field_key','website_email')->first();
        $contact  = Setting::where('field_key','contact')->first();
        $address  = Setting::where('field_key','address')->first();
        // $contact_3  = Setting::where('field_key','contact_3')->first();
        // $mail_user  = Setting::where('field_key','MAIL_USERNAME')->first();
        // $mail_pass  = Setting::where('field_key','MAIL_PASSWORD')->first();
        return view('admin::website_setting',compact('page_title','website_email','contact','address'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function mail()
    {
        $page_title = 'Mail';
        $mail_user  = Setting::where('field_key','MAIL_USERNAME')->first();
        $mail_pass  = Setting::where('field_key','MAIL_PASSWORD')->first();
        $mail_host  = Setting::where('field_key','HOST')->first();
        return view('admin::mail_setting',compact('page_title','mail_user','mail_pass','mail_host'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function mail_create(Request $request)
    {
        //
        
          foreach ($request->except('_token') as $key => $value) {
            # code...
            // print_r($key.'-'.$value);
           

            $website_settings = Setting::firstOrCreate(['field_key'=>$key]);
            $website_settings->field_key   = $key;
            $website_settings->field_value = $value;
            $website_settings->save();
            
          }
          
           return redirect()->back()->with('success','Mail has been updated');
          
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function banner_show(Request $request)
    {
        //
        $page_title = 'Banner';
        
        if($request->ajax())
        {
           $product = Banner::where('is_deleted',0)->orderBy('createdAt','desc')->get();

         return DataTables::of($product)
         ->addIndexColumn()
         ->addColumn('action',function($product){
                     

                       $button = '&nbsp;&nbsp;&nbsp;<a href="edit-banner/'.base64_encode($product->id).'"><button type="button" name="edit" id="'.base64_encode($product->id).'" class="edit btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></button></a>';
                       
                       
                       
                       $button.= '&nbsp;&nbsp;&nbsp;<a href="delete-banner/'.base64_encode($product->id).'" Onclick="return ConfirmDelete();"><button type="button" name="edit" id="'.base64_encode($product->id).'" class="edit btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button></a>';

                      return $button;
             })
             ->addColumn('date',function($product){
                       $button = \Carbon\Carbon::parse($product->created_at)->format('d F Y');
                        return $button;
             })
             ->addColumn('description',function($product){
                return $button = $product->description;
             })
           
              ->addColumn('image',function($product){
                 return $button = '<img src="'.$product->image.'" height="120" width="120">';
             })
          
         ->rawColumns(['action','image','description'])
         ->make(true);
       }
       
       return view('admin::banner.index',compact('page_title'));
    
    }
    
    
    
     public function create_banner()
    {
        //
        $page_title ="Create Banner";   
        
        
        return view('admin::banner.create',compact('page_title'));
        
    }
    
    
     public function store_banner(Request $request)
    {
        
       $validateData = $request->validate([
         'title'=>'required',
        
          
          'description'=>'required',
          'image'=>'required'
        ]);
        
        
        
     $file     = $request->file('image');
     $filename =time().'-'.$file->getClientOriginalName();
     $file->move(public_path('banners'),$filename);
     
     
        $banner = new Banner();
        $banner->title = $request->title;
        $banner->description = $request->description;
        $banner->image = url('public/banners').'/'.$filename;
        $banner->save();
        
        
        return redirect('admin/banner')->with('success','Banner has been updated');
        
    }
    
    
     public function banner_edit($id)
    {
        //
          $page_title ="Edit Banner";   
          $banner =  Banner::find(base64_decode($id));
          return view('admin::banner.edit',compact('page_title','banner'));
    }
    
    
    
     public function banner_update(Request $request)
    {
        //
        
         $validateData = $request->validate([
         'title'=>'required',
        
          
          'description'=>'required',
        //   'image'=>'required'
        ]);
        
        
        
        
        
        $banner =  Banner::find(base64_decode($request->banner_id));
        $banner->title = $request->title;
        $banner->description = $request->description;
        
        if($request->has('image'))
        {
         $file     = $request->file('image');
         $filename =time().'-'.$file->getClientOriginalName();
         $file->move(public_path('banners'),$filename);
         
         $banner->image = url('public/banners').'/'.$filename;
        }else{
            
            $banner->image = $request->old_image;
        }
            
         $banner->save();
        
        
        return redirect('admin/banner')->with('success','Banner has been updated');
        
    }
    
    
    
     public function delete_banner($id)
    {
        //
        $banner = Banner::find(base64_decode($id));
        $banner->is_deleted = 1;
        $banner->save();
        return redirect()->back()->with('success','Banner deleted successfully');
    }
    
    
    
}
