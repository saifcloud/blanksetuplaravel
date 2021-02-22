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
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">{{ $page_title}}</li>
                    </ul>
                    <a href="{{ url('admin/create-subcategory')}}" class="btn btn-sm btn-primary" title="">Create New</a>
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
             <table class="table table-bordered table-hover table-striped data-table-subcategory" cellspacing="0">
                    <thead>
                        <tr>
                         <th width="5%">No</th>
                         <th>Image</th>
                         <th>Item</th>
                         <th>Packs</th>
                         <th>Category</th>
                         <th>Duration</th>
                         <th>ROI</th>
                         <th>Description</th>
                         <th>Status</th>
                         <th>Date</th>
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
