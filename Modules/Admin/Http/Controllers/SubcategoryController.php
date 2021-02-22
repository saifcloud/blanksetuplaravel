<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Subcategory;
use App\Category;
use App\Pack;
use App\Subcategory_pack;
use App\Notification;
use View;
use DataTables;
use Intervention\Image\ImageManagerStatic as Image;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
     
 public function __construct()
    {
      $notification = Notification::where('is_deleted',0)->latest()->limit(5)->get();
      View::share('unseen',Notification::where('is_deleted',0)->where('status',0)->count());
      View::share('notification_count',Notification::where('is_deleted',0)->where('status',0)->count());
      View::share('notification',$notification);
    }
    
    
    public function index(Request $request)
    {
        $page_title = 'Items';
        // $subcategory = Subcategory::with('category')->where('is_deleted',0)->get();
        // print_r($subcategory->subcategory_pack);die;
        if($request->ajax())
        {
         $subcategory = Subcategory::where('is_deleted',0)->latest()->get();

         return DataTables::of($subcategory)
         ->addIndexColumn()
         ->addColumn('action',function($subcategory){
                       // $button = '<a href="details/'.$category->id.'"><button type="button" name="edit" id="'.$category->id.'" class="edit btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true" style="color:black"></i></button></a>';

                       $button = '&nbsp;&nbsp;&nbsp;<a href="edit-subcategory/'.$subcategory->id.'"><button type="button" name="edit" id="'.$subcategory->id.'" class="edit btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></button></a>';

                        $button .= '&nbsp;&nbsp;&nbsp;<a href="delete-subcategory/'.$subcategory->id.'" Onclick="return ConfirmDelete();" ><button type="button" name="edit" id="'.$subcategory->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button><a>';
                        return $button;
             })
             ->addColumn('date',function($subcategory){
                       $button = \Carbon\Carbon::parse($subcategory->created_at)->format('d M y');
                        return $button;
             })
             ->addColumn('category',function($subcategory){
                       $button = $subcategory->category->category_name;
                        return $button;
             })

               ->addColumn('image',function($subcategory){
                       $button = '<img src="'.url('public/assets/images/phreshfarm_img/'.$subcategory->image).'" height="80" width="80">';
                        return $button;
             })

               ->addColumn('duration',function($subcategory){
                      if($subcategory->duration > 1)
                      {
                       $button = $subcategory->duration.' months';
                      }else{
                       $button = $subcategory->duration.' month';
                      }
                       
                        return $button;
             })
               ->addColumn('roi',function($subcategory){
                     
                       $button = $subcategory->roi.'%';
                     
                       
                        return $button;
             })
               ->addColumn('description',function($subcategory){
                       $button =\Illuminate\Support\Str::limit($subcategory->description ?? '',10,' ..');
                        return $button;
             })
             
               ->addColumn('pack',function($subcategory){
                       $arr =[];
                       if(count($subcategory->subcategory_pack) > 0)
                       {
                        foreach ($subcategory->subcategory_pack as $key => $value) {
                            # code...
                            $arr[] = $value->pack->pack_name;
                        }
                       }


                      
                        return  (count($arr) > 0)? implode(',', $arr):"Empty";
             })
             ->addColumn('status',function($subcategory){
               
                     $button = '<form method="POST" action="status-subcategory">'.csrf_field().'<input type="hidden" name="subcategory_id" value="'.$subcategory->id.'">
                     <select class="form-control" name="status" onchange="this.form.submit()"><option value="1" '.($subcategory->status==1 ? "selected":"").'>Active</option><option value="0" '.($subcategory->status==0 ? "selected":"").'>Inactive</option><</select></form>';
             
                      
                        return $button;
             })
           
         ->rawColumns(['action','image','date','status','category','description','duration','pack'])
         ->make(true);
        }
        return view('admin::subcategory.index',compact('page_title'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $page_title = 'Category';
        $category   = Category::where('status',1)->where('is_deleted',0)->get();
        $pack   = Pack::where('status',1)->where('is_deleted',0)->get();
        return view('admin::subcategory.create',compact('page_title','category','pack'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    // public function store(Request $request)
    // {
    //     //
    //     // print_r($request->all()); die;
    //     $validateData = $request->validate([
    //                     'item'=>'required',
    //                     'category'   =>'required',
    //                     'roi'        =>'required',
    //                     'duration'   =>'required',
    //                     'image'      =>'required'
    //     ]);

       
    //     $file     = $request->file('image');
    //     $filename = time().'-'.$file->getClientOriginalName();

    //      $image_resize = Image::make($file->getRealPath());              
    //      $image_resize->resize(622, 413);
    //      $image_resize->save(public_path('assets/images/phreshfarm_img/' .$filename));

    //      // $file->move(public_path('assets/images/phreshfarm_img'),$filename);

    //     $subategoryCreate = new Subcategory();
    //     $subategoryCreate->subcategory_name  = $request->item;
    //     $subategoryCreate->category_id       = $request->category;
    //     $subategoryCreate->roi               = $request->roi;
    //     $subategoryCreate->duration          = $request->duration;
    //     $subategoryCreate->description       = ($request->description)? $request->description:'';
    //     $subategoryCreate->roi_type          = 'percentage';
    //     $subategoryCreate->image             = $filename;
    //     $subategoryCreate->status            = 0;
    //     if($subategoryCreate->save())
    //     {
    //         return redirect('admin/subcategory')->with('success','Item created successfullly !!!');
    //     }else{
    //          return redirect('admin/subcategory')->with('success','Item cannot created try again !!!!');
    //     }

     



    // }
    
    
    
    
     public function store(Request $request)
    {
        //
        // print_r($request->all()); die;
        $validateData = $request->validate([
                        'item'=>'required',
                        'category'   =>'required',
                        'roi'        =>'required',
                        'duration'   =>'required',
                        'image'      =>'required',
                        'pack'       =>'required'
        ]);

       
        $file     = $request->file('image');
        $filename = time().'-'.$file->getClientOriginalName();

         $image_resize = Image::make($file->getRealPath());              
         $image_resize->resize(622, 413);
         $image_resize->save(public_path('assets/images/phreshfarm_img/' .$filename));

         // $file->move(public_path('assets/images/phreshfarm_img'),$filename);

        $subategoryCreate = new Subcategory();
        $subategoryCreate->subcategory_name  = $request->item;
        $subategoryCreate->category_id       = $request->category;
        $subategoryCreate->roi               = $request->roi;
        $subategoryCreate->duration          = $request->duration;
        $subategoryCreate->description       = ($request->description)? $request->description:'';
        $subategoryCreate->roi_type          = 'percentage';
        $subategoryCreate->image             = $filename;
        $subategoryCreate->status            = 0;
        if($subategoryCreate->save())
        {

            foreach ($request->pack as $key => $value) {
                # code...
                $subpack = new Subcategory_pack();
                $subpack->category_id    = $request->category;
                $subpack->subcategory_id = $subategoryCreate->id;
                $subpack->pack_id        = $value;
                $subpack->save();
            }
            return redirect('admin/subcategory')->with('success','Item created successfullly !!!');
        }else{
             return redirect('admin/subcategory')->with('success','Item cannot created try again !!!!');
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
        $subcategory = Subcategory::find($id);
        $category   = Category::where('status',1)->where('is_deleted',0)->get();
        $pack   = Pack::where('status',1)->where('is_deleted',0)->get();
        return view('admin::subcategory.edit',compact('page_title','category','subcategory','pack'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    // public function update(Request $request)
    // {

    //     // print_r($request->all()); die;
    //      $validateData = $request->validate([
    //                     'item'=>'required',
    //                     'category'  =>'required',
    //                     'roi'       =>'required',
    //                     'duration'  =>'required'
    //     ]);

       
    //     if($request->hasFile('image')){

    //     $file     = $request->file('image');
    //     $filename = time().'-'.$file->getClientOriginalName();
    //     // $file->move(public_path('assets/images/phreshfarm_img'),$filename);
    //      $image_resize = Image::make($file->getRealPath());              
    //      $image_resize->resize(622, 413);
    //      $image_resize->save(public_path('assets/images/phreshfarm_img/' .$filename));


    //     }else{
    //         // $file     = $request->file('existingImage');
    //         $filename = $request->file('image');
    //         // $file->move(public_path('assets/images/subcategory'),$filename);
    //     }
        
    //     // echo $filename;die;
    //     $subategoryUpdate = Subcategory::find($request->subcategory_id);
    //     // print_r($subategoryUpdate);die;
    //     $subategoryUpdate->subcategory_name     = $request->item;
    //     $subategoryUpdate->category_id       = $request->category;
    //     $subategoryUpdate->roi           = $request->roi;
    //     $subategoryUpdate->duration      = $request->duration;
    //     $subategoryUpdate->image             = $filename;
    //     $subategoryUpdate->description      = ($request->description)? $request->description:'';
    //     // $subategory->status         = 0;
    //     if($subategoryUpdate->save())
    //     {
    //         return redirect('admin/subcategory')->with('success','Item updated successfullly !!!');
    //     }else{
    //          return redirect('admin/subcategory')->with('success','Item cannot update try again !!!!');
    //     }

   

    // }
    
    
    
     public function update(Request $request)
    {

        // print_r($request->all()); die;
         $validateData = $request->validate([
                        'item'=>'required',
                        'category'  =>'required',
                        'roi'       =>'required',
                        'duration'  =>'required',
                        'pack'      =>'required'
        ]);

       
        if($request->hasFile('image')){
       
        $file     = $request->file('image');
        $filename = time().'-'.$file->getClientOriginalName();
        // $file->move(public_path('assets/images/phreshfarm_img'),$filename);
         $image_resize = Image::make($file->getRealPath());              
         $image_resize->resize(622, 413);
         $image_resize->save(public_path('assets/images/phreshfarm_img/' .$filename));


        }else{
            // die;
            // $file     = $request->file('existingImage');
            $filename = $request->existingImage;
            // $file->move(public_path('assets/images/subcategory'),$filename);
        }
        
        // echo $filename;die;
        $subategoryUpdate = Subcategory::find($request->subcategory_id);
        // print_r($subategoryUpdate);die;
        $subategoryUpdate->subcategory_name     = $request->item;
        $subategoryUpdate->category_id       = $request->category;
        $subategoryUpdate->roi           = $request->roi;
        $subategoryUpdate->duration      = $request->duration;
        $subategoryUpdate->image             = $filename;
        $subategoryUpdate->description      = ($request->description)? $request->description:'';
        // $subategory->status         = 0;
        if($subategoryUpdate->save())
        {
             Subcategory_pack::where('subcategory_id',$subategoryUpdate->id)->update(['is_deleted'=>1]);
            //  if(count($request->pack) >0  && !empty($request->pack)) {
                 foreach ($request->pack as $key => $value) {
                    # code...
                    $subpack = new Subcategory_pack();
                    $subpack->category_id    = $request->category;
                    $subpack->subcategory_id = $subategoryUpdate->id;
                    $subpack->pack_id        = $value;
                    $subpack->save();
                }
            //  }

            return redirect('admin/subcategory')->with('success','Item updated successfullly !!!');
        }else{
             return redirect('admin/subcategory')->with('success','Item cannot update try again !!!!');
        }

   

    }
    
    

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
        $subcategory = Subcategory::find($id);
        $subcategory->is_deleted = 1;
        $subcategory->save();

        return redirect()->back()->with('success','Subcategory has been deleted successfully');
    }



    public function status(Request $request)
    {
       $subcategory = Subcategory::find($request->subcategory_id);
       $subcategory->status = $request->status;
       if($subcategory->save())
       {
        return redirect()->back()->with('success','Status has been changed!');
       }

        return redirect()->back()->with('failed','Status cannot change ,try again!!');

    }
}
