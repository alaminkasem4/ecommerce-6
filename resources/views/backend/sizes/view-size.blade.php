@extends('backend.layouts.master')
@section('content')

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Size</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Size</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3>View Size
              <a class="btn btn-success float-right btn-sm" href="{{route('sizes.add')}}"><i class="fa fa-plus-circle">Add Size</i></a>
          </h3>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped" width="100%">
            <thead>
              <tr>
                <th width="4%">SL.</th>
                <th>Size Name</th>
                <th width="9%">Action</th>
              </tr>
            </thead>
            <tbody>
              <div></div>
              @foreach($alldata as $key=> $size)
              @php
                $count_size = App\Model\ProductSize::where('size_id',$size->id)->count();
              @endphp
              <tr class="{{$size->id}}">
                <td>{{$key+1}}</td>
                <td>{{$size->name}}</td>
                <td>
                  <a title="edit" class="btn btn-sm btn-primary" href="{{route('sizes.edit',$size->id)}}">
                    <i class="fa fa-edit"></i>
                  </a>
                  @if($count_size<1)
                   <a id="delete" title="delete" class="btn btn-sm btn-danger" href="{{route('sizes.delete')}}" data-token="{{csrf_token()}}" data-id="{{$size->id}}">
                    <i class="fa fa-trash"></i>
                  </a>
                  @endif
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