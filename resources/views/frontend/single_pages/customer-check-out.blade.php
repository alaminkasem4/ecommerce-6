@extends('frontend.layouts.master')
@section('content')

	<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('frontend/images/bg-01.jpg');">
	<h2 class="ltext-105 cl0 txt-center">
		Customer Billing Information
	</h2>
</section>

	<!-- About us Section -->
<section class="about_us">
	<div class="container">
		<div class="row" style="padding:20px 0px 20px 0px;">
			<div class="col-md-12">
				<form method="post" action="{{route('store.check.out')}}" id="FromID">
					@csrf
					<div class="row">
						<div class="col-md-6">
	        				<label>Full Name<strong style="color:red">*</strong></label>
	        				<input type="text" name="name" class="form-control" placeholder="Full Nmae">
	        				<font style="color:red;">
	        				{{($errors->has('name'))?($errors->first('name')):''}}
	        				</font>
	        			</div>
	        			<div class="col-md-6">
	        				<label>Email</label>
	        				<input type="text" name="email" class="form-control" placeholder="exam@gmail.com">
	        			</div>
	        			<div class="col-md-6">
	        				<label>Mobile No<strong style="color:red">*</strong></label>
	        				<input type="text" name="mobile" class="form-control" placeholder="01XXXXXXXXX">
	        				<font style="color:red;">
	        				{{($errors->has('mobile'))?($errors->first('mobile')):''}}
	        				</font>
	        			</div>
             			<div class="col-md-6">
                			<label>Address<strong style="color:red">*</strong></label>
                			<input type="text" name="address" class="form-control" placeholder="Address">
                			<font style="color:red;">
	        				{{($errors->has('address'))?($errors->first('address')):''}}
	        				</font>
                		</div>
        				<div class="col-md-6 right" style="padding-top:5px;">
        					<input type="submit" value="Update" class="btn btn-primary">
        				</div>
        			</div>
				</form>
			</div>
		</div>
	</div>
</section>


<script type="text/javascript">
  $(document).ready(function(){
    $('#FromID').validate({
      rules:{
         name:{
          required:true,
        },
        mobile:{
            required:true,
        },
        address:{
            required:true,
        }
      },

      messages:{
        
      },
      errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
    });
  });
</script>

@endsection