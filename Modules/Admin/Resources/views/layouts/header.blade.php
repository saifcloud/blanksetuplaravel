<!doctype html>
<html lang="en">

<head>
<title>:: Admin :: Home</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<!-- <link rel="stylesheet" href="http://www.wrraptheme.com/templates/hexabit/html/assets/vendor/bootstrap/css/bootstrap.min.css"> -->


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="{{ url('public/admin_assets/css/bootstrap.min.css')}}">


<!-- <link rel="stylesheet" href="http://www.wrraptheme.com/templates/hexabit/html/assets/vendor/font-awesome/css/font-awesome.min.css"> -->

<!-- 
<link rel="stylesheet" href="http://www.wrraptheme.com/templates/hexabit/html/assets/vendor/charts-c3/plugin.css"/>
<link rel="stylesheet" href="http://www.wrraptheme.com/templates/hexabit/html/assets/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css">
<link rel="stylesheet" href="http://www.wrraptheme.com/templates/hexabit/html/assets/vendor/chartist/css/chartist.min.css">
<link rel="stylesheet" href="http://www.wrraptheme.com/templates/hexabit/html/assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
<link rel="stylesheet" href="http://www.wrraptheme.com/templates/hexabit/html/assets/vendor/toastr/toastr.min.css"> -->


<!-- <link rel="stylesheet" href="{{ url('public/admin_assets/css/dropify.min.css')}}"> -->

<!-- <link rel="stylesheet" href="{{ URL::asset('public/admin_assets/css/plugin.css')}}"/> -->

<!-- <link rel="stylesheet" href="{{ url('public/admin_assets/css/bootstrap-progressbar-3.3.4.min.css')}}"> -->

<link rel="stylesheet" href="{{ URL::asset('public/admin_assets/css/chartist.min.css')}}">

<link rel="stylesheet" href="{{ URL::asset('public/admin_assets/css/chartist-plugin-tooltip.css')}}">

<link rel="stylesheet" href="{{ URL::asset('public/admin_assets/css/toastr.min.css')}}">

<link rel="stylesheet" href="{{ URL::asset('public/admin_assets/css/sweetalert.css')}}"/>


<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" /> -->

<link rel="stylesheet" href="{{ URL::asset('public/admin_assets/css/datepicker.css')}}">


<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> -->

<!-- <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
 -->
<!-- MAIN CSS -->
<link rel="stylesheet" href="{{ URL::asset('public/admin_assets/css/main.css')}}">

<!-- <link rel="stylesheet" href="https://www.wrraptheme.com/templates/hexabit/html/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css"> -->

<link rel="stylesheet" href="{{ URL::asset('public/admin_assets/css/dataTables.bootstrap4.min.css')}}">

<!-- <link rel="stylesheet" href="https://www.wrraptheme.com/templates/hexabit/html/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css"> -->

<link rel="stylesheet" href="{{ URL::asset('public/admin_assets/css/dataTables.fixedcolumns.bootstrap4.min.css')}}">

<!-- <link rel="stylesheet" href="https://www.wrraptheme.com/templates/hexabit/html/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css"> -->


<link rel="stylesheet" href="{{ URL::asset('public/admin_assets/css/dataTables.fixedheader.bootstrap4.min.css')}}">
 


<link rel="stylesheet" href="{{URL::asset('public/admin_assets/css/color_skins.css')}}">

<style>
    .icon-menu:hover{color: #fff !important;}
    .navbar-nav .icon-menu {padding: 15px 10px;}
    .navbar-nav .icon-menu {font-size: 18px;}
    .theme-orange #left-sidebar .user-account .dropdown-menu { background: #feb800;}
    .theme-orange #left-sidebar .user-account .dropdown-menu a:hover {color: #e1fff6 !important;}
    .theme-orange #left-sidebar .user-account .dropdown-menu a:hover i {color: #e1fff6 !important;}
    .navbar-nav .icon-menu .notification-dot {background-color: #e1fff6;}
</style>
</head>
<body class="theme-orange">

<!-- Page Loader -->
<!-- <div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="http://www.wrraptheme.com/templates/hexabit/html/assets/images/icon-light.svg" width="48" height="48" alt="HexaBit"></div>
        <p>Please wait...</p>        
    </div>
</div> -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<div id="wrapper">

    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">

            <div class="navbar-left">
                <div class="navbar-btn">
                    <a href="javascript:void(0)" class="icon-menu btn-toggle-fullwidth" style="color: #fff !important; font-weight: 700;">Admin Area </a>
                    <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                    <!--<a href="{{ url('admin/dashboard')}}"><img src="http://www.wrraptheme.com/templates/hexabit/html/assets/images/icon-light.svg" alt="HexaBit Logo" class="img-fluid logo"></a>-->
                    <!--<button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>-->
                </div>
                
            </div>
            
            <div class="navbar-right">           

                <div id="navbar-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown dropdown-animated scale-left">
                            <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                <!-- <i class="fa fa-line-chart" aria-hidden="true"></i> -->
                                <!--<span class="notification-dot"></span>-->
                            </a>
                            <ul class="dropdown-menu right_chat email">
                               
                            </ul>
                        </li>
                        <li class="dropdown dropdown-animated scale-left" id="notification_bar">
                            <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                <!--<i class="fa fa-bell" aria-hidden="true"></i>-->
                                @if(isset($unseen) && $unseen > 0)
                                <span class="notification-dot"></span>
                                @endif
                            </a>
                            <ul class="dropdown-menu feeds_widget">
                                <li class="header">You have {{ isset($notification_count) ? $notification_count:0 }} new Notifications</li>


                                @if(isset($notification) && count($notification) > 0)
                                @foreach($notification as $row)
                                <li>
                                    <a href="{{ url('admin/show-details-by-notification/'.$row->id)}}">
                                        <div class="feeds-left"><i class="fa fa-thumbs-o-up text-success"></i></div>
                                        <div class="feeds-body ">
                                            <h4 class="title text-success">{{ $row->user->name }} {{ $row->user->lastname }}<small class="float-right text-muted">{{ \Carbon\Carbon::parse($row->created_at)->diffForHumans()}}</small></h4>
                                            @if($row->status==0)
                                            <small class="font-weight-bold">{{ $row->message }}</small>
                                            @else
                                            <small>{{ $row->message }}</small>
                                            @endif
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                                @else
                                <p>No Any Notification</p>
                                @endif
                              
                                <a href="{{ url('admin/show-all-notification')}}" style="color:#bf6b6b;">View All</a>
                            </ul>
                        </li>
                        <li><a href="{{ url('admin/logout')}}" class="icon-menu"><i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>