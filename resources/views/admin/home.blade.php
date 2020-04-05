@extends('layouts.backend.master')
@section('backend.title', $title)

@section('master.content')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- Card for Students -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{count($voters)}}</h3>
                        <p>Total Voter</p>
                    </div>
                    <div class="icon">
                        <img src="{{asset('images/voter.svg')}}" width="70px" height="70px">
                    </div>
                    <a href="{{url('all-voter')}}" class="small-box-footer">More info <i
                            class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- Card for Students -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{count($candidates)}}</h3>
                        <p>Total Candidates</p>
                    </div>
                    <div class="icon">
                        <img src="{{asset('images/candidate.svg')}}" width="70px" height="70px">
                    </div>
                    <a href="{{url('all-candidate')}}" class="small-box-footer">More info <i
                            class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- Card for Students -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{count($elections)}}</h3>
                        <p>Total Elections</p>
                    </div>
                    <div class="icon">
                        <img src="{{asset('images/election.svg')}}" width="70px" height="70px">
                    </div>
                    <a href="{{url('elections')}}" class="small-box-footer">More info <i
                            class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- Card for Students -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{count($pending)}}</h3>
                        <p>Pending Applications</p>
                    </div>
                    <div class="icon">
                        <img src="{{asset('images/pending.svg')}}" width="70px" height="70px">
                    </div>
                    <a href="{{url('pending-application')}}" class="small-box-footer">More info <i
                            class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- Card for Students -->
                <div class="small-box bg-default">
                    <div class="inner">
                        <h3>{{count($ongoing)}}</h3>
                        <p>Ongoing Elections</p>
                    </div>
                    <div class="icon">
                        <img src="{{asset('images/ongoing.svg')}}" width="70px" height="70px">
                    </div>
                    <a href="{{url('ongoing')}}" class="small-box-footer">More info <i
                            class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
            </div>

        </div>
    </div>

@stop
