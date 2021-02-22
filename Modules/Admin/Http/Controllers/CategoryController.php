<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DataTables;
use Auth;
use App\Category;
use Intervention\Image\ImageManagerStatic as Image;
use App\Admin;
use App\Notification;
use View;

class CategoryController extends Controller
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
        $page_title = 'Category';
         // $category = Category::where('is_deleted',0)->orderBy('createdAt','desc')->get();
         // print_r($category); die;
        if($request->ajax())
        {
           $category = Category::where('is_deleted',0)->orderBy('createdAt','desc')->get();

         return DataTables::of($category)
         ->addIndexColumn()
         ->addColumn('action',function($category){
                       // $button = '<a href="details/'.$category->id.'"><button type="button" name="edit" id="'.$category->id.'" class="edit btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true" style="color:black"></i></button></a>';

                       $button = '&nbsp;&nbsp;&nbsp;<a href="edit-category/'.$category->id.'"><button type="button" name="edit" id="'.$category->id.'" class="edit btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></button></a>';

                       $button .= '&nbsp;&nbsp;&nbsp;<a href="delete-category/'.$category->id.'" Onclick="return ConfirmDelete();" ><button type="button" name="edit" id="'.$category->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button><a>';
                        return $button;
             })
             ->addColumn('date',function($category){
                       $button = \Carbon\Carbon::parse($category->created_at)->format('d F Y');
                        return $button;
             })
               ->addColumn('image',function($category){
                 return $button = '<img src="'.$category->image.'" height="120" width="120">';
             })
             // ->addColumn('status',function($category){
               
             //         $button = '<form method="POST" action="status-category">'.csrf_field().'<input type="hidden" name="category_id" value="'.$category->id.'">
             //         <select class="form-control" name="status" onchange="this.form.submit()"><option value="1" '.($category->status==1 ? "selected":"").'>Active</option><option value="0" '.($category->status==0 ? "selected":"").'>Inctive</option><</select></form>';
             
                      
             //            return $button;
             // })
             // ->addColumn('image',function($category){
             //         // $url = "{{asset('public/assets/image/plans/".$category->category_image."')}}";
             //         $button = '<img src="'.url('public/assets/images/plans/'.$category->category_image).'" style="width:80px; height:80px;">';
             
                      
             //            return $button;
             // })
         ->rawColumns(['action','image'])
         ->make(true);
        }

           $admin = Admin::find(Auth::guard('admin')->id());
        return view('admin::category.index',compact('page_title','admin'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $page_title = 'Category';
           $admin = Admin::find(Auth::guard('admin')->id());
        return view('admin::category.create',compact('page_title','admin'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
        // print_r($request->all()); die;
        $validateData = $request->validate([
                        'category_name'=>'required',
                        'image'=>'required'
                        // 'category_image'=>'required|image|mimes:jpeg,png,jpg,bmp,gif,svg'
        ]);
        
        
         $checkCategory = Category::where('category_name',$request->category_name)
                              ->where('is_deleted',0)
                              ->first();
         if($checkCategory) return redirect()->back()->withInput()->with("exist","*Category already exist.");
           
           
         $file     = $request->file('image');
         $filename =time().'-'.$file->getClientOriginalName();
         $file->move(public_path('category'),$filename);
     
     
        $category = new Category();
        $category->category_name  = $request->category_name;
        $category->image = url('public/category').'/'.$filename;
        $category->status         = 1;
        if($category->save())
        {
            return redirect('admin/category')->with('success','Category created successfullly !!!');
        }else{
             return redirect('admin/category')->with('failed','Category cannot created try again !!!!');
        }

     



    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $page_title = 'Category';
        $category = Category::find($id);
        $admin = Admin::find(Auth::guard('admin')->id());
        return view('admin::category.edit',compact('page_title','category','admin'));
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
                        'category_name'=>'required',
                        // 'category_image'=>'required'
        ]);
        
         $checkCategory = Category::where('category_name',$request->category_name)
                                  ->where('id','!=',$request->category_id)
                                  ->where('is_deleted',0)
                                  ->first();
         
       if($checkCategory) return redirect()->back()->withInput()->with("exist","*Category already exist.");
       
        $category = Category::find($request->category_id);
        $category->category_name  = $request->category_name;
        
         if($request->has('image'))
        {
         $file     = $request->file('image');
         $filename =time().'-'.$file->getClientOriginalName();
         $file->move(public_path('category'),$filename);
         
         $category->image = url('public/category').'/'.$filename;
        }else{
            
            $category->image = $request->old_image;
        }
        $category->save();
         return redirect('admin/category')->with('success','Category updated successfullly !!!');
      

   

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
        $category = Category::find($id);
        $category->is_deleted = 1;
        $category->save();

        return redirect()->back()->with('success','Category has been deleted successfully');
    }



    public function status(Request $request)
    {
       $category = Category::find($request->category_id);
       $category->status = $request->status;
       if($category->save())
       {
        return redirect()->back()->with('success','Status has been changed!');
       }

        return redirect()->back()->with('failed','Status cannot change ,try again!!');

    }
}
