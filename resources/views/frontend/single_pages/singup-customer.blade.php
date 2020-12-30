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
			Csutomer Register
		</h2>
	</section>

	<div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form method="post" action="{{route('signup.store')}}" id="login-form" class="form">
                        @csrf
                            <h3 class="text-center text-info">Sign Up</h3>
                            <div class="form-group">
                                <label class="text-info">Full Name:</label><br>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Your Name">
                                <font style="color:red;">
                                    {{($errors->has('name'))?($errors->first('name')):''}}
                                </font>
                            </div>
                            <div class="form-group">
                                <label class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control" placeholder="example@gamil.com">
                                <font style="color:red;">
                                    {{($errors->has('email'))?($errors->first('email')):''}}
                                </font>
                            </div>
                            <div class="form-group">
                                <label class="text-info">Phone:</label><br>
                                <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Format:01xxxxxxxxx">
                                <font style="color:red;">
                                {{($errors->has('mobile'))?($errors->first('mobile')):''}}
                                </font>
                            </div>
                            <div class="form-group">
                                <label class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                 <font style="color:red;">
                                    {{($errors->has('password'))?($errors->first('password')):''}}
                                </font>
                            </div>
                            <div class="form-group">
                                <label class="text-info">Confirm Password:</label><br>
                                <input type="password" name="confrim_password" id="confrim_password" class="form-control" placeholder="Confirm Password">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="login" class="btn btn-info btn-md" value="Login">
                            </div>
                            <div id="singup" class="text-right">
                                <a href="{{route('login.customer')}}" class="text-info">Already Sign UP</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#login-form').validate({
      rules:{
       name:{
          required:true,
        },
         email:{
          required:true,
          email:true,
        },
        mobile:{
            required:true,
        },
        password:{
          required:true,
          minlength:9,
        },
        confrim_password:{
          required:true,
          equalTo: '#password'
        }
      },

      messages:{
        name:{
          required: 'Please Enter Your Full Name',
        },
        email:{
          required: 'Please Enter Your Email',
          email: 'Please Enter <em> valid</em> Email',
        },
        mobile:{
          required: 'Please Enter Your Mobile Number',
        },
         password:{
          required: 'Please Enter Password',
          minlength: 'Password Minimum 9 Number Or Char',
        },
        confrim_password:{
          required: 'Confirm Password',
          minlength:'Password Minimum 9 Number Or Char',
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