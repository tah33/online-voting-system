@extends('layouts.app')
@section('content')
<div class="register-box">
        <div class="register-box-body">
            <p class="login-box-msg">Add Elections</p>
            <form action="{{ url( 'elections') }}" method="post">
                {{ csrf_field() }}

                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    <input type="text" name="name" class="form-control" placeholder="Enter the name of Election category"> 
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('start_date') ? 'has-error' : '' }}">
                    <input type="date" name="start_date" class="form-control" placeholder="Enter the Starting Date"> 
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('start_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('start_date') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('end_date') ? 'has-error' : '' }}">
                    <input type="date" name="end_date" class="form-control" placeholder="Enter the Ending Date"> 
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('end_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('end_date') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('election_date') ? 'has-error' : '' }}">
                    <input type="date" name="election_date" class="form-control" placeholder="Enter the Ending Date"> 
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('election_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('election_date') }}</strong>
                        </span>
                    @endif
                </div>
                <input type="submit" value="Save" class="btn btn-success">
            </form>
        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
    @stop
