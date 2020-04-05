@extends('layouts.backend.master')
@section('backend.title', $title)

@section('master.content')
<a href="{{url('area-pdf/'.$users->first()->area)}}" target="_blank" class="btn btn-primary">Get PDF</a>
<div class="panel panel-primary">
	<div class="panel-heading">{{$users->first()->userarea->name}}</div>
	<div class="panel-body">
  @foreach($users->where('role','candidate') as $key => $user)
  <div class="panel panel-primary" style="width:400px;  float: left; margin-right: 10px">
  	<center>
  	<div class="panel-body">
  <div class="card" style="width:200px;">
    <img class="card-img-top" src="{{url('images/'.$user->image)}}" alt="Card image" style="width:50%">
    <div class="card-body">
      <h4 class="card-title"><a href="#">Name : {{$user->name}}</a></h4>
      <h5 class="card-title"><b>Party Name : {{$user->party->name}}</b></h5>
      <h5 class="card-title"><b>Symbol Name : {{$user->party->symbol_name}}</b></h5>
    <img class="card-img-bottom" src="{{url('images/'.$user->party->symbol)}}" alt="Card image" style="width:100px; height: 50px"><br>
    <b><u>Result</u></b><br>
      <h5 class="card-title"><b>Vote : {{$user->candidate->votes}}</b></h5>
       @if($user->candidate->votes == $max)
        @if($users_max_vote->count()>1)
          <font color="red">  Draw between
            @foreach($users_max_vote as $vote)
               {{$vote->name}}
            @endforeach
            </font>
        @else
            <font color="green"><h3>Winner</h3></font>
        @endif
        @endif
    </div>

  </div>
</div>
</center>
</div>
  @endforeach
  @if($voters)

@endif
</div>
<div class="panel panel-danger">
  <div class="panel-body" >

<div class="card" style="width:200px;">
    <img class="card-img-top" src="{{url('images/both.svg')}}" alt="Card image" style="width:50%">
    <div class="card-body">
      <h5 class="card-title"><b>Total Voters : {{count($voters)}}</b></h5>
    </div>
</div>
<center>
<div class="card" style="width:200px; margin-top: -133px">
    <img class="card-img-top" src="{{url('images/male.svg')}}" alt="Card image" style="width:50%">
    <div class="card-body">
      <h5 class="card-title"><b>Total Male Voters : {{count($voters->where('gender','male'))}}</b></h5>
    </div>
</div>
</center>

<div class="card" style="width:200px; margin-top: -133px;float: right">
    <img class="card-img-top" src="{{url('images/female.svg')}}" alt="Card image" style="width:50%">
    <div class="card-body">
      <h5 class="card-title"><b>Total Female Voters : {{count($voters->where('gender','female'))}}</b></h5>
    </div>
</div>
</div>
</div>
</div>
</div>
@stop
