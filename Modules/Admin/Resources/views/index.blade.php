@extends('admin::layouts.master')
@section('content')
@include('admin::partials.sidebar');
    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2 class="font700">Dashboard</h2>
                </div>            
               <!--  <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                    <a href="javascript:void(0);" class="btn btn-sm btn-primary" title="">Create New</a>
                </div> -->
            </div>
        </div>

        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-12">
                    <div class="top_report">
                        <div class="row clearfix">

                           
                             <div class="col-lg-4 col-md-4 col-sm-4">
                                <a href="{{ url('admin/client')}}">
                                <div class="card">
                                    <div class="clearfix">
                                       
                                        <div class="number text-center">
                                            <h5>Clients</h5>
                                            <span class="font700">{{ isset($client) ? $client:0 }}</span>
                                            <p>TOTAL</p>
                                        </div>
                                    </div>
                                    <div class="status text-center">
                                        <!--<span>0 Pending</span>|<span>0 Confirmed</span>-->
                                    </div>
                                    <!--<div class="progress progress-xs progress-transparent custom-color-blue mb-0 mt-3">-->
                                    <!--    <div class="progress-bar" data-transitiongoal="100"></div>-->
                                    <!--</div>-->
                                    <!-- <small class="text-muted">19% compared to last week</small> -->
                                </div>
                                </a>
                            </div>
                            

                           


                          


                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <a href="{{ url('admin/product')}}">
                                <div class="card">
                                    <div class="clearfix">
                                       
                                        <div class="number text-center">
                                            <h5>Products</h5>
                                            <span class="font700">{{ isset($product) ? $product:0 }}</span>
                                            <p>TOTAL</p></span>
                                           
                                        </div>
                                    </div>
                                    <div class="status text-center">
                                        <!--<span>0 Pending</span>|<span>0 Confirmed</span>-->
                                    </div>
                                    <!--<div class="progress progress-xs progress-transparent custom-color-blue mb-0 mt-3">-->
                                    <!--    <div class="progress-bar" data-transitiongoal="100"></div>-->
                                    <!--</div>-->
                                    <!-- <small class="text-muted">19% compared to last week</small> -->
                                </div>
                                </a>
                            </div>
                            
                             <div class="col-lg-4 col-md-4 col-sm-4">
                                <a href="{{ url('admin/order')}}">
                                <div class="card">
                                    <div class="clearfix">
                                       
                                        <div class="number text-center">
                                            <h5>Orders</h5>
                                            <span class="font700">{{ isset($order) ? $order:0 }}</span>
                                            <p>TOTAL</p></span>
                                           
                                        </div>
                                    </div>
                                    <div class="status text-center">
                                        <!--<span>0 Pending</span>|<span>0 Confirmed</span>-->
                                    </div>
                                    <!--<div class="progress progress-xs progress-transparent custom-color-blue mb-0 mt-3">-->
                                    <!--    <div class="progress-bar" data-transitiongoal="100"></div>-->
                                    <!--</div>-->
                                    <!-- <small class="text-muted">19% compared to last week</small> -->
                                </div>
                                </a>
                            </div>
                           
                           
                           <!--  <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="clearfix">
                                       
                                        <div class="number text-center">
                                            <h6>Likes</h6>
                                            <span class="font700">21,215</span>
                                            <p>TOTAL</p>
                                        </div>
                                    </div>
                                     <div class="status text-center">
                                        <span>5 Pending</span>|<span>39 Confirmed</span>
                                    </div> -->
                                    <!--<div class="progress progress-xs progress-transparent custom-color-yellow mb-0 mt-3">-->
                                    <!--    <div class="progress-bar" data-transitiongoal="100"></div>-->
                                    <!--</div>-->
                                   <!--  <small class="text-muted">19% compared to last week</small> -->
                              <!--   </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
</div>



@endsection
