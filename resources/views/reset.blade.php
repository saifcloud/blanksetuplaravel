

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PhreshFarm</title>
        <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/custom.css">
        <link rel="stylesheet" href="assets/css/flaticon.css">
        <link rel="stylesheet" href="assets/css/plugin.css"> -->

         <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('public/assets/css/style.css')}}">
        <link rel="stylesheet" href="{{ asset('public/assets/css/custom.css')}}">
        <link rel="stylesheet" href="{{ asset('public/assets/css/flaticon.css')}}">
        <link rel="stylesheet" href="{{ asset('public/assets/css/plugin.css')}}">
        <!-- Plugin css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
<body>

    <div class="login_wrapper">

        <div class="mainmenu-area topbar_area_pf" style="padding: 15px 0; background: transparent; border: none;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">                 
                        <nav class="navbar navbar-expand-lg navbar-light">

                            <div class="nav-item" id="toggler_pf">
                                <span class="bars_pf"><i class="fa fa-bars" aria-hidden="true"></i></span>
                            </div>
                            
                            <a class="navbar-brand" href="login.html">
                                <h3>
                                    <img src="assets/images/phreshfarm_img/white-logo.png" alt="">
                                 </h3>
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_menu" aria-controls="main_menu" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                           
                               
                           
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="login_left">
           
            <div class="login_left_Cont">
                <h4>Welcome back to</h4>
                <h3>limitless opportunities</h3>
            </div>

        </div>

        <div class="login_right forget-right">
           
            <div class="login_right_cont">
                <div class="alert alert-success">
                    {{ Session()->get('success')}}
                </div>

                @endif


                 @if(Session()->has('failed'))
                <div class="alert alert-danger">
                    {{ Session()->get('failed')}}
                </div>

                @endif
                <form action="{{ url('reset-forget-password-agent')}}" method="post">
                    @csrf
                    <h3>Reset <span>Password</span></h3>
                    

                    <div class="form-group">
                        <label for="">The password reset code would be sent to your email.</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter E-mail" autocomplete="off" value="{{ $email }}">
                         <div class="text-danger" >{{ $errors->first('email')}}</div>
                    </div>

                      <div class="form-group">
                        <label>Code</label>
                        <input type="text" name="code" class="form-control" placeholder="Enter E-mail" autocomplete="off" >
                         <div class="text-danger" >{{ $errors->first('code')}}</div>
                    </div>

                     <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="new_password" class="form-control"  autocomplete="off" >
                         <div class="text-danger" >{{ $errors->first('new_password')}}</div>
                    </div>


                      <!--  <div>
                        <div class="lengend-action-buttons lengend-action-buttons-first">
                        <label for="d3_graph_chart0011day">
                        <input type="radio" name="user_type" id="d3_graph_chart0011day" value="1" {{ old('user_type')==1 ? "checked":""}}>
                        <span>Agent</span>
                        </label>
                        </div>
                        
                        <div class="lengend-action-buttons lengend-action-buttons-first" style="margin-left: 10px;">
                        <label for="d3_graph_chart0017day">
                        <input type="radio" name="user_type" id="d3_graph_chart0017day" value="2" {{ old('user_type')==2 ? "checked":""}}>
                        <span>Investor</span>
                        </label>
                            
                        </div>
                       <div class="text-danger" >{{ $errors->first('user_type')}}</div>
                    </div> -->
                    <br>
    
                    <div class="form-group">
                        <!-- <a href="index.html"> -->
                            <button type="submit" class="pf_btn" style="background: #8dc63f; color: #fff; border-color: #8dc63f; border: none;">Reset password</button>
                        <!-- </a> -->
                    </div>
    
                    <div class="forget_Area">
                        <a href="{{ url('agent/login')}}"> just remembered ?</a>
                    </div>
    
                    <!-- <div class="account_Area">
                        <span>Don't have an account ? <a href="{{ url('signup')}}">Sign up</a></span>
                    </div> -->

                    <div class="account_Area">
                        <!-- <span>Don't have an Agent account ? <a href="{{ url('agent')}}">Sign up</a></span> -->

                       
                     <!-- <div>Don't have an Agent account ? <a href="{{ url('agent')}}">Sign up</a></div> -->

                       
                    <!-- </div>
                    <div class="account_Area"> -->
                        <!-- <div>Don't have an Investor account ? <a href="{{ url('investor')}}">Sign up</a></div> -->
                     

                       
                    </div>
    
                </form>
            </div>

        </div>

    </div>

    <!-- //////// Sidebar Animation wrapper /////////// -->

   <!--  <div class="side_animation_wrapper moved" id="sideout">
        <div class="sidemenu_cancel">
            <a href="#">
                <img src="assets/images/phreshfarm_img/cancel.png" alt="">
            </a>
        </div>
        <div class="side_menu_list">
            <ul>
                <li>
                    <a href="#">Home</a>
                    <span class="rj"></span>
                </li>
                <li>
                    <a href="#">About</a>
                    <span class="rj"></span>
                </li>
                <li>
                    <a href="#">Why Phresh Farm</a>
                    <span class="rj"></span>
                </li>
                <li>
                    <a href="#">investments</a>
                    <span class="rj"></span>
                </li>
                <li>
                    <a href="#">faq</a>
                    <span class="rj"></span>
                </li>
                <li>
                    <a href="#">help desk</a>
                    <span class="rj"></span>
                </li>
            </ul>
        </div>
            <div class="bottom_side_info">
                <ul>
                    <li>
                        <a href="#">123-456-789-0</a>
                    </li>
                    <li>
                        <a href="#">123-456-789-0</a>
                    </li>
                    <li>
                        <a href="#">123-456-789-0</a>
                    </li>
                    <li>
                        <a href="#">info@phreshfarm.com</a>
                    </li>
                </ul>
            </div>
            <div class="side_pf_copyright">
                <p>© 2020 Phresh Farm. All Rights Reserved</p>
            </div>
        
    </div> -->
         @include('partials.sidebar_menu')
    
</body>
 <!--    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/custom.js"></script> -->
  <script src="{{ asset('public/assets/js/jquery.js') }}"></script>
   <script src="{{ asset('public/assets/js/bootstrap.min.js') }}"></script>
  
    <script src="{{ asset('public/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/custom.js') }}"></script>
</html>