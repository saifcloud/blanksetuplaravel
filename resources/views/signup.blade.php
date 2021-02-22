<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Phresh Farms</title>
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

        <div class="login_left signup_left">

            <div class="login_left_Cont">
                <h4>It’s time to</h4>
                <h3 style="font-size: 32px; letter-spacing: 0.5px;">create wealth &<br>
                    add value</h3>
            </div>

        </div>

        <div class="login_right">
           
            <div class="login_right_cont">
                <form action="{{ url('signup-post') }}" method="POST">
                    @csrf
                    <h3 class="sign_h3">Sign <span>up</span></h3>

                    <div class="form-group">
                        <label for="">Title</label>
                        <select name="title" id="title" class="form-control">
                            <option value="" selected disabled>select title</option>
                            <option value="1">Ms</option>
                            <option value="2">Mr</option>
                            <option value="3">Mrs</option>
                        </select>
                          <span>{{ $errors->first('title')}}</span>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Full Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Full Name" value="{{old('name')}}">
                        <span>{{ $errors->first('name')}}</span>
                    </div>

                    <div class="form-group">
                        <label for="">Phone Number</label>
                        <input type="number" name="number" class="form-control" placeholder="Enter Your Phone Number">
                          <span>{{ $errors->first('number')}}</span>
                    </div>

                    <div class="form-group">
                        <label for="">E-mail</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter E-mail">
                          <span>{{ $errors->first('email')}}</span>
                    </div>

                    <div class="form-group">
                        <label for="">Date of Birth</label>
                        <input type="date" name="dob" class="form-control" placeholder="Enter Your DOB">
                          <span>{{ $errors->first('dob')}}</span>
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                          <span>{{ $errors->first('password')}}</span>
                    </div>

                    <div class="form-group">
                        <label for="">Referral Code (if any)</label>
                        <input type="text" name="code" class="form-control" placeholder="Enter Referral code">
                    </div>
    
                    <div class="form-group">
                        <!-- <a href="index.html"> -->
                            <button type="submit" class="pf_btn" style="background: #8dc63f; color: #fff; border-color: #8dc63f; border: none;">Sign Up</button>
                        <!-- </a> -->
                    </div>
    
    
                    <div class="account_Area sign_Area">
                        <span>Have an account already ? <a href="{{ url('agent/login')}}">Sign in</a></span>
                    </div>
    
                </form>
            </div>

        </div>

    </div>

    <!-- //////// Sidebar Animation wrapper /////////// -->

    <div class="side_animation_wrapper moved" id="sideout">
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
        
    </div>
    
</body>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
	<script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    

    
    
</html>