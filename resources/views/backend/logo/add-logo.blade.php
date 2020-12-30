@extends('backend.layouts.master')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Logo</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Logo</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3>Add Logo
            <a class="btn btn-success float-right btn-sm" href="{{route('logos.view')}}"><i class="fa fa-arrow-left">Logo List</i></a> 
         </h3>
        </div>
        <div class="card-body">
          <form action="{{route('logos.store')}}" method="post" id="From_id" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              
              <div class="form-group col-md-4">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control" id="image">
              </div>
              <div class="form-group col-md-2">
                <img id="showImage" src="{{url('upload/no.jpg')}}" style="width: 150px; height: 160px;border: 1px solid #000;">
              </div>

              <div class="form-group col-md-6" style="padding-top: 50px;">
                <input type="submit" value="Submit" class="btn btn-primary">
              </div>
            </div>
          </form>
        </div>
      </div>
    </section> 
</div>




@endsection

