@extends('admin::layouts.master')
@section('content')
@include('admin::partials.sidebar')

<style type="text/css"></style>
    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>{{ $page_title }}</h2>
                </div>            
              <!--   <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">{{ $page_title }}</li>
                    </ul>
                    <a href="{{ url('admin/create-investor')}}" class="btn btn-sm btn-primary" title="">Create New Investor</a>
                </div> -->
            </div>
        </div>

        <div class="container-fluid">
            
            <!--  @if(Session()->has('success'))

             <div class="alert alert-success">
                 <button type="button" class="close" data-dismiss="alert">×</button>
                 <p>{{ Session()->get('success')}}</p>
             </div>
             @endif -->
              @if(Session()->has('success'))
             <div class="alert alert-success">
                 <h5 class="text-center">{{ Session()->get('success')}}</h5>
             </div>
             @endif

              <div class="col-lg-12 col-md-12 col-sm-12" id="notification_list">

               @if(count($notification) > 0)
               @foreach($notification as $row)
                    <a href="{{ url('admin/show-details-by-notification/'.$row->id)}}">
                        <div class="card" style="margin-top: -20px;">
                            <div class="clearfix">
                                 <div class="number m-2">
                                        <h5>{{ $row->user->name}} {{ $row->user->lastname}}</h5>
                                        <!-- <span class="font700">0</span> -->
                                        @if($row->status==0)
                                        <p style="color:#777;" class="font-weight-bold">{{ $row->message }}</p>
                                        <p style="color:#777;" class="font-weight-bold">{{ \Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</p>
                                        @else
                                        <p style="color:#777;" >{{ $row->message }}</p>
                                        <p style="color:#777;" >{{ \Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</p>
                                        @endif
                                </div>
                            </div>
                           <!--  <div class="status text-center">
                                <span> Pending</span>|<span> Confirmed</span>
                           </div> -->
                                   
                        </div>
                    </a>
                @endforeach

                 <p class="">{{ $notification->links() }} <p>
                  @else
                 <p>No Any Notification</p>
                 @endif
         </div>
                

        </div>
    </div>
    

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    
$(document).ready(function(){


// setInterval(function() {
//             // alert("ok");
//          getNotificationList();
//          }, 5000);



    function getNotificationList()
    {

        $.ajax({
                url:"{{ url('admin/show-all-notification')}}",
                type:"GET",
                success:function(response){
                console.log(response);
                $("#notification_list").html(response);
                }
        });
    }

});

    


</script>


@endsection
