@extends('admin::layouts.master')
@section('content')
@include('admin::partials.sidebar');
   <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>{{ $page_title }}</h2>
                </div>            
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}"><i class="icon-home"></i></a></li>
                        <!-- <li class="breadcrumb-item">Category</li> -->
                        <li class="breadcrumb-item active">{{ $page_title }}</li>
                    </ul>
                    <!-- <a href="javascript:void(0);" class="btn btn-sm btn-primary" title="">Create New</a> -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card row">
                        <div class="header">
                            <!-- <h2>Basic Validation</h2> -->
                        </div>
                        <div class="body col-md-8">
                             <form id="basic-form" method="post" action="{{ url('admin/update-product')}}" enctype="multipart/form-data" >
                             @csrf
                            <div class="row">
                                <input type="hidden" name="product_id" value="{{ base64_encode($product->id)}}">
                                
                              <!--<div class="form-group col-md-6">-->
                              <!--      <label>Product Name</label>-->
                              <!--      <input type="text" class="form-control" name="product_name" autocomplete="off" value="{{ $product->name }}">-->
                              <!--       @if($errors->has('product_name'))-->
                              <!--      <p class="text-danger">*{{ $errors->first('product_name')}}</p>-->
                              <!--      @endif-->
                              <!--  </div>-->
                                


                                 <div class="form-group col-md-6">
                                    <label>Category</label>
                                   <select name="category" class="form-control">
                                       <option value="">-select-</option>
                                       @if(count($category) > 0)
                                       @foreach($category as $key => $row)
                                       <option value="{{ $row->id }}" {{ ($product->category_id == $row->id) ? "selected":'' }}>-{{ $row->category_name }}</option>
                                       @endforeach
                                       @endif
                                   </select>
                                     @if($errors->has('category'))
                                    <p class="text-danger">*{{ $errors->first('category')}}</p>
                                    @endif
                                </div>
                                
                                   <div class="form-group col-md-6">
                                    <label>Size</label>
                                    <select name="size" class="form-control">
                                      <option>-select-</option>
                                     @if(count($size) > 0)
                                       @foreach($size as $key => $row)
                                       <option value="{{ $row->id }}" {{ ($product->product_size == $row->id) ? "selected":''}}>{{ $row->size_name }}</option>
                                       @endforeach
                                       @endif
                                    </select>
                                     @if($errors->has('size'))
                                    <p class="text-danger">*{{ $errors->first('size')}}</p>
                                    @endif
                                    
                                     @if(Session()->has('sizeerror'))
                                 
                                    <p class="text-danger">*{{ Session()->get('sizeerror') }}</p>
                                   @endif
                                </div>
                                
                                
                                
                                

                              



                                <!-- <div class="form-group">-->
                                <!--    <label>Color</label>-->
                                <!--    <input type="text" class="form-control" name="color" autocomplete="off" value="{{  $product->color }}">-->
                                <!--     @if($errors->has('color'))-->
                                <!--    <p class="text-danger">*{{ $errors->first('color')}}</p>-->
                                <!--    @endif-->
                                <!--</div>-->

                                <!--  <div class="form-group">-->
                                <!--    <label>Material Type</label>-->
                                <!--    <input type="text" class="form-control" name="material_type" autocomplete="off" value="{{  $product->material_type }}">-->
                                <!--     @if($errors->has('material_type'))-->
                                <!--    <p class="text-danger">*{{ $errors->first('material_type')}}</p>-->
                                <!--    @endif-->
                                <!--</div>-->

                                <!-- <div class="form-group">-->
                                <!--    <label>Water Resistant</label>-->
                                <!--    <select name="water_resistant" class="form-control">-->
                                <!--        <option value="">-select-</option>-->
                                <!--        <option value="1" {{ $product->water_resistant==1 ? "selected":'' }}>-YES-</option>-->
                                <!--        <option value="0" {{ $product->water_resistant==0 ? "selected":'' }}>-NO-</option>-->
                                         
                                <!--    </select>-->
                                <!--     @if($errors->has('water_resistant'))-->
                                <!--    <p class="text-danger">*{{ $errors->first('water_resistant')}}</p>-->
                                <!--    @endif-->
                                <!--</div>-->


                                <!-- <div class="form-group col-md-6">-->
                                <!--    <label>Product Image</label>-->
                                <!--    <input type="file" class="form-control" name="product_image" autocomplete="off">-->
                                <!--    <input type="hidden" name="old_image" value="{{ $product->image }}">-->
                                <!--     @if($errors->has('product_image'))-->
                                <!--    <p class="text-danger">*{{ $errors->first('product_image')}}</p>-->
                                <!--    @endif-->
                                <!--</div>-->


                                <!--<div class="form-group col-md-12">-->
                                <!--   <img src="{{ url('/').$product->image}}" width="200" height="200">-->
                                  <!--  <a><i class="fa fa-trash"  style="color: red; font-size: 24px;" aria-hidden="true"></i></a> -->
                                <!--</div>-->

                                 <div class="form-group col-md-12">
                                <textarea name="description"  class="form-control">
                                    {!! $product->description !!}
                                </textarea>
                                <button type="submit" class="btn btn-primary mt-3">Edit product</button>
                                  </div>
 
                               
                                
                                
                               
                                <br>
                                 <br>
                                  <br>

                               
                            </div>
                           
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
</div>



@endsection
