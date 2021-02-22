<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DataTables;
use Auth;
Use Exception;
use App\Product;
use App\Admin;
use App\Category;
use App\Size;
use App\Product_size;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
         $page_title = 'Product';
          // $category = Product::with(['category'])->where('is_deleted',0)->orderBy('createdAt','desc')->get();
          // echo "<pre>";
          // print_r($category); die;
        if($request->ajax())
        {
           $product = Product::where('is_deleted',0)->orderBy('id','desc')->get();

         return DataTables::of($product)
         ->addIndexColumn()
         ->addColumn('action',function($product){
                     

                       $button = '&nbsp;&nbsp;&nbsp;<a href="edit-product/'.base64_encode($product->id).'"><button type="button" name="edit" id="'.base64_encode($product->id).'" class="edit btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></button></a>';

                        // $button .= '&nbsp;&nbsp;&nbsp;<a href="delete-product/'.base64_encode($product->id).'" Onclick="return ConfirmDelete();" ><button type="button" name="edit" id="'.base64_encode($product->id).'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button><a>';
                        return $button;
             })
             ->addColumn('date',function($product){
                       $button = \Carbon\Carbon::parse($product->created_at)->format('d F Y');
                        return $button;
             })
             ->addColumn('category',function($product){
                return $button = ($product->category)? $product->category->category_name:'';
             })
             ->addColumn('size',function($product){
                //   $arrdata = [];
                //   foreach ($product->size_of_product as $key => $value) {
                //       # code...
                //     $arrdata[] = $value->sizes->size_name;
                //   }
                //   $str = implode('<br>',$arrdata);
                 return $button = ($product->size_of_product) ? $product->size_of_product->size_name:'';
             })
              ->addColumn('image',function($product){
                 return $button = '<img src="'.url('/').$product->image.'" height="120" width="120">';
             })
             // ->addColumn('status',function($product){
               
             //         $button = '<form method="POST" action="status-category">'.csrf_field().'<input type="hidden" name="category_id" value="'.$category->id.'">
             //         <select class="form-control" name="status" onchange="this.form.submit()"><option value="1" '.($category->status==1 ? "selected":"").'>Active</option><option value="0" '.($category->status==0 ? "selected":"").'>Inctive</option><</select></form>';
             
                      
             //            return $button;
             // })
             // ->addColumn('image',function($category){
             //         // $url = "{{asset('public/assets/image/plans/".$category->category_image."')}}";
             //         $button = '<img src="'.url('public/assets/images/plans/'.$category->category_image).'" style="width:80px; height:80px;">';
             
                      
             //            return $button;
             // })
         ->rawColumns(['action','image','size','description'])
         ->make(true);
        }
        return view('admin::product.index',compact('page_title'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        
        $page_title ="Add Product";
        $category = Category::where('is_deleted',0)->get();
        $size     = Size::where('is_deleted',0)->get();
        return view('admin::product.create',compact('page_title','category','size'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
        //  'product_name'=>'required',
         // 'image'=>'required',
          'category' =>'required',
          'size' =>'required',
          'description'=>'required',
        //  'color'=>'required',
        //  'material_type'=>'required',
        //  'water_resistant'=>'required',
        //  'product_image'=>'required'
        ]);
    

     $checkproduct =  Product::where('category_id',$request->category)
                            ->where('product_size',$request->size)
                            ->first();
    
      if($checkproduct) return redirect()->back()->withInput()->with('sizeerror','Size is already exist in this category.');

     $product =  new Product();
 
     $product->category_id = $request->category;
     $product->product_size = $request->size;
     $product->description = $request->description;
  
     if($product->save()){
     
    return redirect('admin/product-list')->with('success','Product added successfully.');
     }else{
      return redirect()->back()->with('success','Please try again.');
     }

       
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::product.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $page_title = "Edit Product";
        $product = Product::with(['size_of_product'])->find(base64_decode($id));
        // print_r($product); die;
       
        $category = Category::where('is_deleted',0)->get();
        $size     = Size::where('is_deleted',0)->get();
        return view('admin::product.edit',compact('page_title','product','category','size'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
      
    //  print_r($request->all()); die;
          $validateData = $request->validate([
        //  'product_name'=>'required',
         // 'image'=>'required',
         'category' =>'required',
         'size' =>'required',
         'description'=>'required'
        //  'color'=>'required',
        //  'material_type'=>'required',
        //  'water_resistant'=>'required',
         // 'product_image'=>'required'
        ]);
    

     
     $checkproduct =  Product::where('category_id',$request->category)
                              ->where('product_size',$request->size)
                              ->where('id','!=',base64_decode($request->product_id))
                              ->first();
    // print_r($checkproduct); die;
    if(!empty($checkproduct)) {
        
         return redirect()->back()->withInput()->with('sizeerror','Size is already exist in this category.');
    }
   
    
    
     $product =  Product::find(base64_decode($request->product_id));
     $product->category_id = $request->category;
     $product->product_size = $request->size;
     $product->description = $request->description;
    if($product->save()){
      return redirect('admin/product-list')->with('success','Product updated successfully.');
     }else{
      return redirect()->back()->with('success','Please try again.');
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
        $product = Product::find(base64_decode($id));
        $product->is_deleted = 1;
        $product->save();

        return redirect()->back()->with('success','Product has been deleted successfully');
    }
}
