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
                            <form id="basic-form" method="post" action="{{ url('admin/update-client')}}" enctype="multipart/form-data" >
                             @csrf

                            
                            
                            <div class="row">
                                
                             <div class="col-sm-6">
                            <input type="hidden" name="client_id" value="{{ base64_encode($client->id)}}">
                                
                           <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username" autocomplete="off" value="{{ $client->username }}" readonly="">
                                     @if($errors->has('username'))
                                    <p class="text-danger">*{{ $errors->first('username')}}</p>
                                    @endif
                                </div>




                                 <!-- <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" autocomplete="off" value="{{ old('password')}}">
                                     @if($errors->has('password'))
                                     <p class="text-danger">*{{ $errors->first('password')}}</p>
                                     @endif

                                     
                                </div>   -->

                             

                                  <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" autocomplete="off" value="{{ $client->email }}">
                                     @if($errors->has('email'))
                                    <p class="text-danger">*{{ $errors->first('email')}}</p>
                                    @endif
                                </div>
                                
                                
                                  <div class="form-group">
                                    <label>Profile Image</label>
                                    <input type="file" class="form-control" name="image" autocomplete="off">
                                    <input type="hidden" name="old_image" value="{{$client->image}}">
                                     @if($errors->has('profile_image'))
                                    <p class="text-danger">*{{ $errors->first('profile_image')}}</p>
                                    @endif
                                </div>
                                
                                
                                

                                <div class="form-group">
                                   <img src="{{ url('/').$client->image}}" width="200" height="200">
                                  <!--  <a><i class="fa fa-trash"  style="color: red; font-size: 24px;" aria-hidden="true"></i></a> -->
                                </div>
                                
                                
                                </div>
                                
                                
                                
                                
                                 <div class="col-sm-6">
                                     
                                     
                                     
                                     
                            <div class="form-group">
                                    <label>Fullname</label>
                                    <input type="text" class="form-control" name="fullname" autocomplete="off"value="{{ $client->fullname }}">
                                     @if($errors->has('fullname'))
                                    <p class="text-danger">*{{ $errors->first('fullname')}}</p>
                                    @endif
                                </div>

                                  <div class="form-group">
                                    <label>Phone</label>
                                    <input type="number" class="form-control" name="phone" autocomplete="off" value="{{ $client->phone }}">
                                     @if($errors->has('phone'))
                                    <p class="text-danger">*{{ $errors->first('phone')}}</p>
                                    @endif
                                </div>

                               


                               
                                
                                
                                </div>
                                
                                
                                
                                
                                </div>


                               
                                
                                
                               
                                <br>
                                 <br>
                                  <br>

                                <button type="submit" class="btn btn-primary">Update Client</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
</div>



@endsection
