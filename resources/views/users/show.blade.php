@extends('adminlte::page')
@section('content')
<center>
        <div class="card" style="width: 18rem;">
            @if($user->image == '')
                <img class="card-img-top" width="100%" src="{{asset('images/avatar.png')}}" class="img-circle">
            @else
                <img class="card-img-top" width="100%" src="{{asset('images/'.$user->image)}}" class="img-circle">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{$user->name}} Profile</h5>
            </div>
            <style>
                .ul{
                    width: 300px;
                    margin-left: -60px;
                }
            </style>
            <ul class="list-group list-group-flush ul">
                <li class="list-group-item">Name : {{$user->name}}</li>
                <li class="list-group-item">Email : {{$user->email}}</li>
                <li class="list-group-item">UserName : {{$user->username}}</li>
                <li class="list-group-item">Phone : {{$user->phone}}</li>
                <li class="list-group-item">NID : {{$user->nid}}</li>
                <li class="list-group-item">Address : {{$user->address}}</li>
            </ul>
            @if($user->id == Auth::id())
            <div class="card-body">
                <a href="{{url('edit-profile',$user->id)}}" class="btn btn-primary">Edit Profile</a>
            </div>
            @endif
        </div>
    </center>
@stop
