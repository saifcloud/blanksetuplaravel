
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ isset($website_title->field_value) ? $website_title->field_value :"Phresh Farms"}}</title>
     <!--    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
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
    <style type="text/css">
        .login_left_Cont h2 {
                font-weight: 600;
                color: #fff;
            }
    </style>
<body>

    <div class="login_wrapper">

        <div class="mainmenu-area topbar_area_pf" style="padding: 15px 0; background: transparent; border: none;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">                 
                        <nav class="navbar navbar-expand-lg navbar-light">

                            <div class="nav-item" id="toggler_pf">
                                <span class="bars_pf">
                                    <i class="fa fa-align-left" aria-hidden="true"></i>
                                </span>
                            </div>
                            
                            <a class="navbar-brand" href="#">
                                <h3>
                                @if(isset($website_logo))
                                  <img src="{{asset('public/assets/images/phreshfarm_img/'.$website_logo->field_value)}}" alt="">
                                @else
                                 <img src="{{asset('public/assets/images/phreshfarm_img/Logo.png')}}" alt="">
                                @endif
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

        <div class="login_left investor-login">
              <div>
                <!-- <a href="">Connect with Google Account</a> -->
              </div>
            <div class="login_left_Cont">
                 <div>
                    <h2>Bienvenue,</h2>
                    <h4> <img src="{{ url('public/assets/images/phreshfarm_img/login-icon.png')}}" alt="" /> Your space to grow your finance</h4>
                 </div>
            </div>

        </div>

        <div class="login_right">
           
            <div class="login_right_cont">
                <form action="{{ url('login-post')}}" method="post">
                  @csrf
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
                       <div>{{ $errors->first('user_type')}}</div>
                    </div> -->

                    <h3>Log <span>in</span></h3>
                    <p>To manage your account and investments.</p>

                     @if(Session()->has('error_msg'))
             <div class="alert alert-danger">
                 <p>{{ Session()->get('error_msg')}}</p>
             </div>
            @endif


            

             @if(Session()->has('success'))
              <?php   Session()->forget('phresh-user-email'); 
               echo  Session()->get('phresh-user-email');
              ?>
             <div class="alert alert-success">
                 <p class="text-info">{{ Session()->get('success')}}</p>
             </div>
            @endif


                       @if(Session()->has('not_verified'))
                         <div class="alert alert-danger">
                             <p>{{ Session()->get('not_verified')}}
                                
                            </p> 
                           
                         <a href="{{ url('reverification-investor')}}">click to resend verification mail</a> 
                                
                         </div>
                          @endif
                        
                    <div class="form-group">
                        <label for="">E-mail</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter E-mail" value="{{ old('email')}}" id="email">
                        <span>{{ $errors->first('email')}}</span>
                    </div>
    
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                        <span>{{ $errors->first('password')}}</span>
                    </div>
    
                    <div class="form-group">
                        <!-- <a href="index.html"> -->
                            <button type="submit" class="pf_btn" style="background: #8dc63f; color: #fff; border-color: #8dc63f; border: none;">Log in</button>
                        <!-- </a> -->
                    </div>
    
                    <div class="forget_Area">
                        <p>Have you <a href="{{ url('forget-password-investor')}}"> forgotten your password?</a>
                    </div>
    
                    <div class="account_Area">
                        <!-- <span>Don't have an Agent account ? <a href="{{ url('agent')}}">Sign up</a></span> -->

                       
                   <!--   <div>Don't have an account ? <a href="{{ url('agent')}}">Sign up</a></div> -->

                       
                    <!-- </div>
                    <div class="account_Area"> -->
                      
                        
                        <div class="login-bottom-area">
                            <p>Don't have an account ? <a href="{{ url('investor')}}">Sign up here</a></p>
                        </div>
                     

                       
                    </div>
    
                </form>
            </div>

        </div>

    </div>

    <!-- //////// Sidebar Animation wrapper /////////// -->

      @include('partials.sidebar_menu')
            
    
</body>
<script src="{{ asset('public/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('public/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/custom.js') }}"></script>

  <!--   <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/custom.js"></script> -->
	
	
		<script>
     // console.log(localStorage.getItem('selectedTab'))
		$(document).ready(function(){
		    


           $.ajaxSetup({
			 headers:{
			 	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			 }
		});




         


//   	$('#reverifiy-mail-send').click(function(e){
// 			 e.preventDefault();
		
// 	    	var	email  = $('#email').val();
//          // 	alert(email);
			
			
// 			$.ajax({
// 			   url:'<?php echo url('verify-account-investor');?>',
// 			   type:'POST',
// 			   // cache: false,
//                 // contentType: false,
//                 // processData: false,
// 			   data:{email:email},
// 			   success:function(response){
			       
// 			   	if(response.status==false)
// 			   	{
// 			   		// $('#error-otp').text(response.mes);
// 			   	}
//                 // console.log(response);
//                  //  $('.succes_smg').text('Profile Updated Successfully');
//                  // $('html, body').animate({ scrollTop: 0 }, 0);
//                 //   location.reload();
             
// 			   }
			    
// 			})
//   	});
	
	

		// if(error==0)
  //       {
	
		// $.ajax({
		// 	   url:'<?php echo url('verify-account-investor');?>',
		// 	   type:'POST',
		// 	   // cache: false,
  //              // contentType: false,
  //              // processData: false,
		// 	   data:{email:email,otp:otp},
		// 	   success:function(response){
		// 	   	if(response.status==false)
		// 	   	{
		// 	   		$('#error-otp').text(response.mes);
		// 	   	}
  //              // console.log(response);
  //               //  $('.succes_smg').text('Profile Updated Successfully');
  //               // $('html, body').animate({ scrollTop: 0 }, 0);
  //                location.reload();
             
		// 	   }


		//      })
		// }
	 // })


		})
		



	</script>
</html>