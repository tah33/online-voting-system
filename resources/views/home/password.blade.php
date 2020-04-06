@extends('layouts.backend.master')
@section('backend.title', $title)

@section('master.content')

    <div class="register-box">
        <div class="register-box-body">
            <p class="login-box-msg">Edit Password</p>
            <form action="{{ url( 'update-password',$user->id) }}" method="post">
                {{ csrf_field() }}

                <div class="form-group has-feedback">
                    <input type="password" name="old" class="form-control" placeholder="Current Password">
                    <span class="fa fa-eye-slash form-control-feedback"></span>
                    <span class="text-danger">{{$errors->first('old')}}</span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="New Password">
                    <span class="fa fa-eye-slash form-control-feedback"></span>
                    <span class="text-danger">{{$errors->first('password')}}</span>
                </div>

                <div class="form-group has-feedback">
                    <input type="password" name="password_confirmation" class="form-control"
                           placeholder="Confirm Password">
                    <span class="glyphicon glyphicon-eye-close form-control-feedback"></span>
                </div>

                <input type="submit" value="Update Password" class="btn btn-primary btn-sm btn-flat">
            </form>
        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
@stop
