@extends('frontend.layouts.master')
@section('content')

<style type="text/css">
#login .container #login-row #login-column #login-box {
	max-width: 600px;
	border: 1px solid #9C9C9C;
	background-color: #EAEAEA;
	margin-bottom: 50px;
	margin-top: 50px;
}
#login .container #login-row #login-column #login-box #login-form {
	padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
	margin-top: -85px;
}
</style>

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('frontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Login Varification Form
		</h2>
	</section>

	<div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form method="post" action="{{route('varify.store')}}" id="verify_email" class="form">
                        @csrf
                            <h3 class="text-center text-info">Email varification</h3>
                            <div class="form-group">
                                <label class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control" placeholder="example@gamil.com">
                                <font style="color:red;">
                                    {{($errors->has('email'))?($errors->first('email')):''}}
                                </font>
                            </div>
                            <div class="form-group">
                                <label class="text-info">Varification Code:</label><br>
                                <input type="text" name="code" id="code" class="form-control" placeholder="code: XXXX">
                                <font style="color:red;">
                                    {{($errors->has('code'))?($errors->first('code')):''}}
                                </font>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script type="text/javascript">
  $(document).ready(function(){
    $('#verify_email').validate({
      rules:{
         email:{
          required:true,
          email:true,
        },
        code:{
            required:true,
        }
      },

      messages:{
        email:{
          required: 'Please Enter Your Email',
          email: 'Please Enter <em> valid</em> Email',
        },
        code:{
          required: 'Please Submit Your Varification Code',
        }
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