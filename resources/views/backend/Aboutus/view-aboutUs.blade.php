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
          <h3>View AboutUs
              <a class="btn btn-success float-right btn-sm" href="{{route('aboutus.add')}}"><i class="fa fa-plus-circle">Add AboutUs</i></a>
          </h3>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>SL.</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody>
              <div></div>
              @foreach($alldata as $key=>$aboutUs)
              <tr class="{{$aboutUs->id}}">
                <td>{{$key+1}}</td>
                <td>{{$aboutUs->description}}</td>
                <td>
                  <a title="edit" class="btn btn-sm btn-primary" href="{{route('aboutus.edit',$aboutUs->id)}}">
                    <i class="fa fa-edit"></i>
                  </a>
                  <br>
                  <br>
                   <a id="delete" title="delete" class="btn btn-sm btn-danger" href="{{route('aboutus.delete')}}" data-token="{{csrf_token()}}" data-id="{{$aboutUs->id}}">
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