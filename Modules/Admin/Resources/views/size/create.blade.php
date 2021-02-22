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
                             
                         <form id="basic-form" method="post" action="{{ url('admin/store-size')}}" enctype="multipart/form-data" >
                             @csrf
                                
                                <div class="form-group">
                                    <label>Size</label>
                                    <div class="row">
                                        <div class="col-sm-2 width">
                                              Width:<input type="number" class="form-control" name="width" autocomplete="off" value="{{ old('width')}}">
                                              @if($errors->has('width'))
                                            <p class="text-danger">*{{ $errors->first('width')}}</p>
                                         @endif
                                        </div>
                                       
                                         x    
                                        
                                        <div class=" col-sm-2 height">
                                              Height: <input type="number" class="form-control" name="height" autocomplete="off" value="{{ old('height')}}">
                                              @if($errors->has('height'))
                                               <p class="text-danger">*{{ $errors->first('height')}}</p>
                                               @endif
                                        </div>
                                         
                                        
                                    </div>
                                     @if(Session()->has('failed'))
                                     <!--<div class="alert alert-success">-->
                                         <p class="text-danger">{{ Session()->get('failed')}}</p>
                                     <!--</div>-->
                                   @endif
                                     
                                  
                                  
                                   
                                </div>
                              <!--    <div class="form-group">
                                    <label>Category Image</label>
                                    <input type="file" class="form-control" name="category_image" autocomplete="off">
                                     @if($errors->has('category_image'))
                                    <p class="text-danger">*{{ $errors->first('category_image')}}</p>
                                    @endif
                                </div> -->


                               
                               
                                
                                
                               
                                <br>
                                <button type="submit" class="btn btn-primary">Add Size</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
</div>



@endsection
