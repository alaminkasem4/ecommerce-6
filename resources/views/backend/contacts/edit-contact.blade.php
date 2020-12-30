@extends('backend.layouts.master')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Contacts</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Contacts</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3>Edit Contacts
            <a class="btn btn-success float-right btn-sm" href="{{route('contacts.view')}}"><i class="fa fa-arrow-left">Go Back</i></a> 
         </h3>
        </div>

        <div class="card-body">
        	<form action="{{route('contacts.update',$editContact->id)}}" method="post" id="From_id" enctype="multipart/form-data">
        		@csrf

              <div class="form-group col-md-4">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" value="{{$editContact->address}}">
              </div>
              <div class="form-group col-md-4">
                <label for="mobile">Mobile</label>
                <input type="text" name="mobile" class="form-control" value="{{$editContact->mobile}}">
              </div>
              <div class="form-group col-md-4">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{$editContact->email}}">
              </div>
              <div class="form-group col-md-4">
                <label for="facebook">Facebook</label>
                <input type="text" name="facebook" class="form-control" value="{{$editContact->facebook}}">
              </div>
              <div class="form-group col-md-4">
                <label for="twiter">Twiter</label>
                <input type="text" name="twiter" class="form-control" value="{{$editContact->twiter}}">
              </div>
              <div class="form-group col-md-4">
                <label for="youtube">Youtube</label>
                <input type="text" name="youtube" class="form-control" value="{{$editContact->youtube}}">
              </div>
              <div class="form-group col-md-4">
                <label for="google_plus">Google Plus</label>
                <input type="text" name="google_plus" class="form-control" value="{{$editContact->google_plus}}">
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

