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
	.mytable tr td{
		padding: 10px;
	}
</style>

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../frontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Order Details
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
				<table class="text-center mytable responsive" width="100%" border="1">
					<tr>
						<td width="30%" style="background: #645871;">
							<img src="{{url('upload/logo_img/'.$logo->image)}}" alt="IMG-LOGO" style="width: 60px;">
						</td>
						<td width="40%">
							<h5><strong>JK Furniture</strong></h5>
							<span><strong>Moblie: </strong>{{$contact->mobile}}</span><br>
							<span><strong>Email: </strong>{{$contact->email}}</span><br>
							<span><strong>address:</strong>{{$contact->address}}</span><br>
						</td>
						<td width="30%">
							@php
          					$Date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
          					@endphp
          					<i><strong>Date :</strong>{{$Date->format('j F y, g:i a')}}</i><br><br>
							<strong>Order Number</strong> #{{$order->order_no}}
						</td>
					</tr>
					<tr style="background: #d6fdd6;">
						<td colspan="3"><strong>Billding Information</strong></td>
					</tr>
					<tr style="background: #d6fdd6;">
						<td>Stutas</td>
						<td colspan="2" style="text-align: left;">
								@if($order->status == '0')
								<span style="background: red; padding: 5px; color:#fff;">Unapproved</span>
								@elseif($order->status=='1')
								<span style="background: green; padding: 5px; color:#fff;">Approved</span>
								@endif
						</td>
					</tr>
					<tr style="background: #d6fdd6;">
						<td colspan="1"><strong>Name</strong></td>
						<td colspan="2" style="text-align: left;">{{$order['shipping']['name']}}</td>
					</tr>
					<tr style="background: #d6fdd6;">
						<td colspan="1"><strong>Mobile</strong></td>
						<td colspan="2" style="text-align: left;">{{$order['shipping']['mobile']}}</td>
					</tr>
					<tr style="background: #d6fdd6;">
						<td colspan="1"><strong>Email</strong></td>
						<td colspan="2" style="text-align: left;">{{$order['shipping']['email']}}</td>
					</tr>
					<tr style="background: #d6fdd6;">
						<td colspan="1"><strong>Payment Type</strong></td>
						<td colspan="2" style="text-align: left;">
							{{$order['payment']['payment_method']}}
							@if($order['payment']['payment_method']=='Bkash')
								(Transaction No: {{$order['payment']['transaction_no']}})
							@endif
						</td>
					</tr>
					<tr style="background: #d6fdd6;">
						<td colspan="1"><strong>Address</strong></td>
						<td colspan="2" style="text-align: left;">{{$order['shipping']['address']}}</td>
					</tr>
					<tr>
						<td colspan="3"><strong>Order Details</strong></td>
					</tr>
					<tr>
						<td><strong>Product Name && Image</strong></td>
						<td><strong>Color && Size</strong></td>
						<td><strong>Quantity && Price</strong></td>
					</tr>
					@foreach($order['orderdetails'] as $orderdetail)
					<tr>
						<td>
							<img src="{{url('upload/product_img/'.$orderdetail['product']['image'])}}" style="width:50px; height: 55px;">&nbsp;{{$orderdetail['product']['name']}}
						</td>
						<td>
							{{$orderdetail['color']['name']}} $ {{$orderdetail['size']['name']}}
						</td>
						<td>
							@php
								$sub_total = $orderdetail['product']['price'] * $orderdetail->quantity;
							@endphp
							{{$orderdetail->quantity}} X
							{{$orderdetail['product']['price']}} = {{$sub_total}}
						</td>
					</tr>
					@endforeach
					<tr style="background: #e3e3e3;">
						<td colspan="2" style="text-align:right;"><strong>Grand Total</strong></td>
						<td><strong>{{$order->order_total}}</strong></td>
					</tr>
				</table>
			</div>
		</div>
	</div>

@endsection


<td width="28%"></td>



<!-- class="profile-user-img img-fluid img-circle" -->