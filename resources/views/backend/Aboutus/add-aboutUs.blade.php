@extends('backend.layouts.master')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage AboutUs</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">AboutUs</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3>Add Services
            <a class="btn btn-success float-right btn-sm" href="{{route('aboutus.view')}}"><i class="fa fa-list">Services List</i></a> 
         </h3>
        </div>
        <div class="card-body">
          <form action="{{route('aboutus.store')}}" method="post" id="From_id" enctype="multipart/form-data">
            @csrf
            <div class="form-row">

              <div class="form-group col-md-12">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" rows="4" placeholder="Please Write Description"></textarea>
              </div>

              <div class="form-group col-md-6" style="padding-top: 30px;">
                <input type="submit" value="Submit" class="btn btn-primary">
              </div>
            </div>
          </form>
        </div>
      </div>
    </section> 
</div>




@endsection

