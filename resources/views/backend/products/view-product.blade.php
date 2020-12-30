@extends('backend.layouts.master')
@section('content')

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3>View Product
              <a class="btn btn-success float-right btn-sm" href="{{route('products.add')}}"><i class="fa fa-plus-circle">Add Product</i></a>
          </h3>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped" width="100%">
            <thead>
              <tr>
                <th width="4%">SL.</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Image</th>
                <th width="14%">Action</th>
              </tr>
            </thead>
            <tbody>
              <div></div>
              @foreach($alldata as $key=> $product)
              <tr class="{{$product->id}}">
                <td>{{$key+1}}</td>
                <td>{{$product['category']['name']}}</td>
                <td>{{$product['brand']['name']}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}<strong>.Tk</strong></td>
                <td>
                  <img src="{{(!empty($product->image))?url(('upload/product_img/').$product->image):url('upload/no.jpg')}}" style="width:50px; height: 60px;border: 1px solid #000;"></td>
                <td>
                  <a title="edit" class="btn btn-sm btn-primary" href="{{route('products.edit',$product->id)}}">
                    <i class="fa fa-edit"></i>
                  </a>
                  <a title="details" class="btn btn-sm btn-success" href="{{route('products.details',$product->id)}}">
                    <i class="fa fa-eye"></i>
                  </a>
                   <a id="delete" title="delete" class="btn btn-sm btn-danger delete" href="{{route('products.delete')}}" data-token="{{csrf_token()}}" data-id="{{$product->id}}">
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