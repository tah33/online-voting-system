<!DOCTYPE HTML>

<html>
    <head>
    <title>Login V1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="login_components/images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login_components/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login_components/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login_components/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="login_components/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login_components/vendor/select2/select2.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login_components/css/util.css">
    <link rel="stylesheet" type="text/css" href="login_components/css/main.css">
<!--===============================================================================================-->
</head>
    <body>
<div class="limiter">
<div class="container-login100">
<div class="wrap-login100">
<div class="login100-pic js-tilt" data-tilt>
<img src="login_components/images/img-01.png" alt="IMG">
</div>
<form class="login100-form validate-form" action="{{route('login')}}" method="post">
    @csrf
<span class="login100-form-title">
Login
</span>
<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
<input class="input100" type="text" name="email" placeholder="Email">
  @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
<span class="focus-input100"></span>
<span class="symbol-input100">
<i class="fa fa-envelope" aria-hidden="true"></i>
</span>
</div>
<div class="wrap-input100 validate-input" data-validate="Password is required">
<input class="input100" type="password" name="password" placeholder="Password">
  @if ($errors->has('password'))
                        <span class="help-block">
                            <strong style="font-color : red">{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
<span class="focus-input100"></span>
<span class="symbol-input100">
<i class="fa fa-lock" aria-hidden="true"></i>
</span>
</div>
<div class="container-login100-form-btn">
<button class="login100-form-btn">
Login
</button>
</div>
<div class="text-center p-t-12">
<span style="font-size: 20px" class="txt1">
Go to
</span>
<a style="font-size: 20px" class="txt2" href="{{url('/')}}">
Home
</a>
</div>
<div class="text-center p-t-136">
<a class="txt2" href="#">
Create your Account
<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
</a>
</div>
</form>
</div>
</div>
</div>
<!--===============================================================================================-->  
    <script src="login_components/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="login_components/vendor/bootstrap/js/popper.js"></script>
    <script src="login_components/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="login_components/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="login_components/vendor/tilt/tilt.jquery.min.js"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
<!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>
</html>