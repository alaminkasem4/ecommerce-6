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
			Order List
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
				<table class="table table-bordered">
					<tr>
						<th>SL</th>
						<th>Order NO</th>
						<th>Total Amount</th>
						<th>Payment Type</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
					<tbody>
						@foreach($orders as $key => $order)
						<tr>
							<td width="5%">{{$key+1}}</td>
							<td>#{{$order->order_no}}</td>
							<td>{{$order->order_total}}</td>
							<th>
								{{$order['payment']['payment_method']}}
								@if($order['payment']['payment_method']=='Bkash')
								(Transcation no: {{$order['payment']['transaction_no']}})
								@endif
							</th>
							<td width="15%">
								@if($order->status == '0')
								<span style="background: red; padding: 5px; color:#fff;">Unapproved</span>
								@elseif($order->status=='1')
								<span style="background: green; padding: 5px; color:#fff;">Approved</span>
								@endif
							</td>
							<td>
								<a href="{{route('customer.order.details',$order->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"> View</i></a>
								<a href="{{route('customer.order.details.print',$order->id)}}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-download"> Print</i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

@endsection






<!-- class="profile-user-img img-fluid img-circle" -->