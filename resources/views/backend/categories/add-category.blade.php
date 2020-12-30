@extends('backend.layouts.master')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3>
            @if(isset($editCategory))
            Edit Category
            @else
            Add Category
            @endif
            <a class="btn btn-success float-right btn-sm" href="{{route('aboutus.view')}}"><i class="fa fa-list">Category List</i></a> 
         </h3>
        </div>
        <div class="card-body">
          <form action="{{(@$editCategory)?route('categories.update',$editCategory->id) :route('categories.store')}}" method="post" id="From_id" enctype="multipart/form-data">
            @csrf
            <div class="form-row">

              <div class="form-group col-md-8">
                <label>Category Name<strong style="color:red;">*</strong></label>
                <input type="text" name="name" class="form-control" value="{{@$editCategory->name}}" placeholder="Category Name">
                <font style="color:red;">{{($errors->has('name'))?($errors->first('name')):''}}</font> 
              </div>

              <div class="form-group col-md-6" style="padding-top: 5px;">
                <button type="submit" class="btn btn-primary">{{(@$editCategory)?"Update":"Submit"}}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section> 
</div>


<script type="text/javascript">
  $(document).ready(function(){
    $('#From_id').validate({
      rules:{
        name:{
          required:true,
        }
     },

      messages:{
        
      },
      errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
    });
  });
</script>


@endsection

