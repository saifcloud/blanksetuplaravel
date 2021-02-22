<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Phresh Farms</title>
    <link rel="stylesheet" href="{{ url('public/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ url('public/assets/css/custom.css') }}">
	<link rel="stylesheet" href="{{ url('public/assets/css/flaticon.css') }}">
	<link rel="stylesheet" href="{{ url('public/assets/css/plugin.css') }}">
	<!-- Plugin css -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	
	<div class="main_pf">
	
    <div class="mainmenu-area topbar_area_pf" style="padding: 15px 0">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">                 
					<nav class="navbar navbar-expand-lg navbar-light">
						<a class="navbar-brand" href="{{ url('investor/dashboard')}}">
							<h3>
								@if(isset($website_logo))
								  <img src="{{asset('public/assets/images/phreshfarm_img/'.$website_logo->field_value)}}" alt="">
								@else
                                 <img src="{{asset('public/assets/images/phreshfarm_img/Logo.png')}}" alt="">
								@endif
							 </h3>
						</a>
						
						<div class="collapse navbar-collapse fixed-height" id="main_menu">
							<ul class="navbar-nav ml-auto">
								<!-- <li class="nav-item pf_nav_item">
									<a href="register.php" class="base-btn2"> Sign up</a>
									<span>Welcome, Precious (PSU5910)</span> 
									<span>Welcome, Investor</span> 
									<span class="pf_dropdwn"><img src="" alt="">
										<i class="fa fa-angle-down" aria-hidden="true" data-toggle="dropdown"
										aria-haspopup="true"></i>
									</span>
									<div class="dropdown-menu pf-dropdown-menu">
									<a class="dropdown-item" href="{{ url('investor/dashboard')}}">Go to Homepage</a>
									<a class="dropdown-item" href="{{ url('investor/change-password')}}">Change Password</a>
									<a class="dropdown-item" href="{{ url('investor/logout')}}">Log out</a>
									</div>
								</li> -->
								
								<li class="nav-item" id="toggler_pf">
									<span class="bars_pf"><i class="fa fa-bars" aria-hidden="true"></i></span>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>