@extends('layouts.backend.master')
@section('backend.title', $title)

@section('master.content')
    <div class="row">
            <div class="register-box">
                <div class="register-box-body">
                    <p class="login-box-msg">Edit Profile</p>
                    <form action="{{ url( 'update-profile',$user->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                            <input type="text" name="name" class="form-control" value="{{ $user->name ? $user->name : old('name') }}"
                                   placeholder="Enter Name">
                            <span class="fa fa-user form-control-feedback"></span>
                            <span class="text-danger">{{$errors->first('name')}}</span>
                        </div>

                        <div class="form-group has-feedback {{ $errors->has('username') ? 'has-error' : '' }}">
                            <input type="text" name="username" class="form-control" value="{{ $user->username ? $user->username : old('username') }}"
                                   placeholder="Enter Username">
                            <span class="fa fa-user form-control-feedback"></span>
                            <span class="text-danger">{{$errors->first('username')}}</span>

                        </div>

                        <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                            <input type="email" name="email" class="form-control" value="{{ $user->email ? $user->email : old('email') }}"
                                   placeholder="Enter Email">
                            <span class="fa fa-envelope form-control-feedback"></span>
                            <span class="text-danger">{{$errors->first('email')}}</span>

                        </div>

                        @if(Auth::user()->role != 'admin')
                            <div class="form-group has-feedback {{ $errors->has('phone') ? 'has-error' : '' }}">
                                <input type="text" name="phone" class="form-control" value="{{ $user->phone ? $user->phone : old('phone')  }}"
                                       placeholder="Enter Phone">
                                <span class="fa fa-phone form-control-feedback"></span>
                                <span class="text-danger">{{$errors->first('phone')}}</span>

                            </div>

                            <div class="form-group has-feedback {{ $errors->has('gender') ? 'has-error' : '' }}">
                                <select name="gender" id=""
                                        class="form-control">
                                    @if(empty($user->gender))
                                        <option value="">Select Gender</option>
                                    @else
                                        <option value="{{$user->gender}}">{{$user->gender}}</option>
                                    @endif
                                    @if(empty($user->gender))
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    @elseif($user->gender == 'male')
                                        <option value="female">Female</option>
                                    @elseif($user->gender == 'female')
                                        <option value="male">Male</option>
                                    @endif
                                </select>
                                <span class="text-danger">{{$errors->first('gender')}}</span>
                            </div>

                            <div class="form-group has-feedback {{ $errors->has('dob') ? 'has-error' : '' }}">
                                <input type="text" name="dob" class="datepicker form-control" value="{{ $user->dob ? $user->dob : old('dob') }}"
                                       placeholder="Enter Date of Birth">
                                <span class="fa fa-calendar form-control-feedback"></span>
                                <span class="text-danger">{{$errors->first('dob')}}</span>
                            </div>

                            <div class="form-group has-feedback {{ $errors->has('image') ? 'has-error' : '' }}">
                                <input type="file" name="image" class="form-control">
                                <span class="fa fa-image form-control-feedback"></span>
                                <span class="text-danger">{{$errors->first('image')}}</span>
                            </div>

                            @if($user->role == 'candidate')

                                <div class="panel panel-primary" style="padding: 10px">
                                    <div class="panel-heading" >Party Info</div>

                                    <div class="form-group has-feedback {{ $errors->has('party') ? 'has-error' : '' }}" >
                                        <input type="party" name="party" class="form-control"
                                               value="{{$user->party ? $user->party->name : old('party')}}"
                                               placeholder="Enter Party Name">
                                        <span class="fa fa-user form-control-feedback"></span>
                                        <span class="text-danger">{{$errors->first('party')}}</span>
                                    </div>

                                    <div
                                        class="form-group has-feedback {{ $errors->has('symbol_name') ? 'has-error' : '' }}">
                                        <input type="text" name="symbol_name" class="form-control"
                                               value="{{$user->party ?  $user->party->symbol_name : old('symbol_name')}}"
                                               placeholder="Enter Party Symobol Name">
                                        <span class="fa fa-asterisk form-control-feedback"></span>
                                        <span class="text-danger">{{$errors->first('symbol_name')}}</span>
                                    </div>

                                    <div
                                        class="form-group has-feedback {{ $errors->has('symbol') ? 'has-error' : '' }}">
                                        <input type="file" name="symbol" class="form-control">
                                        <span class="fa fa-image form-control-feedback"></span>
                                        <span class="text-danger">{{$errors->first('symbol')}}</span>
                                    </div>

                                </div>
                            @endif
                        @endif
                        <input type="submit" value="Update Info" class="btn btn-success">
                    </form>
                </div>
                <!-- /.form-box -->
            </div><!-- /.register-box -->
        </div>
@stop
