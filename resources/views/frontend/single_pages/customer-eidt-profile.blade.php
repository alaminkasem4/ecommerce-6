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
			Edit Profile
		</h2>
	</section>

	<div class="container">
		<div class="row" style="padding: 15px 0px 15px 0px;">
			<div class="col-md-2">
				<ul class="prof">
                    <li><a href="{{route('order.list')}}">My Order</a></li>
                    <li><a href="{{route('deshboard')}}">My Profile</a></li>
                    <li><a href="{{route('customer.password.change')}}">Password Change</a></li>
                </ul>
			</div>
			<div class="col-md-10">
				<form method="post" action="{{route('customer.update.profile')}}" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-md-5">
	        				<label>Full Name<strong style="color:red">*</strong></label>
	        				<input type="text" name="name" value="{{$editdata->name}}" class="form-control">
	        				<font style="color:red;">
	        				{{($errors->has('name'))?($errors->first('name')):''}}
	        				</font>
	        			</div>
	        			<div class="col-md-5">
	        				<label>Email</label>
	        				<input type="text" name="email" value="{{$editdata->email}}" class="form-control" readonly>
	        			</div>
	        			<div class="col-md-5">
	        				<label>Mobile</label>
	        				<input type="text" name="mobile" value="{{$editdata->mobile}}" class="form-control" readonly>
	        			</div>
        				<div class="col-md-5">
        					<label>Gender</label>
        					<select name="gender" id="gender" class="form-control">
        						<option value="">Select Gende</option>
        						<option value="Male" {{($editdata->gender=="Male")?"selected":""}}>Male</option>
                  				<option value="Female"{{($editdata->gender=="Female")?"selected":""}}>Female</option>
        					</select>
        				</div>

             			<div class="col-md-5">
                			<label>Address</label>
                			<input type="text" name="address" value="{{$editdata->address}}" class="form-control">
                		</div>

              			<div class="col-md-5">
                			<label>Image</label>
                			<input type="file" name="image" class="form-control" id="image">
              			</div>
              			<div class="col-md-2">
                			<img id="showImage" src="{{(!empty($editdata->image))?url(('upload/user_img/').$editdata->image):url('upload/no.jpg')}}" style="width: 90px; height: 100px;border: 1px solid #000;">
              			</div>

        				<div class="col-md-6 right" style="padding-top:5px;">
        					<input type="submit" value="Update" class="btn btn-primary">
        				</div>
        		</div>
				</form>
			</div>
		</div>
	</div>

@endsection






<!-- class="profile-user-img img-fluid img-circle" -->