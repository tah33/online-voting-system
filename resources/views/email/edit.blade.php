@extends('layouts.backend.base')
@section('base.content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{url('/')}}"><b>BANK</b>ATM</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Change Password</p>

            <form action="{{url('emails/'.$user->id)}}" method="post">@csrf
                @method('put')
                <div class="form-group has-feedback">
                    <input type="password" value="{{old('password')}}" name="password" class="form-control" placeholder="Enter Password">
                    <span class="fa fa-lock form-control-feedback"></span>
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                </div>

                <div class="form-group has-feedback">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                    <span class="fa fa-lock form-control-feedback"></span>
                </div>

                <div class="row">
                    <div class="col-xs-6">
                        {{--<div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>--}}
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Change Password</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
    @include('email.modal')
@endsection
