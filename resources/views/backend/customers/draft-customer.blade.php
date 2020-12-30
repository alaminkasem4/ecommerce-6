@extends('backend.layouts.master')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Customer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Customer</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3>Customer Draft
              <a class="btn btn-success float-right btn-sm" href="{{route('customers.view')}}"><i class="fa fa-list">View Customer</i></a>
          </h3>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>SL.</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Create Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <div></div>
              @foreach($alldata as $key=>$draft)
              @php
                $created = new Carbon\Carbon($draft->created_at);
                $now = Carbon\Carbon::now();
                $difference = ($created->diff($now)->days < 1)?'today':$created->diffForHumans($now);
              @endphp
              <tr class="{{$draft->id}}">
                <td>{{$key+1}}</td>
                <td>{{$draft->name}}</td>
                <td>{{$draft->mobile}}</td>
                <td>{{$draft->email}}</td>
                <td>{{$difference }}</td>
                <td>
                   <a id="delete" title="delete" class="btn btn-sm btn-danger" href="{{route('customers.delete')}}" data-token="{{csrf_token()}}" data-id="{{$draft->id}}">
                    <i class="fa fa-trash"></i>
                  </a>
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