@extends('layouts.app')
@section('content')
<div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- Card for Students -->
            <div class="small-box bg-default">
              <div class="inner">
                <h3>{{count($ongoings)}}</h3>
                <p>Ongoing Elections</p>
              </div>
              <div class="icon">
                <img src="{{asset('images/ongoing.svg')}}" width="70px" height="70px">
              </div>
              <a href="{{url('ongoing')}}" class="small-box-footer">More info <i class="glyphicon glyphicon-chevron-right"></i></a>
            </div>
          </div>
             </div>
      </div>
@stop
