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
          <h3>
            @if(isset($editdata))
            Edit Product
            @else
            Add Product
            @endif
            <a class="btn btn-success float-right btn-sm" href="{{route('products.view')}}"><i class="fa fa-list">Product List</i></a> 
         </h3>
        </div>
        <div class="card-body">
          <form action="{{(@$editdata)?route('products.update',$editdata->id) :route('products.store')}}" method="post" id="From_id" enctype="multipart/form-data">
            @csrf
            <div class="form-row">

              <div class="form-grop col-md-4">
                <label>Category</label>
                <select name="category_id" class="form-control select2">
                  <option value="">Select Category</option>
                @foreach($categories as $category)
                  <option value="{{$category->id}}" {{(@$editdata->category_id == $category->id)?"selected":""}} >{{$category->name}}</option>
                @endforeach
                </select>
              </div>

              <div class="form-grop col-md-4">
                <label>Brand</label>
                <select name="brand_id" class="form-control select2">
                  <option value="">Select Brand</option>
                @foreach($brands as $brand)
                  <option value="{{$brand->id}}" {{(@$editdata->brand_id==$brand->id)?"selected":""}}>{{$brand->name}}</option>
                @endforeach
                </select>
              </div>

              <div class="form-group col-md-4">
                <label>Product Name</label>
                <input type="text" name="name" class="form-control form-control-sm" value="{{@$editdata->name}}" placeholder="Product Name">
                <font style="color:red;">{{($errors->has('name'))?($errors->first('name')):''}}</font> 
              </div>

              <div class="form-grop col-md-6">
                <label>Color</label>
                <select name="color_id[]" class="form-control select2" multiple >
                @foreach($colors as $color)
                  <option value="{{$color->id}}" {{(@in_array(['color_id'=>$color->id],$color_array))?"selected":""}}>{{$color->name}}</option>
                @endforeach
                </select>
                <font style="color:red;">{{($errors->has('color_id'))?($errors->first('color_id')):''}}</font> 
              </div>

              <div class="form-grop col-md-6">
                <label>Size</label>
                <select name="size_id[]" class="form-control select2" multiple >
                @foreach($sizes as $size)
                  <option value="{{$size->id}}" {{(@in_array(['size_id'=>$size->id],$size_array))?"selected":""}}>{{$size->name}}</option>
                @endforeach
                </select>
                <font style="color:red;">{{($errors->has('size_id'))?($errors->first('size_id')):''}}</font> 
              </div>

              <div class="form-group col-md-12">
                <label>Title</label>
                  <textarea name="title" class="form-control form-control-sm" placeholder="Title">{{@$editdata->title}}</textarea>
                  <font style="color:red;">{{($errors->has('title'))?($errors->first('title')):''}}</font>
              </div>

              <div class="form-group col-md-12">
                <label>Description</label>
                  <textarea name="desc" rows="3" class="form-control form-control-sm" placeholder="Description">{{@$editdata->desc}}</textarea>
                   <font style="color:red;">{{($errors->has('desc'))?($errors->first('desc')):''}}</font>
              </div>

              <div class="form-group col-md-3">
                <label>Price</label>
                <input type="text" name="price" class="form-control form-control-sm" value="{{@$editdata->price}}" placeholder="Price">
                <font style="color:red;">{{($errors->has('price'))?($errors->first('price')):''}}</font> 
              </div>

              <div class="form-group col-md-3">
                <label>Image</label>
                <input type="file" name="image" id="image" class="form-control">
              </div>

              <div class="form-group col-md-3">
                <img id="showImage" src="{{(!empty($editdata->image))?url(('upload/product_img/').$editdata->image):url('upload/no.jpg')}}" style="width:90px; height: 100px;border: 1px solid #000;">
              </div>

              <div class="form-group col-md-3">
                <label>Sub Image</label>
                <input type="file" name="sub_image[]" id="sub_image" class="form-control" multiple>
              </div>

              <div class="form-group col-md-12" style="padding-top: 5px;">
                <button type="submit" class="btn btn-primary">{{(@$editdata)?"Update":"Submit"}}</button>
              </div>

            </div>
          </form>
        </div>
      </div>
    </section> 
</div>


<!-- Validation select2 class uses -->
<script type="text/javascript">
  $(document).ready(function(){
    $("#From_id").validate({
      ignore:[],
      errorPlacement: function(error, element){
        if(element.attr("name") == "category_id") {error.insertAfter(element.next());}
        else if(element.attr("name") == "brand_id") {error.insertAfter(element.next());}
        else if(element.attr("name") == "name") {error.insertAfter(element.next());}
        else if(element.attr("name") == "price") {error.insertAfter(element.next());}
          else{error.insertAfter(element);}
      },
      errorClass:'text-danger',
      validClass:'text-success',
      rules:{
        category_id:{
          required:true,
        },
        brand_id:{
          required:true,
        },
        name:{
          required:true,
        },
        price:{
          required:true,
        },
      },

      messages:{
      },
    });
  });
</script>

@endsection

