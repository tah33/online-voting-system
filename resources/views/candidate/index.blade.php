@extends('layouts.app')
@section('content')
    <div class="row"> 
        <div class="box" >
            <div class="box-body">
    <table class="table table-hover table-bordered" width="300">
        <thead>
        <tr>
            <th>Serial</th>
            <th>Candidate</th>
            <th>Area</th>

            <th>Elections</th>
        </tr>
        </thead>

        <tbody>
            @foreach($users as $key => $user)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$user->name}}</td>
              <td rowspan="{{count($users->where('area',$user->area))}}">
                 {{$user->userarea->name}}</td>

              <td rowspan="{{count($user->candidate->election->candidates)}}">{{$user->candidate->election->name}}</td>
            </tr>
            @endforeach
             </tbody>
    </table>
     </div>
        </div>
    </div>
    @stop
    <!--    <tr>
            <td rowspan="4">Precedency</td>
            <td rowspan="2">Dhaka-1</td>
            <td>Tanvir</td>
        </tr>
        <tr>/
            <td>Tanvir</td>
        </tr>
        <tr>
            <td rowspan="2">Dhaka-1</td>
            <td>Tanvir</td>
        </tr>
        <tr>
            <td>Tanvir</td>
        </tr> -->
