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
                                        <img class="profile-user-img img-responsive img-circle"
                                             src="{{url('images/'.$user->image)}}" alt="User profile picture">

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
                                        <a href="{{'edit-profile/'.$user->id}}" class="btn btn-primary btn-block"><b>Edit
                                                Profile</b></a>
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
                                            <li><a href="#party" data-toggle="tab">Party</a></li>
                                            <li><a href="#social" data-toggle="tab">Social Activity</a></li>
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
                                                                    <b>Gender</b> <a
                                                                        class="pull-right">{{$user->gender}}</a>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <b>Area</b> <a
                                                                        class="pull-right">{{$user->area->name}}</a>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <b>Age</b> <a
                                                                        class="pull-right">{{Carbon\Carbon::createFromDate($user->dob)->diff(Carbon\Carbon::now())->format('%y years')}}</a>
                                                                </li>
                                                            </ul>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.tab-pane -->
                                        @if($user->role == 'candidate')

                                            <div class="tab-pane" id="party">
                                                <div class="container">
                                                    <div class="row justify-content-center">
                                                        <div class="col-md-5">
                                                            <div class="card">
                                                                <ul class="list-group list-group-unbordered">

                                                                    <li class="list-group-item">
                                                                        <b>Party</b> <a
                                                                            class="pull-right">{{$user->seat ? $user->seat->party->name : ""}}</a>
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <b>Symbol Name</b> <a
                                                                            class="pull-right">{{$user->seat ? $user->seat->party->symbol_name : ""}}</a>
                                                                    </li>
                                                                    <li class="list-group-item"><b>Symbol</b>
                                                                        <img class="card-img-top" style="width: 50%;margin-left: 150px"
                                                                             src="{{asset('images/'.($user->seat->party ? $user->seat->party->symbol : ""))}}"
                                                                             class="img-circle">
                                                                </ul>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--                                            Party Tab Ends Here--}}
                                            <div class="tab-pane" id="social">
                                                <div class="container">
                                                    <div class="row justify-content-center">
                                                        <div class="col-md-5">
                                                            @foreach(\Illuminate\Support\Facades\Auth::user()->socials as $key=>$social)
                                                                <div class="card" style="width: 38rem;">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Organization Name : {{$social->organization_name}}</h5>
                                                                        <h6 class="card-subtitle mb-2 text-muted">Position Name : {{$social->title}}</h6>
                                                                        <h5 class="card-title"><b>Description</b></h5>
                                                                        <p class="card-text">{{$social->description}}.</p>
                                                                    </div>
                                                                </div>
                                                                @if(count(\Illuminate\Support\Facades\Auth::user()->socials)-1 > $key)
                                                                    <hr>
                                                                @endif
                                                                @endforeach
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
