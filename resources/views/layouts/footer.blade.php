
  
<!-- /// main pf //// -->

<!--<div class="side_animation_wrapper moved" id="sideout">-->
<!--	<div class="sidemenu_cancel">-->
<!--		<a href="#">-->
<!--			<img src="{{asset('public/assets/images/phreshfarm_img/cancel.png')}}" alt="">-->
<!--		</a>-->
<!--	</div>-->
	<!--<div class="side_menu_list">-->
	<!--	<ul>-->
	<!--		<li>-->
	<!--			<a href="{{ url('/')}}">Home</a>-->
	<!--			<span class="rj"></span>-->
	<!--		</li>-->
	<!--		<li>-->
	<!--			<a href="#">About</a>-->
	<!--			<span class="rj"></span>-->
	<!--		</li>-->
	<!--		<li>-->
	<!--			<a href="#">Why Phresh Farm</a>-->
	<!--			<span class="rj"></span>-->
	<!--		</li>-->
	<!--		<li>-->
	<!--			<a href="#">investments</a>-->
	<!--			<span class="rj"></span>-->
	<!--		</li>-->
	<!--		<li>-->
	<!--			<a href="#">faq</a>-->
	<!--			<span class="rj"></span>-->
	<!--		</li>-->
	<!--		<li>-->
	<!--			<a href="#">help desk</a>-->
	<!--			<span class="rj"></span>-->
	<!--		</li>-->
	<!--	</ul>-->
	<!--</div>-->
		<!--<div class="bottom_side_info">-->
		<!--	<ul>-->
		<!--		<li>-->
		<!--			<a href="#">{{ isset($contact_1->field_value)? $contact_1->field_value:''}}</a>-->
		<!--		</li>-->
		<!--		<li>-->
		<!--			<a href="#">{{ isset($contact_2->field_value)? $contact_2->field_value:''}}</a>-->
		<!--		</li>-->
		<!--		<li>-->
		<!--			<a href="#">{{ isset($contact_3->field_value)? $contact_3->field_value:''}}</a>-->
		<!--		</li>-->
		<!--		<li>-->
		<!--			<a href="#">{{ isset($website_email->field_value)? $website_email->field_value:''}}</a>-->
		<!--		</li>-->
		<!--	</ul>-->
		<!--</div>-->
		<!--<div class="side_pf_copyright">-->
		<!--	<p>© 2020 Phresh Farm. All Rights Reserved</p>-->
		<!--</div>-->
	
<!--</div>-->
  @include('partials.sidebar_menu')





 
  






</div>



     <script src="{{ url('public/assets/js/jquery.js')}}"></script>
	<script src="{{ url('public/assets/js/bootstrap.min.js')}}"></script>
   
	<script src="{{ url('public/assets/js/popper.min.js')}}"></script>
	<script src="{{ url('public/assets/js/plugin.js')}}"></script>
	<script src="{{ url('public/assets/js/main.js')}}"></script>
	<script src="{{ url('public/assets/js/custom.js')}}"></script>
	


	<script type="text/javascript" src="http://demo.api.glade.ng/checkout.js"></script>

    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

  <script>
		var acc = document.getElementsByClassName("accordion");
	 var i;
	 
	 for (i = 0; i < acc.length; i++) {
	   acc[i].onclick = function() {
		 this.classList.toggle("active");
		 var panel = this.nextElementSibling;
		 if (panel.style.maxHeight){
		   panel.style.maxHeight = null;
		 } else {
		   panel.style.maxHeight = panel.scrollHeight + "px";
		 } 
	   }
	   ;
	 }
	</script>
	
<script>
    $('.carousel').carousel({
    pause: "false"
});



</script>






</script>

