<!DOCTYPE html>
<html>
<head>
	<title>Order Details</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table width="100%">
					<tbody>
						<tr>
							<td width="35%">@php
          					$Date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
          					@endphp
          					<i><strong>Date :</strong>{{$Date->format('j F y, g:i a')}}</i></td>
							<td width="30%">
								<span style="font-size: 20px; background-color:#0d809300;">JK Furniture </span>
								<br> 12/1 Surma,Sylhet
							</td>
							<td width="35%">
								<strong>Call :</strong> +880 01644133400 <br>
								<strong>Email:</strong> alaminkasem4@gmail.com
							</td>
						</tr>
					</tbody>
				</table>
			</div>	
		</div>
		<hr style="margin-bottom: 0px;">
		<div class="row">
			<div class="col-md-12">
				<table width="100%">
					<tbody>
						<tr>
							<td width="40%"></td>
							<td style="font-size: 20px;"><strong>Order Details</strong></td>
							<td width="25%"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table border="1" width="100%">	
					<tr>
						<td colspan="3" style="text-align:center;"><strong>Billding Information</strong></td>
					</tr>
					<tr>
						<td style="text-align:center;"><strong>Order No</strong></td>
						<td colspan="2" style="text-align: left;">#{{$order->order_no}}</td>
					</tr>
					<tr>
						<td style="text-align:center;"><strong>Stutas</strong></td>
						<td colspan="2" style="text-align: left;">
								@if($order->status == '0')
								<span style="background: red; padding: 5px; color:#fff;">Unapproved</span>
								@elseif($order->status=='1')
								<span style="background: green; padding: 5px; color:#fff;">Approved</span>
								@endif
						</td>
					</tr>
					<tr>
						<td colspan="1" style="text-align:center;"><strong>Name</strong></td>
						<td colspan="2" style="text-align: left;">{{$order['shipping']['name']}}</td>
					</tr>
					<tr>
						<td colspan="1" style="text-align:center;"><strong>Mobile</strong></td>
						<td colspan="2" style="text-align: left;">{{$order['shipping']['mobile']}}</td>
					</tr>
					<tr>
						<td colspan="1" style="text-align:center;"><strong>Email</strong></td>
						<td colspan="2" style="text-align: left;">{{$order['shipping']['email']}}</td>
					</tr>
					<tr>
						<td colspan="1" style="text-align:center;"><strong>Payment Type</strong></td>
						<td colspan="2" style="text-align: left;">
							{{$order['payment']['payment_method']}}
							@if($order['payment']['payment_method']=='Bkash')
								(Transaction No: {{$order['payment']['transaction_no']}})
							@endif
						</td>
					</tr>
					<tr>
						<td colspan="1" style="text-align:center;"><strong>Address</strong></td>
						<td colspan="2" style="text-align: left;">{{$order['shipping']['address']}}</td>
					</tr>
					<tr>
						<td colspan="3" style="text-align:center;"><strong>Order Details</strong></td>
					</tr>
					<tr>
						<td><strong>Product Name</strong></td>
						<td><strong>Color && Size</strong></td>
						<td><strong>Quantity && Price</strong></td>
					</tr>
					@php
					@endphp
					@foreach($order['orderdetails'] as $orderdetail)
					<tr>
						<td>
							 {{$orderdetail['product']['name']}}
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
		<br>
		<div class="row">
			<div class="col-md-12">
				<table border="0" width="100%">
					<tbody>
						<tr>
							<td style="width: 40%;"></td>
							<td style="width:20%;"></td>
							<td style="width: 40%; text-align: center;">
								<p style="text-align: center; border-bottom: 1px solid #000;">Customer Signeture</p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>