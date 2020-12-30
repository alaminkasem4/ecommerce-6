@extends('backend.layouts.master')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Sliders</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Slider</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3>Sliders View
              <a class="btn btn-success float-right btn-sm" href="{{route('sliders.add')}}"><i class="fa fa-plus-circle">Add Slider</i></a>
          </h3>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>SL.</th>
                <th>Image</th>
                <th>Slider Title</th>
                <th>Slider Text</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <div></div>
              @foreach($alldata as $key=>$slider)
              <tr class="{{$slider->id}}">
                <td>{{$key+1}}</td>
                <td>
                  <img class="profile-user-img "
                     src="{{(!empty($slider->image))?url(('upload/sliders_img/').$slider->image):url('upload/no.jpg')}}" width="100px" height="110" alt="slider imgae">
                </td>
                <td>{{$slider->slider_title}}</td>
                <td>{{$slider->slider_text}}</td>
                <td>
                  <a title="edit" class="btn btn-sm btn-primary" href="{{route('sliders.edit',$slider->id)}}">
                    <i class="fa fa-edit"></i>
                  </a>
                   <a id="delete" title="delete" class="btn btn-sm btn-danger" href="{{route('sliders.delete')}}" data-token="{{csrf_token()}}" data-id="{{$slider->id}}">
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