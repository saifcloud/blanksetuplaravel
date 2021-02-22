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
                    <div class="card">
                        <div class="header">
                            <!-- <h2>Basic Validation</h2> -->
                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" action="{{ url('admin/store-product')}}" enctype="multipart/form-data" >
                             @csrf
                                
                                <!--<div class="form-group">-->
                                <!--    <label>Product Name</label>-->
                                <!--    <input type="text" class="form-control" name="product_name" autocomplete="off" value="{{ old('product_name')}}">-->
                                <!--     @if($errors->has('product_name'))-->
                                <!--    <p class="text-danger">*{{ $errors->first('product_name')}}</p>-->
                                <!--    @endif-->
                                <!--</div>-->
                                


                                 <div class="form-group">
                                    <label>Category</label>
                                   <select name="category" class="form-control">
                                       <option value="">-select-</option>
                                       @if(count($category) > 0)
                                       @foreach($category as $key => $row)
                                       <option value="{{ $row->id }}" {{ old('category')== $row->id ? "selected":''}} >-{{ $row->category_name }}</option>
                                       @endforeach
                                       @endif
                                   </select>
                                     @if($errors->has('category'))
                                    <p class="text-danger">*{{ $errors->first('category')}}</p>
                                    @endif

                                </div>
                                
                                  <div class="form-group">
                                    <label>Size</label>
                                    
                                    <select name="size" class="form-control">
                                        
                                        <option>-select-</option>
                                        
                                 @if(count($size) > 0)
                                       @foreach($size as $key => $row)
                                       <option value="{{ $row->id }}"  {{ old('size')==$row->id ? "selected":""}} >{{ $row->size_name }}</option>
                                       @endforeach
                                       @endif
                                       
                                    </select>
                                    
                                    
                                     @if($errors->has('size'))
                                     {{ old('size')}}
                                    <p class="text-danger">*{{ $errors->first('size')}}</p>
                                     @endif
                                     
                                     
                                       @if(Session()->has('sizeerror'))
                                 
                                    <p class="text-danger">*{{ Session()->get('sizeerror') }}</p>
                                   @endif
                                </div>
                                
                                

                                <!-- <div class="form-group">-->
                                <!--    <label>Size</label>-->
                                <!--    <select name="size[]" class="form-control" multiple="">-->
                                <!--        <option>-select-</option>-->
                                <!--         @if(count($size) > 0)-->
                                <!--       @foreach($size as $key => $row)-->
                                <!--       <option value="{{ $row->id }}"  >-{{ $row->size_name }}</option>-->
                                <!--       @endforeach-->
                                <!--       @endif-->
                                <!--    </select>-->
                                <!--     @if($errors->has('size'))-->
                                <!--     {{ old('size')}}-->
                                <!--    <p class="text-danger">*{{ $errors->first('size')}}</p>-->
                                <!--    @endif-->
                                <!--</div>-->



                                <!-- <div class="form-group">-->
                                <!--    <label>Color</label>-->
                                <!--    <input type="text" class="form-control" name="color" autocomplete="off" value="{{ old('color')}}">-->
                                <!--     @if($errors->has('color'))-->
                                <!--    <p class="text-danger">*{{ $errors->first('color')}}</p>-->
                                <!--    @endif-->
                                <!--</div>-->

                                <!--  <div class="form-group">-->
                                <!--    <label>Material Type</label>-->
                                <!--    <input type="text" class="form-control" name="material_type" autocomplete="off" value="{{ old('material_type')}}">-->
                                <!--     @if($errors->has('material_type'))-->
                                <!--    <p class="text-danger">*{{ $errors->first('material_type')}}</p>-->
                                <!--    @endif-->
                                <!--</div>-->

                                <!-- <div class="form-group">-->
                                <!--    <label>Water Resistant</label>-->
                                <!--    <select name="water_resistant" class="form-control">-->
                                <!--        <option value="">-select-</option>-->
                                <!--        <option value="1" {{ old('water_resistant')=='1' ? "selected":''}}>-YES-</option>-->
                                <!--        <option value="0" {{ old('water_resistant')=='0' ? "selected":''}}>-NO-</option>-->
                                         
                                <!--    </select>-->
                                <!--     @if($errors->has('water_resistant'))-->
                                <!--    <p class="text-danger">*{{ $errors->first('water_resistant')}}</p>-->
                                <!--    @endif-->
                                <!--</div>-->


                                <!-- <div class="form-group">-->
                                <!--    <label>Product Image</label>-->
                                <!--    <input type="file" class="form-control" name="product_image" autocomplete="off">-->
                                <!--     @if($errors->has('product_image'))-->
                                <!--    <p class="text-danger">*{{ $errors->first('product_image')}}</p>-->
                                <!--    @endif-->
                                <!--</div>-->
                                
                                
                                  <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description"  class="form-control">
                                        {!! old('description')!!}
                                    </textarea>
                                     @if($errors->has('description'))
                                    <p class="text-danger">*{{ $errors->first('description')}}</p>
                                    @endif

                                </div>
                                
                             
                                 





                               
                               
                                
                                
                               
                                <br>
                                <button type="submit" class="btn btn-primary">Add product</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
</div>



@endsection
