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
          <h3>Add Contacts
            <a class="btn btn-success float-right btn-sm" href="{{route('contacts.view')}}"><i class="fa fa-list">Contacts List</i></a> 
         </h3>
        </div>
        <div class="card-body">
          <form action="{{route('contacts.store')}}" method="post" id="From_id" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
            	
     		     <div class="form-group col-md-4">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" id="address" placeholder="Enter Your Address">
              </div>

              <div class="form-group col-md-4">
                <label for="mobile">Mobile</label>
                <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter Your Mobile Number">
              </div>

              <div class="form-group col-md-4">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter Your Email">
              </div>

              <div class="form-group col-md-4">
                <label for="facebook">Facebook</label>
                <input type="text" name="facebook" class="form-control" id="facebook" placeholder="Enter Your Facebook Link">
              </div>

              <div class="form-group col-md-4">
                <label for="twiter">Twiter</label>
                <input type="text" name="twiter" class="form-control" id="twiter" placeholder="Enter Your Twiter link">
              </div>

              <div class="form-group col-md-4">
                <label for="youtube">Youtube</label>
                <input type="text" name="youtube" class="form-control" id="youtube" placeholder="Enter your Youtube Link">
              </div>

              <div class="form-group col-md-4">
                <label for="google_plus">Google Plus</label>
                <input type="text" name="google_plus" class="form-control" id="google_plus" placeholder="Enter your google plus Link">
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

