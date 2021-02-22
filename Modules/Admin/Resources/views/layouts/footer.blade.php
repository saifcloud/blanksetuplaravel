<!-- Javascript -->
<script src="{{ URL::asset('public/admin_assets/bundles/libscripts.bundle.js')}}"></script>    
<script src="{{ URL::asset('public/admin_assets/bundles/vendorscripts.bundle.js')}}"></script>

<script src="{{ URL::asset('public/admin_assets/bundles/c3.bundle.js')}}"></script>
<script src="{{ URL::asset('public/admin_assets/bundles/chartist.bundle.js')}}"></script>
<!-- <script src="http://www.wrraptheme.com/templates/hexabit/html/assets/vendor/toastr/toastr.js"></script> -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

<!--   <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  -->


 <script src="{{ URL::asset('public/admin_assets/bundles/datatablescripts.bundle.js')}}"></script>
 
 
 <script src="{{ URL::asset('public/admin_assets/js/dataTables.buttons.min.js')}}"></script>
 
 <script src="{{ URL::asset('public/admin_assets/js/buttons.bootstrap4.min.js')}}"></script>
 
  <script src="{{ URL::asset('public/admin_assets/js/buttons.colVis.min.js')}}"></script>
 
 <script src="{{ URL::asset('public/admin_assets/js/buttons.html5.min.js')}}"></script>
 
 <script src="{{ URL::asset('public/admin_assets/js/buttons.print.min.js')}}"></script>



<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>


<script src="{{ URL::asset('public/admin_assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{ URL::asset('public/admin_assets/js/index.js')}}"></script>


<script>
    function ConfirmDelete()
    {
      var x = confirm("Are you sure you want to delete?");
      if (x)
          return true;
      else
        return false;
    }
</script>  


<script>
CKEDITOR.replace( 'description' );
</script>

<script>
	$(document).ready(function(){

	 $('.date').datepicker();
      


      $('#user_table').DataTable({
		  processing: true,
		  serverSide: true,
		  ajax: {
		   url: "{{ url('admin/agent') }}",
		  },
		  columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'number', name: 'number'},
            {data: 'is_subscribed', name: 'is_subscribed'},
            {data: 'is_approve', name: 'is_approve'},
            {data: 'status', name: 'status'},
            {data: 'date', name: 'date'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
         ]

		  
		
		 });

	 })
</script>



<!-- investor -->
<script>
	$(document).ready(function(){
	 $('.date').datepicker();
      


      $('#investor_table').DataTable({
		  processing: true,
		  serverSide: true,
		  ajax: {
		   url: "{{ url('admin/investor') }}",
		  },
		  columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'number', name: 'number'},
            {data: 'date', name: 'date'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
         ]

		  
		
		 });

	 })
</script>


<script>
	$(document).ready(function() {


		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});



		$('.wallet-bal').click(function(){
			// alert('okkkkkkkk');
			 var original_text = $('.wallet-balance').text();
			 // alert(original_text)
			  var new_input = $("<input class=\"text_editor form-control col-sm-4\"/>");
			  new_input.val(original_text);
			  $('.wallet-balance').replaceWith(new_input);
			  new_input.focus()
		})



$(document).on("blur", ".text_editor", function() {

  var new_input = $(this).val();
  // alert(new_input)
  var updated_text = $("<span class=\"wallet-balance\">");
  // $('#wallet-balance').empty('');
  updated_text.text(new_input);
  $(this).replaceWith(updated_text);
  // alert('ok')
  // $('.wallet-bal').addClass('wallet-bal-submit');

  // $.ajax({
  //         url:"{{ url('admin/update-user-wallet')}}",
  //         type:'POST',
  //         data:{amount:updated_text}

  // })


  });
	});





</script>



<!-- categories -->
<script>
$(document).ready(function(){
	 // $('.date').datepicker();
      


      $('.data-table-category').DataTable({
		  processing: true,
		  serverSide: true,
		  ajax: {
		   url: "{{ url('admin/category') }}",
		  },
		  columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            
              {data: 'image', name: 'image'},
          
            {data: 'category_name', name: 'category_name'},
           
            {data: 'date', name: 'date'},
           
            {data: 'action', name: 'action', orderable: false, searchable: false},
         ]

		  
		
		 });

	 })
</script>



<!-- size -->
<script>
$(document).ready(function(){
   // $('.date').datepicker();
      


      $('.data-table-size').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
       url: "{{ url('admin/size') }}",
      },
      columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          
            {data: 'size_name', name: 'size_name'},
           
            {data: 'date', name: 'date'},
           
            {data: 'action', name: 'action', orderable: false, searchable: false},
         ]

      
    
     });

   })
