@extends('layouts.backend.master')
@section('backend.title', $title)

@section('master.content')
    <div class="register-box">
        <div class="register-box-body">
            <p class="login-box-msg">Edit Election Info</p>
            <form action="{{ url( 'elections',$election->id) }}" method="post">
                {{ csrf_field() }}
                @method('put')

                <label for="">Election</label>
                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    <input type="text" name="name" class="form-control"
                           placeholder="Enter the name of Election category" value="{{$election->name}}">
                    <span class="fa fa-plus form-control-feedback"></span>
                    <span class="text-danger">{{$errors->first('name')}}</span>
                </div>

                <label for="">Election Status</label>
                <div class="form-group has-feedback {{ $errors->has('status') ? 'has-error' : '' }}">
                    <select name="status" class="form-control">
                        <option
                            value="{{$election->status}}">{{$election->status == 0 ? 'Inactive' : "Active"}}</option>
                        <option
                            value="{{$election->status == 0 ? 1 : 0}}">{{$election->status == 0 ? 'Active' : "Inactive"}}</option>
                    </select>
                    <span class="text-danger">{{$errors->first('status')}}</span>
                </div>

                <label>Election Date</label>
                <div class="form-group has-feedback {{ $errors->has('election_date') ? 'has-error' : '' }}">
                    <input type="date" name="election_date" class="form-control" placeholder="Enter the Ending Date"
                           value="{{$election->election_date}}">
                    <span class="fa fa-calendar form-control-feedback"></span>
                    <span class="text-danger">{{$errors->first('election_date')}}</span>
                </div>

                <label for="">Apply Starting Date</label>
                <div class="form-group has-feedback {{ $errors->has('start_date') ? 'has-error' : '' }}">
                    <input type="date" name="start_date" class="form-control" placeholder="Enter the Ending Date"
                           value="{{$election->start_date}}">
                    <span class="fa fa-calendar-check-o form-control-feedback"></span>
                    <span class="text-danger">{{$errors->first('start_date')}}</span>
                </div>

                <label for="">Apply Ending Date</label>
                <div class="form-group has-feedback {{ $errors->has('end_date') ? 'has-error' : '' }}">
                    <input type="date" name="end_date" class="form-control" placeholder="Enter the Ending Date"
                           value="{{$election->end_date}}">
                    <span class="fa fa-calendar-minus-o form-control-feedback"></span>
                    <span class="text-danger">{{$errors->first('end_date')}}</span>
                </div>

                <input type="submit" value="Save" class="btn btn-success">
            </form>
        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
@stop
