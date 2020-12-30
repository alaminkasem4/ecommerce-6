@extends('backend.layouts.master')
@section('content')

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Color</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Color</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3>View Color
              <a class="btn btn-success float-right btn-sm" href="{{route('colors.add')}}"><i class="fa fa-plus-circle">Add Color</i></a>
          </h3>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped" width="100%">
            <thead>
              <tr>
                <th width="4%">SL.</th>
                <th>Color Name</th>
                <th width="9%">Action</th>
              </tr>
            </thead>
            <tbody>
              <div></div>
              @foreach($alldata as $key=> $color)
              @php
                $count_color = App\Model\ProductColor::where('color_id',$color->id)->count();
              @endphp
              <tr class="{{$color->id}}">
                <td>{{$key+1}}</td>
                <td>{{$color->name}}</td>
                <td>
                  <a title="edit" class="btn btn-sm btn-primary" href="{{route('colors.edit',$color->id)}}">
                    <i class="fa fa-edit"></i>
                  </a>
                  @if($count_color<1)
                   <a id="delete" title="delete" class="btn btn-sm btn-danger" href="{{route('colors.delete')}}" data-token="{{csrf_token()}}" data-id="{{$color->id}}">
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