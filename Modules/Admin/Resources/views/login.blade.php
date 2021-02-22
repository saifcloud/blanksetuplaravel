<!doctype html>
<html lang="en">


<!-- Mirrored from www.wrraptheme.com/templates/hexabit/html/light/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Feb 2020 07:22:40 GMT -->
<head>
<title>:: Dynamate :: Admin</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="HexaBit Bootstrap 4x Admin Template">
<meta name="author" content="WrapTheme, www.thememakker.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<!--<link rel="stylesheet" href="http://www.wrraptheme.com/templates/hexabit/html/assets/vendor/bootstrap/css/bootstrap.min.css">-->
<link rel="stylesheet" href="{{ url('public/admin_assets/css/bootstrap.min.css')}}">

<!-- <link rel="stylesheet" href="http://www.wrraptheme.com/templates/hexabit/html/assets/vendor/font-awesome/css/font-awesome.min.css"> -->
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="{{ URL::asset('public/admin_assets/css/main.css')}}">
<link rel="stylesheet" href="{{ URL::asset('public/admin_assets/css/color_skins.css')}}">


<style>

.theme-orange .auth-main:before {
    background: transparent;
}

.card .header {padding: 20px 0 0;}

</style>


</head>

<body class="theme-orange">
    <!-- WRAPPER -->
    <div id="wrapper" class="auth-main">
        <div class="container">
            <div class="row clearfix">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <div class="login-logo">
                        <!-- <img src="" alt="logo">  -->
                    </div>
                    <div class="card">
                        <div class="header">
                            <h5 class="text-center" style="font-weight: 700;">Login</h5>
                        </div>
                        <div class="body">
                             @if(Session()->has('failed'))
                            <div class="alert alert-danger">
                               
                                {{ Session()->get('failed')}}
                                
                            </div>
                            @endif
                            <form class="form-auth-small" method="post" action="{{ url('admin/login-post')}}">

                                @csrf
                                <div class="form-group">
                                    <!-- <label  class="control-label">Email</label> -->
                                    <input type="text" class="form-control" id="email"  name="email" placeholder="Email">
                                    @if($errors->has('email'))
                                   <span class="text-danger">{{ $errors->first('email')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <!-- <label for="signin-password" class="control-label">Password</label> -->
                                    <input type="password" class="form-control" id="signin-password" name="password" value="" placeholder="Password">
                                    @if($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password')}}</span>
                                    @endif
                                </div>
                                <div class="form-group clearfix">
                                    <label class="fancy-checkbox element-left">
                                        <input type="checkbox">
                                        <span>Remember me</span>
                                    </label>								
                                </div>
                                <!-- <a href="index.html"> -->
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                                <!-- </a> -->
                                <div class="bottom">
                                  <!--   <span class="helper-text m-b-10"><i class="fa fa-lock"></i><a href="page-forgot-password.html" style="font-weight: 700;"> &nbsp; Forgot password ?</a></span> -->
                                   <!--  <span>Don't have an account? <a href="page-register.html">Register</a></span> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4"></div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->
  
<script src="{{ URL::asset('public/admin_assets/bundles/libscripts.bundle.js')}}"></script>    
<script src="{{ URL::asset('public/admin_assets/bundles/vendorscripts.bundle.js')}}"></script>

<script src="{{ URL::asset('public/admin_assets/bundles/mainscripts.bundle.js')}}"></script>
</body>

<!-- Mirrored from www.wrraptheme.com/templates/hexabit/html/light/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Feb 2020 07:22:40 GMT -->
</html>
