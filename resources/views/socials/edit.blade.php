@extends('layouts.backend.master')
@section('backend.title', $title)

@section('master.content')
    <div class="register-box">
        <div class="register-box-body">
            <p class="login-box-msg">Edit Election Info</p>
            <form action="{{ url( 'socials',$social->id) }}" method="post">
                {{ csrf_field() }}
                @method('put')

                <label>Organization Name</label>
                <div class="form-group has-feedback {{ $errors->has('org_name') ? 'has-error' : '' }}">
                    <input type="text" name="org_name" class="form-control"
                           placeholder="Enter the name of Election category" value="{{$social->organization_name}}">
                    <span class="fa fa-plus form-control-feedback"></span>
                    <span class="text-danger">{{$errors->first('org_name')}}</span>
                </div>

                <label>Title</label>
                <div class="form-group has-feedback {{ $errors->has('title') ? 'has-error' : '' }}">
                    <input type="text" name="title" class="form-control" placeholder="Enter the Title of Your Position"
                           value="{{$social->title}}">
                    <span class="fa fa-user form-control-feedback"></span>
                    <span class="text-danger">{{$errors->first('title')}}</span>
                </div>

                <label>Describe</label>
                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <textarea name="description" class="form-control" id="" cols="30" rows="10" placeholder="Describe Your Duties...">{{$social->description }}</textarea>
                    <span class="text-danger">{{$errors->first('description')}}</span>
                </div>

                <input type="submit" value="Save" class="btn btn-success">
            </form>
        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
@stop
