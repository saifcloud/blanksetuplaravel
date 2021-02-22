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
            
               <form class="form-auth-small col-6 " action="{{ url('admin/social-post')}}" method="post" enctype="multipart/form-data">
                @csrf
               

                              <div class="form-group">
                                    <label for="signin-email" class="control-label">linkedin URL</label>
                                    <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ $linkedin->field_value}}" autocomplete="off" >
                                    @if($errors->has('linkedin'))
                                    <span class="text-danger">{{ $errors->first('linkedin')}}</span>
                                    @endif
                                </div>
                                
                                
                                     <div class="form-group">
                                    <label for="signin-email" class="control-label">Instagram URL</label>
                                    <input type="text" class="form-control" id="instagram" name="instagram" value="{{ $instagram->field_value}}" autocomplete="off" >
                                    @if($errors->has('instagram'))
                                    <span class="text-danger">{{ $errors->first('instagram')}}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="signin-email" class="control-label">facebook URL</label>
                                      <input type="text" class="form-control" id="facebook" name="facebook" value="{{ $facebook->field_value}}" autocomplete="off">
                                    @if($errors->has('facebook'))
                                    <span class="text-danger">{{ $errors->first('facebook')}}</span>
                                    @endif
                                </div>

                                 <div class="form-group">
                                    <label for="signin-email" class="control-label">Twitter URL</label>
                                      <input type="text" class="form-control" id="tweeter" name="tweeter" value="{{ $twitter->field_value}}" autocomplete="off">
                                    @if($errors->has('twitter'))
                                    <span class="text-danger">{{ $errors->first('twitter')}}</span>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <label for="signin-email" class="control-label">whatsapp URL</label>
                                      <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ $whatsapp->field_value}}" autocomplete="off">
                                    @if($errors->has('whatsapp'))
                                    <span class="text-danger">{{ $errors->first('whatsapp')}}</span>
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

