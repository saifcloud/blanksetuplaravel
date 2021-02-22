<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Size;
use App\Admin;
use Auth;
use DataTables; 
class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {

        $page_title = 'Size';
         // $category = Category::where('is_deleted',0)->orderBy('createdAt','desc')->get();
         // print_r($category); die;
        if($request->ajax())
        {
           $size = Size::where('is_deleted',0)->orderBy('createdAt','desc')->get();

         return DataTables::of($size)
         ->addIndexColumn()
         ->addColumn('action',function($size){
                     

                       $button = '&nbsp;&nbsp;&nbsp;<a href="edit-size/'.$size->id.'"><button type="button" name="edit" id="'.$size->id.'" class="edit btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></button></a>';

                        $button .= '&nbsp;&nbsp;&nbsp;<a href="delete-size/'.$size->id.'" Onclick="return ConfirmDelete();" ><button type="button" name="edit" id="'.$size->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button><a>';
                        return $button;
             })
             ->addColumn('date',function($size){
                       $button = \Carbon\Carbon::parse($size->created_at)->format('d F Y');
                        return $button;
             })
             // ->addColumn('status',function($size){
               
             //         $button = '<form method="POST" action="status-category">'.csrf_field().'<input type="hidden" name="category_id" value="'.$category->id.'">
             //         <select class="form-control" name="status" onchange="this.form.submit()"><option value="1" '.($category->status==1 ? "selected":"").'>Active</option><option value="0" '.($category->status==0 ? "selected":"").'>Inctive</option><</select></form>';
             
                      
             //            return $button;
             // })
             // ->addColumn('image',function($category){
             //         // $url = "{{asset('public/assets/image/plans/".$category->category_image."')}}";
             //         $button = '<img src="'.url('public/assets/images/plans/'.$category->category_image).'" style="width:80px; height:80px;">';
             
                      
             //            return $button;
             // })
         ->rawColumns(['action'])
         ->make(true);
        }
        return view('admin::size.index',compact('page_title'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $page_title = 'Size';
        $admin = Admin::find(Auth::guard('admin')->id());
        return view('admin::size.create',compact('page_title','admin'));
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
                        'width'=>'required',
                        'height'=>'required',
                        // 'category_image'=>'required|image|mimes:jpeg,png,jpg,bmp,gif,svg'
        ]);
        
        $checkifExist = Size::where('size_name',$request->width.'x'.$request->height)
                             -> where('is_deleted',0)
                             ->first();
                             
        if($checkifExist) return redirect()->back()->withInput()->with("failed","*Size already exist.");
        
        $size = new Size();
        $size->size_name  = $request->width.'x'.$request->height;
        $size->status         = 1;
        if($size->save())
        {
            return redirect('admin/size')->with('success','Size created successfullly !!!');
        }else{
             return redirect('admin/size')->with('success','Size cannot created try again !!!!');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::size.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $page_title = 'Size';
        $size = Size::find($id);
        $admin = Admin::find(Auth::guard('admin')->id());
        return view('admin::size.edit',compact('page_title','size','admin'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
        $validateData = $request->validate([
                        'width'=>'required',
                        'height'=>'required',
                        // 'category_image'=>'required|image|mimes:jpeg,png,jpg,bmp,gif,svg'
        ]);

        // print_r($request->all()); die;

        $checkifExist = Size::where('size_name',$request->width.'x'.$request->height)
                              ->where('id','!=',$request->size_id)
                             -> where('is_deleted',0)
                             ->first();
       
      if($checkifExist) return redirect()->back()->withInput()->with("failed","*Size already exist.");
                             
                             
        $size = Size::find($request->size_id);
        $size->size_name  = $request->width.'x'.$request->height;
        if($size->save())
        {
            return redirect('admin/size')->with('success','Size updated successfullly !!!');
        }else{
             return redirect('admin/size')->with('success','Size cannot update try again !!!!');
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
        $size = Size::find($id);
        $size->is_deleted = 1;
        $size->save();

        return redirect()->back()->with('success','Size has been deleted successfully');
    }
}
