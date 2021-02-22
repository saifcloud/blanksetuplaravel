<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Pack;
use App\Subcategory;
use App\Notification;
use App\Subcategory_pack;
use View;
use DataTables;
use App\Admin;
use Auth;

class PackController extends Controller
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
        $page_title = 'Pack';

        // $subcategory = Subcategory::with('category')->where('is_deleted',0)->get();
        // print_r($subcategory);die;
        if($request->ajax())
        {
         $pack = Pack::where('is_deleted',0)->latest()->get();

         return DataTables::of($pack)
         ->addIndexColumn()
         ->addColumn('action',function($pack){
                       // $button = '<a href="details/'.$category->id.'"><button type="button" name="edit" id="'.$category->id.'" class="edit btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true" style="color:black"></i></button></a>';

                       $button = '&nbsp;&nbsp;&nbsp;<a href="edit-pack/'.$pack->id.'"><button type="button" name="edit" id="'.$pack->id.'" class="edit btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></button></a>';

                        $button .= '&nbsp;&nbsp;&nbsp;<a href="delete-pack/'.$pack->id.'" Onclick="return ConfirmDelete();" ><button type="button" name="edit" id="'.$pack->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button><a>';
                        return $button;
             })
             ->addColumn('date',function($pack){
                       $button = \Carbon\Carbon::parse($pack->created_at)->format('d M y');
                        return $button;
             })
            //  ->addColumn('subcategory',function($pack){
            //           $button = $pack->subcategory->subcategory_name;
            //             return $button;
            //  })
             ->addColumn('price',function($pack){
                       $button =number_format($pack->price,2,'.',',');
                        return $button;
             })
             ->addColumn('status',function($pack){
               
                     $button = '<form method="POST" action="status-pack">'.csrf_field().'<input type="hidden" name="pack_id" value="'.$pack->id.'">
                     <select class="form-control" name="status" onchange="this.form.submit()"><option value="1" '.($pack->status==1 ? "selected":"").'>Active</option><option value="0" '.($pack->status==0 ? "selected":"").'>Inactive</option><</select></form>';
             
                      
                        return $button;
             })
           
         ->rawColumns(['action','date','status','price'])
         ->make(true);
        }
         $admin = Admin::find(Auth::guard('admin')->id());
        return view('admin::packs.index',compact('page_title','admin'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $page_title = 'Pack';
        $subcategory   = Subcategory::where('status',1)->where('is_deleted',0)->get();
        return view('admin::packs.create',compact('page_title','subcategory'));
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
                        'pack'      =>'required',
                        // 'item'  =>'required',
                        'price'       =>'required',
                     
        ]);
        
      if(Pack::where('pack_name', $request->pack)->where('is_deleted',0)->exists()){
      return redirect()->back()->withInput()->with('failed','Pack aleady exist !!!!');
      }


       
    

        $packCreate = new Pack();
        $packCreate->pack_name      = $request->pack;
        $packCreate->subcategory_id = 0;//$request->item;
        $packCreate->price          = $request->price;
        $packCreate->status         = 0;
        if($packCreate->save())
        {
            return redirect('admin/pack')->with('success','Pack created successfullly !!!');
        }else{
             return redirect('admin/pack')->with('success','Pack cannot created try again !!!!');
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
        $page_title = 'Pack';
        $pack = Pack::find($id);
        $subcategory   = Subcategory::where('status',1)->where('is_deleted',0)->get();
        return view('admin::packs.edit',compact('page_title','subcategory','pack'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {

        // print_r($request->all()); die;
        $validateData = $request->validate([
                        'pack'      =>'required',
                        // 'item'  =>'required',
                        'price'       =>'required',
                     
        ]);
       
       
        $pkname = Pack::where('id', $request->pack_id)->where('is_deleted',0)->first();

        if($pkname->pack_name != $request->pack)
        {
          if(Pack::where('pack_name', $request->pack)->where('is_deleted',0)->exists()){
          return redirect()->back()->withInput()->with('failed','Pack aleady exist !!!!');
          } 
        }
       
    

        $packCreate = Pack::find($request->pack_id);
        $packCreate->pack_name      = $request->pack;
        $packCreate->subcategory_id = 0;//$request->item;
        $packCreate->price          = $request->price;
        // $packCreate->status         = 0;
        if($packCreate->save())
        {
            return redirect('admin/pack')->with('success','Pack updated successfullly !!!');
        }else{
             return redirect('admin/pack')->with('success','Pack cannot updated try again !!!!');
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
        $pack = Pack::find($id);
        $pack->is_deleted = 1;
        $pack->save();
        Subcategory_pack::where('pack_id',$id)->update(['is_deleted'=>1]);

        return redirect()->back()->with('success','Subcategory has been deleted successfully');
    }



    public function status(Request $request)
    {
       $pack = Pack::find($request->pack_id);
       $pack->status = $request->status;
       if($pack->save())
       {
        return redirect()->back()->with('success','Status has been changed!');
       }

        return redirect()->back()->with('failed','Status cannot change ,try again!!');

    }
}
