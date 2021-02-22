@extends('admin::layouts.master')
@section('content')
@include('admin::partials.sidebar')

<style type="text/css"></style>
    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>{{ $page_title}}</h2>
                </div>            
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">{{ $page_title}}</li>
                    </ul>
                    <a href="{{ url('admin/create-size')}}" class="btn btn-sm btn-primary" title="">Create New</a>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!--  @if(Session()->has('success'))
             <div class="alert alert-success">
                 <p>{{ Session()->get('success')}}</p>
             </div>
             @endif -->

              @if(Session()->has('success'))
             <div class="alert alert-success">
                 <h5 class="text-center">{{ Session()->get('success')}}</h5>
             </div>
             @endif
            <div class="table-responsive">
             <table class="table table-bordered table-hover table-striped data-table-size" cellspacing="0">
                    <thead>
                        <tr>
                         <th width="5%">No</th>
                         <th>Size Name</th>
                         <th>Created At</th>
                         <th width="15%">Action</th>
                          </tr>
                    </thead>
                  
                    <tbody>
                    </tbody>
                </table>
           </div>

        </div>
    </div>
    





@endsection
