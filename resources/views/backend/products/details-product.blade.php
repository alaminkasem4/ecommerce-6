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
          <h3>product Details 
              <a class="btn btn-success float-right btn-sm" href="{{route('products.view')}}"><i class="fa fa-plus-circle">List Product</i></a>
          </h3>
        </div>
        <div class="card-body">
          <table class="table table-sm table-bordered table-striped" width="100%">
            <tbody>
            	<tr>
            		<td width="40%"><strong>Category Name:</strong></td>
            		<td width="60%">{{$details['category']['name']}}</td>
            	</tr>
            	<tr>
            		<td width="40%"><strong>Brand Name:</strong></td>
            		<td width="60%">{{$details['brand']['name']}}</td>
            	</tr>
            	<tr>
            		<td width="40%"><strong>Product Name:</strong></td>
            		<td width="60%">{{$details->name}}</td>
            	</tr>
            	<tr>
            		<td width="40%"><strong>Product Price:</strong></td>
            		<td width="60%">{{$details->price}}<strong>.Tk</strong></td>
            	</tr>
            	<tr>
            		<td width="40%"><strong>Title:</strong></td>
            		<td width="60%">{{$details->title}}</td>
            	</tr>
            	<tr>
            		<td width="40%"><strong>Description:</strong></td>
            		<td width="60%">{{$details->desc}}</td>
            	</tr>
            	<tr>
            		<td width="40%"><strong>Image:</strong></td>
            		<td width="60%">
                  		<img src="{{(!empty($details->image))?url(('upload/product_img/').$details->image):url('upload/no.jpg')}}" style="width:80px; height: 90px;border: 1px solid #000;"></td>
                	<td>
            	</tr>
            	<tr>
            		<td width="40%"><strong>Color:</strong></td>
            		<td width="60%">
            			@php
            				$colors = App\Model\ProductColor::where('product_id',$details->id)->get();
            			@endphp
            			@foreach($colors as $value)
            				{{$value['color']['name']}},
            			@endforeach
            		</td>
            	</tr>
            	<tr>
            		<td width="40%"><strong>Size:</strong></td>
            		<td width="60%">
            			@php
            				$sizes = App\Model\ProductSize::where('product_id',$details->id)->get();
            			@endphp
            			@foreach($sizes as $value)
            				{{$value['size']['name']}},
            			@endforeach
            		</td>
            	</tr>
            	<tr>
            		<td width="40%"><strong>Sub Image:</strong></td>
            		<td width="60%">
            			@php
            				$subimgs = App\Model\ProductSubImage::where('product_id',$details->id)->get();
            			@endphp
            			@foreach($subimgs as $img)
            				<img src="{{url('upload/product_img/product_sub_img/'.$img->sub_image)}}" style="width:80px; height: 90px;border: 1px solid #000;">
            			@endforeach
            		</td>
            	</tr>
           </tbody>
          </table>
        </div>
      </div>
    </section> 
</div>

@endsection