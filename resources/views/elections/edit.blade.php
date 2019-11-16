@extends('layouts.app')
@section('content')
<div class="register-box">
        <div class="register-box-body">
            <p class="login-box-msg">Edit Election Info</p>
            <form action="{{ url( 'elections',$election->id) }}" method="post">
                {{ csrf_field() }}
                @method('put')
                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    <input type="text" name="name" class="form-control" placeholder="Enter the name of Election category" value="{{$election->name}}"> 
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('start_time') ? 'has-error' : '' }}">
                    <input type="date" name="start_time" class="form-control" placeholder="Enter the Starting Date" value="{{$election->start_date}}> 
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('start_time'))
                        <span class="help-block">
                            <strong>{{ $errors->first('start_time') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('end_time') ? 'has-error' : '' }}">
                    <input type="date" name="end_time" class="form-control" placeholder="Enter the Ending Date" value="{{$election->end_date}}> 
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('end_time'))
                        <span class="help-block">
                            <strong>{{ $errors->first('end_time') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('election_date') ? 'has-error' : '' }}">
                    <input type="date" name="election_date" class="form-control" placeholder="Enter the Ending Date" value="{{$election->election_date}}"> 
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
