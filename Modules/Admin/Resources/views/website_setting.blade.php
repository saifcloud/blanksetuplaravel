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
            
               <form class="form-auth-small col-6 " action="{{ url('admin/website-post')}}" method="post" enctype="multipart/form-data">
                @csrf
               

                              <div class="form-group">
                                    <label for="signin-email" class="control-label">Website Email</label>
                                    <input type="text" class="form-control" id="website_email" name="website_email" value="{{ $website_email->field_value}}" autocomplete="off" >
                                    @if($errors->has('website_email'))
                                    <span class="text-danger">{{ $errors->first('website_email')}}</span>
                                    @endif
                                </div>

                                 

                                <div class="form-group">
                                    <label for="signin-email" class="control-label">Contact </label>
                                      <input type="text" class="form-control" id="contact" name="contact" value="{{ $contact->field_value}}" autocomplete="off">
                                    @if($errors->has('contact'))
                                    <span class="text-danger">{{ $errors->first('contact')}}</span>
                                    @endif
                                </div>
                                
                                
                                
                                <div class="form-group">
                                      <textarea class="form-control" name="address" id="description">
                                    {{ $address->field_value}}
                                      </textarea>
                                </div>
                                
                                
                              

                                <!-- <div class="form-group">-->
                                <!--    <label for="signin-email" class="control-label">Contact 2</label>-->
                                <!--      <input type="text" class="form-control" id="contact_2" name="contact_2" value="" autocomplete="off">-->
                                <!--    @if($errors->has('contact_2'))-->
                                <!--    <span class="text-danger">{{ $errors->first('contact_2')}}</span>-->
                                <!--    @endif-->
                                <!--</div>-->


                                <!--<div class="form-group">-->
                                <!--    <label for="signin-email" class="control-label">Contact 3</label>-->
                                <!--      <input type="text" class="form-control" id="contact_3" name="contact_3" value="" autocomplete="off">-->
                                <!--    @if($errors->has('contact_3'))-->
                                <!--    <span class="text-danger">{{ $errors->first('contact_3')}}</span>-->
                                <!--    @endif-->
                                <!--</div>-->


                                <!-- <div class="form-group">-->
                                <!--    <label for="signin-email" class="control-label">Website Logo</label>-->
                                <!--    <input type="file" class="form-control" id="webiste_logo" name="website_logo"  accept="image/x-png,image/gif,image/jpeg" >-->
                                <!--    @if($errors->has('webiste_logo'))-->
                                <!--    <span class="text-danger">{{ $errors->first('webiste_logo')}}</span>-->
                                <!--    @endif-->
                                <!--</div>-->
                                <!-- <input type="hidden" name=""> -->
                                <!--<div><img src="{{ URL::asset('public/assets/images/phreshfarm_img/')}}" style="width: 180px; height: 51px;"></div>-->
                               
                                <br>
                                <!-- <br> -->
                                <button type="submit" class="btn btn-primary ">Save changes</button>
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

