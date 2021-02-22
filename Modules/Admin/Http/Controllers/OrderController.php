<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Hash;
use DataTables;
use App\Order;
use App\Admin;
use App\User;
use App\Category;
use App\Size;
use App\Notification;
use App\Jobsite;
use App\Yard;
use App\Available_in_yard;
use App\Mat_on_site;
use View;
use Auth;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $page_title = 'Order';

      
       // print_r($data); die;
        if($request->ajax())
        {
             $data = Order::orderBy('id','desc')->get();
             
            return DataTables::of($data)
             ->addIndexColumn()
             ->addColumn('date', function($data){
               $button = \Carbon\Carbon::parse($data->created_at)->format('d M Y');
                 
                return $button;
               })
            
              

               ->addColumn('category',function($data){
                 return $button = ($data->category) ? $data->category->category_name:'';
                  })

                 ->addColumn('size',function($data){
                    return $button = ($data->pd_size)? $data->pd_size->size_name:'';
                     })
   
               
                 ->addColumn('delivery_status',function($data){
                     
                     if($data->delivery_status !=4){
                         
                        $btn = '<form method="POST" action="'.url('/admin/change-order-status').'">
                      <input type="hidden" name="_token" value="'.csrf_token().'"/>
                      
                       <input type="hidden" name="order_product_id" value="'.$data->id.'"/>
                      <select class="form-control order-status" onchange="this.form.submit()" id="order-status" name="status"><option value="1" '.(($data->delivery_status==1) ? "selected":"").' >Pending</option>
                                   <option value="2"  '.(($data->delivery_status==2) ? "selected":"").' >Processing</option>
                                    <option value="3" '.(($data->delivery_status==3) ? "selected":"").' >Out for delivery</option>
                                   <option value="4"  '.(($data->delivery_status==4) ? "selected":"").' >Delivered</option>
                                  </select></form>';
                     }else{
                         
                         $btn = '<span class="text-success">Delivered</span>';
                     }
                     
                            return $btn;
                            
                            
                    //  if($data->delivery_status==1){
                         
                    //      return '<span class="text-warning">Pending</span>';
                    //  }
                     
                    //  if($data->delivery_status==2){
                    //       return '<span class="text-info">Processing</span>';
                    //  }
                     
                    //  if($data->delivery_status==3){
                    //       return '<span class="text-info">Out for delivery</span>';
                    //  }
                     
                     
                    //  if($data->delivery_status==4){
                    //       return '<span class="text-success">Delivered</span>';
                    //  }
                 
                      })
                     
                     
                     ->addColumn('payment_status',function($data){
                     
                     if($data->payment_status==1){
                         
                         return '<span class="text-warning">Pending</span>';
                     }
                     
                     if($data->payment_status==2){
                          return '<span class="text-success">Success</span>';
                     }
                     
                   
                 
                     })

                

            
                ->addColumn('action', function($data){
                      

                      $button = '<a href="order-details/'.base64_encode($data->id).'"><button type="button" name="edit" id="'.base64_encode($data->id).'" class="edit btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true" style="color:black"></i></button></a>';

                       // $button = '&nbsp;&nbsp;&nbsp;<a href="edit-client/'.base64_encode($data->id).'"><button type="button" name="edit" id="'.base64_encode($data->id).'" class="edit btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></button></a>';

                        // $button .= '&nbsp;&nbsp;&nbsp;<a href="delete-agent/'.$data->id.'"><button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button><a>';
                         return $button;
                    })
                    ->rawColumns(['image','action','date','delivery_status','payment_status','category'])
                    ->make(true);
        }
        $admin = Admin::find(Auth::guard('admin')->id());
        return view('admin::order.index',compact('page_title'));
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
     
     
     //change status of maek
    public function store(Request $request)
    {
        //
        $order = Order::find($request->order_product_id);
        $order->delivery_status = $request->status;
        $order->save();
        
          if( $request->status==4){
        //   $user =  User::find($order->user_id)->get();
        //   $jobsite = Jobsite::find($order->site);
        //   Yard;
        //   Available_in_yard;
        //   Mat_on_site
        
        // $size_id =  Size::where('size_name',$order->size)->where('is_deleted',0)->get();
        
        $getmat_on_site = Mat_on_site::where('job_site_id',$order->site)
                                  ->where('size_id',$order->size)
                                  ->first();
        
        if($getmat_on_site){
            
            $mat_on_site = Mat_on_site::find($getmat_on_site->id);
            $mat_on_site->brand_new = $mat_on_site->brand_new+$order->quantity;
            $mat_on_site->total = $mat_on_site->total+$order->quantity;
            $mat_on_site->save();
            
            
            
            $yard = Yard::find($getmat_on_site->yard_id);
            $yard->brand_new = $yard->brand_new+$order->quantity;
            $yard->total = $yard->total+$order->quantity;
            $yard->save();
        
        }else{
            
            $yard = new Yard();
            $yard->user_id =$order->user_id;
            $yard->category_id =$order->category_id;
            $yard->size_id =$order->size;
            $yard->brand_new =$order->quantity;
            $yard->total =$order->quantity;
            $yard->save();
            
            
            $mat_on_site =new Mat_on_site();
            $mat_on_site->user_id =$order->user_id;
            $mat_on_site->yard_id =$yard->id;
            $mat_on_site->category_id =$order->category_id;
            $mat_on_site->size_id =$order->size;
            $mat_on_site->brand_new =$order->quantity;
            $mat_on_site->job_site_id =$order->site;
            $mat_on_site->total =$order->quantity;
            $mat_on_site->save();
            
            
            
           
            
        }
        
       
        
                                
        // print_r($mat_on_site); die;
           
       }
        
        // return response()->json(['status'=>true,'message'=>'Status has been changed.']);
        
        return redirect()->back()->with('success','Order status has been changed.');
        
       
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
         $page_title = "Order Details";
         $order = Order::where('id',base64_decode($id))->first();
        //  print_r($order); die;
         return view('admin::order.show',compact('page_title','order'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
