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
          <h3>Order Approval List
          <a class="btn btn-success float-right btn-sm" href="{{route('orders.pending')}}"><i class="fa fa-list">Pending List</i></a></h3>
        </div>
        <div class="card-body">
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
              <tr class="{{$order->i}}">
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
                   @if($order->status=='1')
                    <span style="background: green; padding: 5px; color:#fff;">Approved</span>
                   @endif
                </td>
                <td>
                    <a href="{{route('orders.details',$order->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"> View</i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section> 
</div>

@endsection