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
                        <li class="breadcrumb-item">Category</li>
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
                            <form id="basic-form" method="post" action="{{ url('admin/update-category')}}" enctype="multipart/form-data" >
                             @csrf
                               @if(Session()->has('failed'))
                                 <div class="alert alert-success">
                                     <h5 class="text-center">{{ Session()->get('failed')}}</h5>
                                 </div>
                                 @endif
                                 
                                 
                                <input type="hidden" name="category_id" value="{{ $category->id}}">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" class="form-control" name="category_name" autocomplete="off" value="{{ $category->category_name }}">
                                     @if($errors->has('category_name'))
                                    <p class="text-danger">*{{ $errors->first('category_name')}}</p>
                                    @endif
                                    
                                      @if(Session()->has('exist'))
                                         
                                             <p class="text-danger">{{ Session()->get('exist')}}</p>
                                        
                                         @endif
                                </div>
                                
                                
                                  <div class="form-group">
                                    <label>Category Image</label>
                                    <input type="file" class="form-control" name="image" autocomplete="off">
                                     @if($errors->has('image'))
                                    <p class="text-danger">*{{ $errors->first('image')}}</p>
                                    @endif
                                    
                                    
                                </div> 
                                 <input type="hidden" name="old_image" value="{{ $category->image}}">

                                  <img src="{{ $category->image}}" style="height: 200px; width: 400px;"> 
                               
                               
                                 <!--<div class="form-group">-->
                                 <!--   <label>Category Image</label>-->
                                 <!--   <input type="file" class="form-control" name="category_image" autocomplete="off">-->
                                 <!--    @if($errors->has('category_image'))-->
                                 <!--   <p class="text-danger">*{{ $errors->first('category_image')}}</p>-->
                                 <!--   @endif-->
                                </div>
                                
                                
                               
                                <br>
                                 <br>
                                  <br>

                                <button type="submit" class="btn btn-primary">Update Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
</div>



@endsection
