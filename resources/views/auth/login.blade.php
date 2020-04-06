@extends('layouts.backend.base')
@section('base.content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{url('/')}}"><b>BANK</b>ATM</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="{{route('login')}}" method="post">@csrf
                <div class="form-group has-feedback">
                    <input type="email" value="{{old('email')}}" name="email" class="form-control" placeholder="Enter Email">
                    <span class="fa fa-envelope form-control-feedback"></span>
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                </div>

                <div class="row">
                    @if(\Illuminate\Support\Facades\Session::has('msg'))
                        <span class="text-danger">{{\Illuminate\Support\Facades\Session::get('msg')}}</span>
                    @endif
                </div>

                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <span class="fa fa-lock form-control-feedback"></span>
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                </div>

                <div class="row">
                    <div class="col-xs-8">
                        {{--<div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>--}}
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


            <a href="javascript:void(0)" data-target="#modal_reset" data-toggle="modal">I forgot my password</a><br>
            <a href="{{url('register')}}" class="text-center"><i class="fa fa-user-plus"></i> Register a new membership</a><br>
            <a href="{{url('/')}}" class="text-center"><i class="fa fa-home"></i> Go Home</a>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
        @include('email.modal')
@endsection
