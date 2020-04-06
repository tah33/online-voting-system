@extends('layouts.backend.master')
@section('backend.title', $title)

@section('master.content')

    <div class="register-box">
        <div class="register-box-body">
            <p class="login-box-msg">Add Elections</p>
            <form action="{{ url( 'elections') }}" method="post">
                {{ csrf_field() }}

                <label>Election Name</label>
                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    <input type="text" name="name" class="form-control"
                           placeholder="Enter the name of Election category" value="{{old('name')}}">
                    <span class="fa fa-plus form-control-feedback"></span>
                    <span class="text-danger">{{$errors->first('name')}}</span>
                </div>

                <label>Election Date</label>
                <div class="form-group has-feedback {{ $errors->has('election_date') ? 'has-error' : '' }}">
                    <input type="text" name="election_date" class="form-control datepicker" placeholder="Enter the Election Date"
                           value="{{old('election_date')}}">
                    <span class="fa fa-calendar form-control-feedback"></span>
                    <span class="text-danger">{{$errors->first('election_date')}}</span>
                </div>

                <label>Start of Apply Date</label>
                <div class="form-group has-feedback {{ $errors->has('start_date') ? 'has-error' : '' }}">
                    <input type="text" name="start_date" class="form-control datepicker" placeholder="Enter the Apply Starting Date"
                           value="{{old('start_date')}}">
                    <span class="fa fa-calendar-check-o form-control-feedback"></span>
                    <span class="text-danger">{{$errors->first('start_date')}}</span>
                </div>

                <label>End of Apply Date</label>
                <div class="form-group has-feedback {{ $errors->has('end_date') ? 'has-error' : '' }}">
                    <input type="text" name="end_date" class="form-control datepicker" placeholder="Enter the Apply Ending Date"
                           value="{{old('end_date')}}">
                    <span class="fa fa-calendar-minus-o form-control-feedback"></span>
                    <span class="text-danger">{{$errors->first('end_date')}}</span>
                </div>
                <input type="submit" value="Save" class="btn btn-success">
            </form>
        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
@stop
