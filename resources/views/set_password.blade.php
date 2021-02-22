@extends('layouts.default')
@section('content')


	<!-- ////////////// page content wrapper ///////////// -->

	<div id="wrapper" class="pf_wrapper">
		<div class="page-content-wrapper">
		<section class="content-area">
		   <div class="container">
              

              <div class="change-password" style="margin: 120px;  ">
			   <div class="col-lg-6">
			   	@if(Session()->has('success'))
			   	<div class="alert alert-success">
			   		<div>
			   			{{ Session()->get('success')}}
			   		</div>
			   	</div>
			   	@endif

			   	@if(Session()->has('failed'))
			   	<div class="alert alert-danger">
			   		<div>
			   			{{ Session()->get('failed')}}
			   		</div>
			   	</div>
			   	@endif
							<h3>Enter New Password</h3>
							<form method="post" action="{{ url('user-reset-password')}}">
                            @csrf
								<input type="hidden" name="id" value="{{ $user->id}}">
								<input type="hidden" name="user_type" value="{{ $user->role}}">

							<!-- <div class="form-group">
								<label for="">Old Password</label>
								<input type="password" class="form-control" placeholder="Enter Old Password" value="" name="old_password">
							</div> -->

							<div class="form-group">
								<label for="">Password</label>
								<input type="password" class="form-control" placeholder="Enter New Password" value="" name="new_password">
								<span class="text-danger">{{ $errors->first('new_password')}}</span>
							</div>
						
						
							<!-- <div class="form-group"> -->
								<input type="submit" class="pf_btn" style="background: #8dc63f; color: #fff; border-color: #8dc63f; border: none;" value="SAVE CHANGES">
							<!-- </div> -->
							</form>
						</div>
				</div>


		   </div>
	 </section>
	</div>
	 </div>











@endsection