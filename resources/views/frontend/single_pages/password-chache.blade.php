@extends('frontend.layouts.master')
@section('content')

<style type="text/css">
	.prof li{
		background: #1781BF;
		padding: 7px;
		margin:3px;
		border-radius: 10px;
	}
	.prof li a{
		color:#fff;
		padding-left: 15px;
	}
	.prof li:hover a{
		color:black;
	}

</style>

	<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('frontend/images/bg-01.jpg');">
	<h2 class="ltext-105 cl0 txt-center">
		Password change
	</h2>
</section>

<div class="container">
	<div class="row" style="padding: 15px 0px 15px 0px;">
		<div class="col-md-2">
			<ul class="prof">
                <li><a href="{{route('order.list')}}">My Order</a></li>
                <li><a href="{{route('deshboard')}}">My Profile</a></li>
            </ul>
		</div>
		<div class="col-md-10">
			<div class="card-body">
	        	<form action="{{route('password_update')}}" method="post" id="From_id">
	        		@csrf
	        		<div class="form-row">
	        			<div class="form-group col-md-4">
	        				<label>Current Password<strong style="color:red;">*</strong></label>
	        				<input type="password" name="current_password" id="current_password" class="form-control" placeholder="Current Password">
	        			</div>	
	        			<div class="form-group col-md-4">
	        				<label>New Password<strong style="color:red;">*</strong></label>
	        				<input type="password" name="new_password" id="new_password" class="form-control" placeholder="New Password">
	        			</div>
	        			<div class="form-group col-md-4">
	        				<label>Confirm Password<strong style="color:red;">*</strong></label>
	        				<input type="password" name="confirm_new_password" id="confirm_new_password"  class="form-control" placeholder="Confirm Password">
	        			</div>

	        			<div class="form-group col-md-4">
	        				<input type="submit" value="Save" class="btn btn-primary">
	        			</div>
	        		</div>
	        	</form>
	        </div>
		</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$('#From_id').validate({
			rules:{
				current_password:{
					required:true,
				},
				new_password:{
					required:true,
					minlength:9,
				},
				confirm_new_password:{
					required:true,
					equalTo: '#new_password'
				}
			},

			messages:{
				current_password:{
					required: 'Please Enter Current Password',
				},
				new_password:{
					required: 'Please Enter New Password',
					minlength: 'Password Minimum 9 Number Or Char',
				},
				confirm_new_password:{
					required: 'Confirm New Password',
					minlength:'Password Minimum 9 Number Or Char',
				}
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






<!-- class="profile-user-img img-fluid img-circle" -->