</script>



<!-- banner -->
<script>
$(document).ready(function(){
	 // $('.date').datepicker();
      


      $('.data-table-banner').DataTable({
		  processing: true,
		  serverSide: true,
		  ajax: {
		   url: "{{ url('admin/banner') }}",
		  },
		  columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            
            {data: 'image', name: 'image'},
          
            {data: 'description', name: 'description'},
           
            {data: 'date', name: 'date'},
           
            {data: 'action', name: 'action', orderable: false, searchable: false},
         ]

		  
		
		 });

	 })
</script>


<!-- product -->
<script>
$(document).ready(function(){
   // $('.date').datepicker();
      


      $('.data-table-product').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
       url: "{{ url('admin/product-list') }}",
      },
      columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            
            // {data: 'image', name: 'image'},

            // {data: 'name', name: 'name'},

            {data: 'category', name: 'category'},

            {data: 'size', name: 'size'},

             {data: 'description', name: 'description'},

            // {data: 'material_type', name: 'material_type'},
           
            {data: 'date', name: 'date'},
           
            {data: 'action', name: 'action', orderable: false, searchable: false},
         ]

      
    
     });

   })
</script>



<!-- client -->
<script>
$(document).ready(function(){
   // $('.date').datepicker();
      


      $('.data-table-client').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
       url: "{{ url('admin/client') }}",
      },
      columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            
            {data: 'image', name: 'image'},

            {data: 'username', name: 'username'},

            {data: 'fullname', name: 'fullname'},

            {data: 'email', name: 'email'},

            {data: 'phone', name: 'phone'},

            {data: 'date', name: 'date'},
           
            {data: 'action', name: 'action', orderable: false, searchable: false},
         ]

      
    
     });

   })
</script>




<!-- order -->
<script>
$(document).ready(function(){
   // $('.date').datepicker();
      


      $('.data-table-order').DataTable({
      processing: true,
      serverSide: true,
      autoWidth: false,
      ajax: {
       url: "{{ url('admin/order') }}",
      },
      columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            
            {data: 'order_id', name: 'order_id'},

            {data: 'category', name: 'category'},

            {data: 'quantity', name: 'quantity'},

            {data: 'size', name: 'size'},

            // {data: 'site', name: 'site'},

            {data: 'expected_receiving_date', name: 'expected_receiving_date'},

            {data: 'transaction_id', name: 'transaction_id'},

            {data: 'delivery_status', name: 'delivery_status'},

            {data: 'payment_status', name: 'payment_status'},

            // {data: 'date', name: 'date'},
           
            {data: 'action', name: 'action', orderable: false, searchable: false}
         ]

      
    
     });

   })
</script>


 <script>


//     $(document).ready(function(){
        
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         });


//         $('body').on('change','#order-status',function(){
//             var order_product_id = $(this).data('order_product_id');
//             var status     = $(this).val();
//             alert(status)
//             $.ajax({
//                 url:'{{url("admin/change-order-status")}}',
//                 type:"POST",
//                 data:{order_product_id:order_product_id,status:status},
//                 success:function(response){
//                  console.log(response);
//                  location.reload();
//                 }
//             })
            
//         })
//     })
 </script>



<!-- subcategory -->
<script>
$(document).ready(function(){
	 // $('.date').datepicker();
      


      $('.data-table-subcategory').DataTable({
		  processing: true,
		  serverSide: true,
		  ajax: {
		   url: "{{ url('admin/subcategory') }}",
		  },
		  columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'image', name: 'image'},
            {data: 'subcategory_name', name: 'subcategory_name'},
            {data: 'pack', name: 'pack'},
            {data: 'category', name: 'category'},
            {data: 'duration', name:'duration'},
            {data: 'roi', name:'roi'},
            {data: 'description', name:'description'},
            {data: 'status', name: 'status'},
            {data: 'date', name: 'date'},
            // {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
         ]

		  
		
		 });

	 })
</script>









<!-- transactions -->
<script>
$(document).ready(function(){
	 // $('.date').datepicker();
      


      $('.data-table-transaction').DataTable({
		  processing: true,
		  serverSide: true,
		  ajax: {
		   url: "{{ url('admin/transactions') }}",
		  },
		  columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'transaction_id', name: 'transaction_id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'user_type', name: 'user_type'},
            {data: 'amount', name: 'amount'},
            {data: 'date', name: 'date'},
            {data: 'paymentType', name: 'paymentType'},
            {data: 'status', name: 'status'},
            // {data: 'action', name: 'action', orderable: false, searchable: false},
         ]

		  
		
		 });

	 })
</script>



</body>

</html>