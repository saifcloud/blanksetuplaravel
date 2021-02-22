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
            
               <form class="form-auth-small col-6 " action="{{ url('admin/mail-post')}}" method="post" enctype="multipart/form-data">
                @csrf
               
                             
                                <div class="form-group">
                                    <label for="signin-email" class="control-label">SMTP HOST</label>
                                      <input type="text" class="form-control" id="facebook" name="HOST" value="{{ $mail_host->field_value}}" autocomplete="off">
                                    @if($errors->has('facebook'))
                                    <span class="text-danger">{{ $errors->first('HOST')}}</span>
                                    @endif
                                </div>
                                
                              <div class="form-group">
                                    <label for="signin-email" class="control-label">MAIL USERNAME</label>
                                    <input type="text" class="form-control" id="linkedin" name="MAIL_USERNAME" value="{{ $mail_user->field_value}}" autocomplete="off" >
                                    @if($errors->has('linkedin'))
                                    <span class="text-danger">{{ $errors->first('MAIL_USERNAME')}}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="signin-email" class="control-label">MAIL PASSWORD</label>
                                      <input type="password" class="form-control" id="facebook" name="MAIL_PASSWORD" value="{{ $mail_pass->field_value}}" autocomplete="off">
                                    @if($errors->has('facebook'))
                                    <span class="text-danger">{{ $errors->first('MAIL_PASSWORD')}}</span>
                                    @endif
                                </div>

                              
                               
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