<!-- otp verify -->
	<script>
     // console.log(localStorage.getItem('selectedTab'))
		$(document).ready(function(){
		    


           $.ajaxSetup({
			 headers:{
			 	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			 }
		});




         


		// $('.basic_details').click(function(e){
		// 	 e.preventDefault();
		// 	// alert('ok');
		// var	email  = $('email').val();
		// var	otp   = $('otp').val();
		// var error =0;
		// if(otp=='')
		// {
		//  $('#error-email').text('Please enter otp');
  //        error++;
		// }

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


	<script>
     // console.log(localStorage.getItem('selectedTab'))
		$(document).ready(function(){
		    


           $.ajaxSetup({
			 headers:{
			 	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			 }
		});




            var activeTab = localStorage.getItem('selectedTab');
            // alert(activeTab)
			    if(activeTab){
			    	$('#tab_one').removeClass('.sidebar-nav active');
			        $('#'+activeTab).addClass('.sidebar-nav active');
			        $( '#'+activeTab ).trigger( "click" );
			    }



		$('.basic_details').click(function(e){
			 e.preventDefault();
			// alert('ok');
		// var	image  = $('image').val();
		// var	name   = $('name').val();
		// var number = $('number').val();
		// var dob    = $('dob').val();
		// formData = new FormData($('#profileForm')[0]);
		var formData = new FormData($('#GetprofileForm')[0]);
		// alert(formData.get('name'));
		$.ajax({
			   url:'<?php echo url('investor/profile-information');?>',
			   type:'POST',
			   // cache: false,
               contentType: false,
               processData: false,
			   data:formData,
			   success:function(response){
               // console.log(response);
                //  $('.succes_smg').text('Profile Updated Successfully');
                // $('html, body').animate({ scrollTop: 0 }, 0);
               location.reload();
             
			   }


		})
		})


		})
		



	</script>



	<!-- account details -->

    <script>

		$(document).ready(function(){
           


           $.ajaxSetup({
			 headers:{
			 	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			 }
		});

		$('.account_details').click(function(e){
			 e.preventDefault();
			// alert('ok');
		// var	image  = $('image').val();
		// var	name   = $('name').val();
		// var number = $('number').val();
		// var dob    = $('dob').val();
		// formData = new FormData($('#profileForm')[0]);
		var formData = new FormData($('#bank_details')[0]);
		// alert(formData.get('name'));
		$.ajax({
			   url:'<?php echo url('investor/account-information');?>',
			   type:'POST',
			   // cache: false,
               contentType: false,
               processData: false,
			   data:formData,
			   success:function(response){
               console.log(response);
               // $('.succes_smg').text('Account Information is Added Successfully');
               //  $('html, body').animate({ scrollTop: 0 }, 0);
                location.reload();
               // $('#tab_four').addClass('sidebar-nav active');
			   }


		})
		})


		})
		



	</script>

  <!-- wallet -->
	<script>
		
	$(document).ready(function(){

		  $.ajaxSetup({
			 headers:{
			 	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			 }
		});
		    

		 function load_walletapi(email,name,amount,investor_id){
        
		  initPayment({
		    MID:"GP0000001",
		    email: email,
		    firstname:name,
		    paymentType:["bank","card"],
		    // lastname:"Doe",
		    // description: "",
		    // title: "",
		    amount: amount,
		    country: "NG",
		    currency: "NGN",
		    meta_data:investor_id,

		    	 //    "MID":"GP0000001",
				    // "paymentType":"card",
				    // "user": {
				    //     "firstname":"Abubakar",
				    //     "lastname":"Ango",
				    //     "email":"test@gladepay.com",
				    //     "ip":"192.168.33.10",
				    //     "fingerprint": "cccvxbxbxb"
				    //  },
				    // "account":{
				    //   "accountnumber":"0690000007",
				    //   "bankcode":"044"
				    // },
				    // "amount":"10000",
				    // "country": "NG",
				    // "currency": "NGN"
		    
		    onclose: function() {

		    },
		    callback: function(response) {

              console.log(response);

              // $.ajax({
              // 	     url:'<?php echo url('investor/update-wallet');?>',
              // 	     type:'POST',
              // 	     // dataType: 'json',
              // 	     data:{
              // 	     	email:response.email,
              // 	     	cardToken:response.cardToken,
              // 	     	payment_method:response.payment_method,
              // 	     	txnStatus:response.txnStatus,
              // 	     	txnRef:response.txnRef,
              // 	     	card_digit:response.card.mask,
              // 	     	amount:response.chargedAmount,
              // 	     	user_id:response.meta,

              // 	     },
              // 	     success:function(ajax_response){
              //         // console.log(ajax_response);
                    
              //         // $('#'+tab).addClass('.sidebar-nav active');
              //         location.reload();

              // 	     }
              // })
		    }

	    	});

		}



         
  // add fund

		$('#fund_add').click(function(){
			 // e.preventDefault();
			// $('#myModal').modal('show');
			// alert('okk')

			var email       = $('#email').val();
			var name        = $('#name').val();
			var amount      = $('#amount').val();
			var investor_id = $('#investor_id').val();

            
			if(amount =='')
			{
				$('.amount-error').text('Please Enter Amount');
			}else{

			$.ajax({
			   url:'<?php echo url('investor/add-amount');?>',
			   type:'POST',
			   data:{investor_id:investor_id,email:email,amount:amount,status:1},
			   success:function(response){
               // console.log(response);
               if(response.success== true)
               {
               	 $('#addFundModal').modal('hide');
               	  load_walletapi(email,name,amount,investor_id);
               }
              
               // location.reload();
               // $('.succes_smg').text('Profile Updated Successfully');
               // $('html, body').animate({ scrollTop: 0 }, 0);
			   }

			
		      })
		}


		})


		})
		
    

	</script>





	
<!-- Payout Fund -->

 	<script>

 		$(document).ready(function(){

		  $.ajaxSetup({
			 headers:{
			 	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			 }
		});



			$('.pay-out').click(function(){
					 // e.preventDefault();
					 var agent_id = $('#agent_id').val();
					 $.get("{{ url('agent/get-bank-details') }}/"+agent_id, function(response) {
		                console.log(response)
		               if($.isEmptyObject(response))
		               {     
		               	// alert('ok');
                             $('#ac_details_not_found').modal('show');
		               }else{
                           $('#bank_name').val(response.bank_name);
		                   $('#bank_code').val(response.bank_code);
		                   $('#bank_account').val(response.account_number);
                           $('#payout-fund').modal('show');


		               }
		          
			 });




			$('#pay-out-to-account').click(function(){
			 // e.preventDefault();
			 var error=0;
			 var bank_name     = $('#bank_name').val();
			 var bank_code     = $('#bank_code').val();
			 var payout_amount = $('#payout_amount').val();
			 var description   = $('#description').val();
			 var name          = $('#name').val();
              
              // alert(payout_amount);
			 if(payout_amount=='')
			 {
			 	$('.amount-error').text('Please Enter Amount');
			 	error++;
			 }




					 if(error ==0)
					 {
					 	$.ajax({
					 		    url:"{{ url('agent/payout-amount') }}",
					 		    type:'POST',
					 		    data:{bank_name:bank_name, bank_code:bank_code, payout_amount:payout_amount,description:description,name:name},
					 		    success:function(response){
		                        // console.log(response)
			                            if(response.staus==true){
                                          $('#message_pay_out').text(response.message);
                                          $('#payout-fund').modal('hide');
                                          $('#payOutFund').trigger('reset');
                                           location.reload();
			                        	}else{
                                          $('#message_pay_out').text(response.message);
                                          $('#payout-fund').modal('hide');
                                          $('#payOutFund').trigger('reset');
                                           location.reload();
			                        	}
					 		    }
					 	})
					 }
		
			 })

      })

})
	</script>

	
	


</body>
</html>