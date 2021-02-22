@extends('admin::layouts.master')
@section('content')
@include('admin::partials.sidebar')
<div id="main-content">
          <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>{{ $page_title }}</h2>
                </div>            
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}"><i class="icon-home"></i></a></li>
                        <!-- <li class="breadcrumb-item active">Dashboard</li> -->
                    </ul>
                 <!--   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addAccount" id="addUserAccount">Add Account</button> -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
             @if(Session()->has('success'))
             <div class="alert alert-success col-6">{{ Session()->get('success')}}</div>
            @endif
            
               <form class="form-auth-small col-6 " action="{{ url('admin/profile-post')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $admin->id }}">

                              <!--<div class="form-group">-->
                              <!--      <label for="signin-email" class="control-label">Username</label>-->
                              <!--      <input type="text" class="form-control" id="username" name="username" value="{{ $admin->username}}" readonly="">-->
                              <!--      @if($errors->has('username'))-->
                              <!--      <span class="text-danger">{{ $errors->first('username')}}</span>-->
                              <!--      @endif-->
                              <!--  </div>-->



                             <div class="form-group">
                                    <label for="signin-email" class="control-label">First Name</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $admin->firstname}}">
                                    @if($errors->has('firstname'))
                                    <span class="text-danger">{{ $errors->first('firstname')}}</span>
                                    @endif
                                </div>



                              <div class="form-group">
                                    <label for="signin-email" class="control-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $admin->lastname}}">
                                    @if($errors->has('lastname'))
                                    <span class="text-danger">{{ $errors->first('lastname')}}</span>
                                    @endif
                                </div>


                                 <div class="form-group">
                                    <label for="signin-email" class="control-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{ $admin->email}}" readonly="">
                                    @if($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email')}}</span>
                                    @endif
                                </div>
                                
                               
                                
                                
                                

                                <!-- <div class="form-group">
                                    <label for="signin-email" class="control-label">Upload image</label>
                                    <input type="file" class="form-control" id="change-password" name="change_image">
                                    @if($errors->has('change_image'))
                                    <span class="text-danger">{{ $errors->first('change_image')}}</span>
                                    @endif
                                </div>
                                <input type="hidden" name="old_image" value="{{ $admin->image}}">
                                <div><img src="{{ URL::asset('public/uploads/'.$admin->image)}}" style="width: 465px; height: 200px;"></div> -->
                                <br>
                               <!--  <br>
                                <br> -->
                                <button type="submit" class="btn btn-primary ">Change</button>
                            </form>
         
            
        </div>
    </div>





              


</div>
    


</body>
    

<!-- <script>
    $(function() {
        // validation needs name of the element
        $('#food').multiselect();

        // initialize after multiselect
        $('#basic-form').parsley();
    });
    </script> -->










@endsection

