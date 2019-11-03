@extends('adminlte::page')
@section('content')
    @if ($message = Session::get('error'))
        <div class="alert alert-error alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <div class="register-box">
        <div class="register-box-body">
            <p class="login-box-msg">Edit Password</p>
            <form action="{{ url( 'update-password',$user->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group has-feedback {{ $errors->has('old') ? 'has-error' : '' }}">
                    <input type="password" name="old" class="form-control" placeholder="Current Password">
                    <span class="glyphicon glyphicon-eye-close form-control-feedback"></span>
                    @if ($errors->has('old'))
                        <span class="help-block">
                            <strong>{{ $errors->first('old') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" name="password" class="form-control" placeholder="New Password">
                    <span class="glyphicon glyphicon-eye-close form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                    <span class="glyphicon glyphicon-eye-close form-control-feedback"></span>
                </div>

                <input type="submit" value="Update Password" class="btn btn-success">
            </form>
        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
@stop
