@extends('layouts.app')
@section('content')

<div class="panel panel-primary">
	<div class="panel-heading">{{$users->first()->userarea->name}}</div>
	<div class="panel-body">
  @foreach($users as $key => $user)
  <div class="panel panel-primary" style="width:400px;  float: left; margin-right: 10px">
  	<center>
  	<div class="panel-body">
  <div class="card" style="width:200px;">
    <img class="card-img-top" src="{{url('images/'.$user->image)}}" alt="Card image" style="width:50%">
    <div class="card-body">
      <h4 class="card-title"><a href="#">Name : {{$user->name}}</a></h4>
      <h5 class="card-title"><b>Party Name : {{$user->party->name}}</b></h5>
      <h5 class="card-title"><b>Symbol Name : {{$user->party->symbol_name}}</b></h5>
    </div>
    <img class="card-img-bottom" src="{{url('images/'.$user->party->symbol)}}" alt="Card image" style="width:100%">
  </div>
</div>
</center>
</div>
  @endforeach
</div>
</div>
@stop