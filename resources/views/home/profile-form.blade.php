@extends('layouts.app')
@section('content')
<div class="register-box">
        <div class="register-box-body">
            <p class="login-box-msg">Edit Profile</p>
            <form action="{{ url( 'update-profile',$user->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="Enter Name">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('username') ? 'has-error' : '' }}">
                    <input type="text" name="username" class="form-control" value="{{ $user->username }}" placeholder="Enter Username">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" placeholder="Enter Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                @if(Auth::user()->role != 'admin')
                <div class="form-group has-feedback {{ $errors->has('phone') ? 'has-error' : '' }}">
                    <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" placeholder="Enter Phone">
                    <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                    @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('area') ? 'has-error' : '' }}">
                    <select name="area" class="form-control select2">
                        <option value="{{$user->area}}">{{$user->userarea->name}}</option>
                        @foreach($areas as $area)
                        <option value="{{$area->id}}">{{$area->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('area'))
                        <span class="help-block">
                            <strong>{{ $errors->first('area') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('gender') ? 'has-error' : '' }}">
                    <select name="gender" class="form-control">
                        <option value="{{$user->gender}}">{{$user->gender}}</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    @if ($errors->has('gender'))
                        <span class="help-block">
                            <strong>{{ $errors->first('gender') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('dob') ? 'has-error' : '' }}">
                    <input type="date" name="dob" class="form-control" value="{{ $user->dob }}" placeholder="Enter Date of Birth">
                    <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                    @if ($errors->has('dob'))
                        <span class="help-block">
                            <strong>{{ $errors->first('dob') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('image') ? 'has-error' : '' }}">
                    <input type="file" name="image" class="form-control">
                    <span class="glyphicon glyphicon-picture form-control-feedback"></span>
                    @if ($errors->has('image'))
                        <span class="help-block">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    @endif
                </div>
                @if($user->role == 'candidate')
                <div class="panel panel-primary">
                     <div class="panel-heading">Party Info</div>
                 <div class="form-group has-feedback {{ $errors->has('party') ? 'has-error' : '' }}">
                    <input type="party" name="party" class="form-control" value="{{ $user->party->name }}" placeholder="Enter Party Name">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('party'))
                        <span class="help-block">
                            <strong>{{ $errors->first('party') }}</strong>
                        </span>
                    @endif
                </div>
                 <div class="form-group has-feedback {{ $errors->has('symbol_name') ? 'has-error' : '' }}">
                    <input type="text" name="symbol_name" class="form-control" value="{{ $user->party->symbol_name }}" placeholder="Enter Phone">
                    <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                    @if ($errors->has('symbol_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('symbol_name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('symbol') ? 'has-error' : '' }}">
                    <input type="file" name="symbol" class="form-control">
                    <span class="glyphicon glyphicon-picture form-control-feedback"></span>
                    @if ($errors->has('symbol'))
                        <span class="help-block">
                            <strong>{{ $errors->first('symbol') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
                @endif
               @endif
                <input type="submit" value="Update Info" class="btn btn-success">
            </form>
        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
    @stop
