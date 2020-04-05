@extends('layouts.backend.master')
@section('backend.title', $title)

@section('master.content')
@if($user->role == 'admin')
<div class="col-md-6">
        <div class="box box-primary">
                <caption>User Profile</caption>
<center>

        <div class="card" style="width: 30rem;">
                <img class="card-img-top" width="50%" src="{{asset('images/avatar.png')}}" class="img-circle">
            <div class="card-body">
                <h5 class="card-title">{{$user->name}} Profile</h5>
            </div>
            <ul class="list-group list-group-flush ul">
                <li class="list-group-item">Name : {{$user->name}}</li>
                <li class="list-group-item">Email : {{$user->email}}</li>
                <li class="list-group-item">UserName : {{$user->username}}</li>
                <li class="list-group-item">NID : {{$user->nid}}</li>
                <li class="list-group-item">Role : {{$user->role}}</li>
                </li>
            </ul>
                <div class="card-body">
                    <a href="{{url('edit-profile/'.$user->id)}}" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
</center>
@endif
@if($user->role !='admin')
<div id="ams-class">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{url('images/'.$user->image)}}" alt="User profile picture">

                        <h3 class="profile-username text-center">{{ $user->name }}</h3>

                        <p class="text-muted text-center">{{ $user->email }}</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Username</b> <a class="pull-right">{{ $user->username }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Phone</b> <a class="pull-right">{{ $user->phone }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Date of Birth</b> <a class="pull-right">{{ $user->dob }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Actor</b> <a class="pull-right">{{ $user->role }}</a>
                            </li>
                        </ul>
                        <a href="{{'edit-profile/'.$user->id}}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab" data-toggle="tab">About</a></li>
                            @if($user->role == 'candidate')
                        <li><a href="#tab1" data-toggle="tab">Party</a></li>
                        @endif
                    </ul>
                    <div class="tab-content">

                        <!-- /.tab-pane -->

                        <div class="tab-pane active" id="tab">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-5">
                                        <div class="card">
                                            <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                               <b>NID</b> <a class="pull-right">{{$user->nid}}</a>
                            </li>
                            <li class="list-group-item">
                               <b>Gender</b> <a class="pull-right">{{$user->gender}}</a>
                            </li>
                            <li class="list-group-item">
                               <b>Area</b> <a class="pull-right">{{$user->userArea->name}}</a>
                            </li>
                            <li class="list-group-item">
                               <b>Age</b> <a class="pull-right">{{Carbon\Carbon::createFromDate($user->dob)->diff(Carbon\Carbon::now())->format('%y years')}}</a>
                            </li>
                        </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                            @if($user->role == 'candidate')

                        <div class="tab-pane" id="tab1">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-5">
                                        <div class="card">
                                            <ul class="list-group list-group-unbordered">

                            <li class="list-group-item">
                               <b>Party</b> <a class="pull-right">{{$user->party->name}}</a>
                            </li>
                            <li class="list-group-item">
                               <b>Symbol Name</b> <a class="pull-right">{{$user->party->symbol_name}}</a>
                            </li>
                            <li class="list-group-item"><b>Symbol</b>
                            <img class="card-img-top" width="50%" src="{{asset('images/'.$user->party->symbol)}}" class="img-circle">
                        </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endif

                    </div>
                    <!-- /.tab-content -->


                        <!-- /.tab-pane -->


                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>

    </div>
@endif
@stop
