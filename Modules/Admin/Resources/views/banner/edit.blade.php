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
                            <form id="basic-form" method="post" action="{{ url('admin/update-banner')}}" enctype="multipart/form-data" >
                             @csrf
                                <input type="hidden" name="banner_id" value="{{ base64_encode($banner->id)}}">
                                
                                
                                
                             <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" autocomplete="off" value="{{ $banner->title}}">
                                     @if($errors->has('title'))
                                    <p class="text-danger">*{{ $errors->first('title')}}</p>
                                    @endif
                                </div>
                              <!--    <div class="form-group">
                                    <label>Category Image</label>
                                    <input type="file" class="form-control" name="category_image" autocomplete="off">
                                     @if($errors->has('category_image'))
                                    <p class="text-danger">*{{ $errors->first('category_image')}}</p>
                                    @endif
                                </div> -->
                                
                                <textarea name="description" class="form-control">
                                    {!!   $banner->description !!}
                                </textarea>
                                 
                                 
                                 <div class="form-group">
                                    <label> Image</label>
                                    <input type="file" class="form-control" name="image" autocomplete="off">
                                     @if($errors->has('image'))
                                    <p class="text-danger">*{{ $errors->first('image')}}</p>
                                    @endif
                                    
                                    
                                     <input type="hidden" name="old_image" value="{{ $banner->image }}">
                                </div>
                               
                               
                                <div class="form-group col-md-12">
                                   <img src="{{ $banner->image}}" width="200" height="200">
                                  <!--  <a><i class="fa fa-trash"  style="color: red; font-size: 24px;" aria-hidden="true"></i></a> -->
                                </div>
                                
                                
                               
                                <br>
                                 <br>
                                  <br>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
</div>



@endsection
