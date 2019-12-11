@extends('layouts.base')
@push('backend.css')
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/login.css')}}">
    <link rel="shortcut icon" href="{{ asset('icons/login.png') }}"/>
@endpush
<div class="main"> 
            <div id='frame' style="margin-left: -150px">
                <div class='search'><h1>Reset Password</h1>
                    <form method="POST" action="{{url('emails',$student->id)}}">
                        @csrf
                        @method('put')
                        <div class="content">
                            <div class="form-group row">
                                <div class="col-md-8">
                                    <input id="password" type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           value="{{old('password')}}" name="password" placeholder="Enter Password">
                                    @if ($errors->has('password'))
                                        <span style="color: red" class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    <input id="password" type="password"
                                           class="form-control"
                                           name="password_confirmation" placeholder="Confirm password">
                                </div>
                            </div>
                            <button type="submit"  class="btn btn-primary">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
</div></div>