@extends('admin::layouts.master')
@section('content')
@include('admin::partials.sidebar')

<!-- <div id="wrapper"> -->
  
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

            <div class="d-flex justify-content-center">
         
            
            
             <form class="form-auth-small col-6 " action="{{ url('admin/change-password-post')}}" method="POST">
                    @if(Session()->has('success'))
                     <div class="alert alert-success col-12">{{ Session()->get('success')}}</div>
                    @endif
                    
                      @if(Session()->has('failed'))
                     <div class="alert alert-danger col-12">{{ Session()->get('failed')}}</div>
                    @endif
            
                              @csrf           
                               <div class="form-group">
                    
                                    <label>Old Password</label>
                                    <input type="password" class="form-control" id="change-password" name="old_password">
                                    @if($errors->has('old_password'))
                                    <span class="text-danger">{{ $errors->first('old_password')}}</span>
                                    @endif
                                </div>
                                
                                
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" class="form-control" id="change-password" name="new_password">
                                    @if($errors->has('new_password'))
                                    <span class="text-danger">{{ $errors->first('new_password')}}</span>
                                    @endif
                                </div>
                                
                                
                                
                                
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" id="change-password" name="confirm_password">
                                    @if($errors->has('confirm_password'))
                                    <span class="text-danger">{{ $errors->first('confirm_password')}}</span>
                                    @endif
                                </div>
                                
                                
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Change Password</button>
                            </form>

                            </div>
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

