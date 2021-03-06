@extends('layouts.backend.master')
@section('backend.title', $title)
@section('master.content')
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    @if(!empty($user->image))
                    <img class="profile-user-img img-responsive img-circle" src="{{URL::asset('images/'.$user->image)}}"
                         alt="User profile picture">
                    @else
                        <img class="profile-user-img img-responsive img-circle" src="{{URL::asset('images/avatar.png')}}"
                             alt="User profile picture">
                    @endif
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
                    @if(Auth::id() == $user->id)
                        <a href="{{'edit-profile/'.$user->id}}" class="btn btn-primary btn-block"><b>Edit
                                Profile</b></a>
                    @endif
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
                        <li><a href="#social" data-toggle="tab">Social</a></li>
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
                                                <b>Area</b> <a class="pull-right">{{$user->area->name}}</a>
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
                                                    <b>Party</b> <a class="pull-right">{{$user->party ? $user->party->name : ""}}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Symbol Name</b> <a
                                                        class="pull-right">{{$user->party ? $user->party->symbol_name : ""}}</a>
                                                </li>
                                                <li class="list-group-item"><b>Symbol</b>
                                                    <img class="card-img-top" width="50%"
                                                         src="{{asset('images/'.($user->party ? $user->party->symbol : ""))}}"
                                                         class="img-circle">
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="social">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-5">
                                        @foreach($user->socials as $key=>$social)
                                            <div class="card" style="width: 38rem;">
                                                <div class="card-body">
                                                    <h5 class="card-title">Organization Name : {{$social->organization_name}}</h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">Position Name : {{$social->title}}</h6>
                                                    <h5 class="card-title"><b>Description</b></h5>
                                                    <p class="card-text">{{$social->description}}.</p>
                                                </div>
                                            </div>
                                            @if(count($user->socials)-1 > $key)
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

@stop
