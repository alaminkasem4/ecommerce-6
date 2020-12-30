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
      	@if($Contact_count<1)
        <div class="card-header">
          <h3>View Contacts
              <a class="btn btn-success float-right btn-sm" href="{{route('contacts.add')}}"><i class="fa fa-plus-circle">Add Contact</i></a>
          </h3>
        </div>
        @endif
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>SL.</th>
                <th>Address</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>facebook</th>
                <th>Twiter</th>
                <th>Youtube</th>
                <th>Google Plus</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <div></div>
              @foreach($alldata as $key=>$contact)
              <tr class="{{$contact->id}}">
                <td>{{$key+1}}</td>
                <td>{{$contact->address}}</td>
                <td>{{$contact->mobile}}</td>
                <td>{{$contact->email}}</td>
                <td>{{$contact->facebook}}</td>
                <td>{{$contact->twiter}}</td>
                <td>{{$contact->youtube}}</td>
                <td>{{$contact->google_plus}}</td>
                <td>
                  <a title="edit" class="btn btn-sm btn-primary" href="{{route('contacts.edit',$contact->id)}}">
                    <i class="fa fa-edit"></i>
                  </a>
                   <a id="delete" title="delete" class="btn btn-sm btn-danger" href="{{route('contacts.delete')}}" data-token="{{csrf_token()}}" data-id="{{$contact->id}}">
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