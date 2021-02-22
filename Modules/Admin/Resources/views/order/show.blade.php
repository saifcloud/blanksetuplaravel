@extends('admin::layouts.master')
@section('content')
@include('admin::partials.sidebar');
   <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>{{ $page_title }}</h2>
                </div>            
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Category</li>
                        <li class="breadcrumb-item active">{{ $page_title }}</li>
                    </ul>
                    <!-- <a href="javascript:void(0);" class="btn btn-sm btn-primary" title="">Create New</a> -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            
            <div class="row clearfix">
                <div class="col-md-6">
                  <table class="table">
                      <tr>
                          <th>ORDER ID</th>
                          <td>{{ $order->order_id }}</td>
                     </tr>
                     
                      <tr>
                          <th>USERNAME</th>
                          <td>{{ $order->user->username }}</td>
                     </tr>
                     
                     
                      <tr>
                          <th>FULLNAME</th>
                          <td>{{ $order->user->fullname}}</td>
                     </tr>
                     
                     
                      <tr>
                          <th>SITE ADDRESS</th>
                          <td>{{ $order->site_location }}</td>
                     </tr>
                     
                       <tr>
                          <th>ORDER DATE</th>
                          <td>{!! $order->createdAt !!}</td>
                     </tr>
                     
                      <tr>
                          <th>EXPECTED RECEIVING DATE</th>
                          <td>{{ $order->expected_receiving_date}}</td>
                     </tr>
                     
                     <!-- <tr>-->
                     <!--     <th>EXPECTED RECEIVING DATE</th>-->
                     <!--     <td>{{ $order->expected_receiving_date}}</td>-->
                     <!--</tr>-->
                     
                     
                  </table>
                </div>
            </div>
            
        </div>
    </div>
    
</div>



@endsection
