@extends('backend.layouts.master')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Order Manage</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Order</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3>Order Details
          <a class="btn btn-success float-right btn-sm" href="{{route('orders.pending')}}"><i class="fa fa-list">Pending List</i></a></h3>
        </div>
        <div class="card-body">
            <table class="text-center mytable responsive" width="100%" border="1">

                <tr style="background: #d6fdd6;">
                  <td colspan="3"><strong>Billding Information</strong></td>
                </tr>
                <tr>
                  <td colspan="1"><strong>Order Number</strong></td>
                  <td colspan="2" style="text-align: left;"> #{{$order->order_no}}</td>
                </tr>
                <tr >
                  <td colspan="1"><strong>Name</strong></td>
                  <td colspan="2" style="text-align: left;">{{$order['shipping']['name']}}</td>
                </tr>
                <tr >
                  <td colspan="1"><strong>Mobile</strong></td>
                  <td colspan="2" style="text-align: left;">{{$order['shipping']['mobile']}}</td>
                </tr>
                <tr >
                  <td colspan="1"><strong>Email</strong></td>
                  <td colspan="2" style="text-align: left;">{{$order['shipping']['email']}}</td>
                </tr>
                <tr >
                  <td colspan="1"><strong>Payment Type</strong></td>
                  <td colspan="2" style="text-align: left;">
                    {{$order['payment']['payment_method']}}
                    @if($order['payment']['payment_method']=='Bkash')
                      (Transaction No: {{$order['payment']['transaction_no']}})
                    @endif
                  </td>
                </tr>
                <tr >
                  <td colspan="1"><strong>Address</strong></td>
                  <td colspan="2" style="text-align: left;">{{$order['shipping']['address']}}</td>
                </tr>
                <tr style="background: #d6fdd6;">
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
    </section> 
</div>

@endsection