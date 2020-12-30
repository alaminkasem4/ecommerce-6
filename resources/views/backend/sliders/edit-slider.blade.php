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
          <h3>Edit Slider
            <a class="btn btn-success float-right btn-sm" href="{{route('sliders.view')}}"><i class="fa fa-arrow-left">Go Back</i></a> 
         </h3>
        </div>

        <div class="card-body">
        	<form action="{{route('sliders.update',$editslider->id)}}" method="post" id="From_id" enctype="multipart/form-data">
        		@csrf
        		<div class="form-row">

        			<div class="form-group col-md-4">
        				<label for="slider_title">Slider Titile</label>
        				<input type="text" name="slider_title" value="{{$editslider->slider_title}}" class="form-control">
        			</div>

        			<div class="form-group col-md-4">
        				<label for="slider_text ">Slider Text</label>
        				<input type="text" name="slider_text" value="{{$editslider->slider_text}}" class="form-control">
              </div>

              <div class="form-group col-md-4">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control" id="image">
              </div>
              <div class="form-group col-md-2">
                <img id="showImage" src="{{(!empty($editslider->image))?url(('upload/sliders_img/').$editslider->image):url('upload/no.jpg')}}" style="width: 150px; height: 160px;border: 1px solid #000;">
              </div>

        			<div class="form-group col-md-6" style="padding-top: 50px;">
        				<input type="submit" value="Update" class="btn btn-primary">
        			</div>
        		</div>
        	</form>
        </div>
      </div>
    </section> 
</div>




@endsection

