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
			Customer Account
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
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="card card-primary card-outline">
							<div class="card-body box-profile">
								<div class=" text-center">
									<img class="profile-user-img img-fluid " src="{{(!empty($user->image))?url(('upload/user_img/').$user->image):url('upload/no.jpg')}}"alt="User profile picture" style="width: 300px; border-radius: 150px;">
								</div>
								<h3 class="text-center">{{$user->name}}</h3>
								<p class="text-center">{{$user->address}}</p>
								<table class="table table-bordered">
									<tbody>
										<tr>
											<td>Mobile:</td>
											<td>{{$user->mobile}}</td>
										</tr>
										<tr>
											<td>Email:</td>
											<td>{{$user->email}}</td>
										</tr>
										<tr>
											<td>Gender:</td>
											<td>{{$user->gender}}</td>
										</tr>
									</tbody>
								</table>
								<a href="{{route('customer.edit.profile')}}" class="btn btn-primary btn-block">Edit Profile</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection






<!-- class="profile-user-img img-fluid img-circle" -->