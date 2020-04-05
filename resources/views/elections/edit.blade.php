@extends('layouts.backend.master')
@section('backend.title', $title)

@section('master.content')
<div class="register-box">
        <div class="register-box-body">
            <p class="login-box-msg">Edit Election Info</p>
            <form action="{{ url( 'elections',$election->id) }}" method="post">
                {{ csrf_field() }}
                @method('put')
                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    <input type="text" name="name" class="form-control" placeholder="Enter the name of Election category" value="{{$election->name}}">
                    <span class="glyphicon glyphicon-plus form-control-feedback"></span>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('status') ? 'has-error' : '' }}">
                   <select name="status" class="form-control">
                       <option value="{{$election->status}}">{{$election->status == 0 ? 'Inactive' : "Active"}}</option>
                       <option value="{{$election->status == 0 ? 1 : 0}}">{{$election->status == 0 ? 'Active' : "Inactive"}}</option>
                   </select>
                    @if ($errors->has('status'))
                        <span class="help-block">
                            <strong>{{ $errors->first('status') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('election_date') ? 'has-error' : '' }}">Election Date
                    <input type="date" name="election_date" class="form-control" placeholder="Enter the Ending Date" value="{{$election->election_date}}">
                    <span class="glyphicon glyphicon-time form-control-feedback"></span>
                    @if ($errors->has('election_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('election_date') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('start_date') ? 'has-error' : '' }}">Apply Starting Date
                    <input type="date" name="start_date" class="form-control" placeholder="Enter the Ending Date" value="{{$election->start_date}}">
                    <span class="glyphicon glyphicon-time form-control-feedback"></span>
                    @if ($errors->has('start_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('start_date') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('end_date') ? 'has-error' : '' }}">Apply Ending Date
                    <input type="date" name="end_date" class="form-control" placeholder="Enter the Ending Date" value="{{$election->end_date}}">
                    <span class="glyphicon glyphicon-time form-control-feedback"></span>
                    @if ($errors->has('end_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('end_date') }}</strong>
                        </span>
                    @endif
                </div>
                <input type="submit" value="Save" class="btn btn-success">
            </form>
        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
    @stop
