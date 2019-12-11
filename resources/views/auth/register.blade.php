<!DOCTYPE HTML>

<html>

<head>
    <title>Registration</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="login_components/images/icons/favicon.ico" />
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
                <form class="login100-form" action="{{route('register')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <span class="login100-form-title">
                        Registration
                    </span>
                    <div class="wrap-input100">
                        <input class="input100" type="text" name="name" placeholder="Name" value="{{old('name')}}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="wrap-input100">
                        <input class="input100" type="text" name="username" placeholder="Username"
                            value="{{old('username')}}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                        @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="wrap-input100">
                        <input class="input100" type="text" name="email" placeholder="Email" value="{{old('email')}}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="wrap-input100">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong style="font-color : red">{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="wrap-input100">
                        <input class="input100" type="password" name="password_confirmation"
                            placeholder="Confirm Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100">
                        <input class="input100" type="number" name="nid" placeholder="NID" value="{{old('nid')}}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                        @if ($errors->has('nid'))
                        <span class="help-block">
                            <strong style="font-color : red">{{ $errors->first('nid') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="wrap-input100">
                        <input class="input100" type="date" name="dob" placeholder="Date of Birth"
                            value="{{old('dob')}}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                        @if ($errors->has('dob'))
                        <span class="help-block">
                            <strong style="font-color : red">{{ $errors->first('dob') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="wrap-input100">
                        <select name="gender" class="input100">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                        @if ($errors->has('gender'))
                        <span class="help-block">
                            <strong style="color : red">{{ $errors->first('gender') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="wrap-input100">
                        <select name="role" class="input100 role"
                            onchange="choiceSelected('role', this.selectedIndex);">
                            <option>Registered As</option>
                            <option value="voter">Voter</option>
                            <option value="candidate">Candidate</option>
                        </select>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                        @if ($errors->has('role'))
                        <span class="help-block">
                            <strong style="font-color : red">{{ $errors->first('role') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="candidate" style="display: none">
                        <div class="wrap-input100">
                            <input class="input100" type="text" name="party" placeholder="Name"
                                value="{{old('party')}}">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                            @if ($errors->has('party'))
                            <span class="help-block">
                                <strong>{{ $errors->first('party') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="wrap-input100 validate-input">
                            <input type="file" name="symbol" placeholder="Image">

                            @if ($errors->has('symbol'))
                            <span class="help-block">
                                <strong style="font-color : red">{{ $errors->first('symbol') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="wrap-input100">
                            <input class="input100" type="text" name="symbol_name" placeholder="Symbol Name"
                                value="{{old('symbol_name')}}">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                            @if ($errors->has('symbol_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('symbol_name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="wrap-input100">
                        <input class="input100" type="tel" name="phone" placeholder="Phone" value="{{old('phone')}}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                        @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong style="font-color : red">{{ $errors->first('phone') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="wrap-input100">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                        <select name="area" class="input100 select2">
                            <option>Choose Area</option>
                            @foreach($areas as $area)
                            <option value="{{$area->id}}">{{$area->name}}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('area'))
                        <span class="help-block">
                            <strong style="font-color : red">{{ $errors->first('area') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="wrap-input100">
                        <input type="file" name="image" placeholder="Image">

                        @if ($errors->has('image'))
                        <span class="help-block">
                            <strong style="font-color : red">{{ $errors->first('image') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Create Account
                        </button>
                    </div>
                    <div class="text-center">
                        <a class="txt2" href="#">
                            Already Registered ? <a href="{{route('login')}}">Log in Here</a>
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                    
                    <div class="text-center p-t-12">
                        <span style="font-size: 20px" class="txt1">
                            Go to
                        </span>
                        <a style="font-size: 20px" class="txt2" href="{{url('/')}}">
                            Home
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
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
        $(".select2").select2();
        $('.role').on('change', function () {
            if ($(".role").val() === "candidate") {
                $(".candidate").show()
            } else {
                $(".candidate").hide()
            }
        });
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>