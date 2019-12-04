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
<?php $renderedElections = []; ?>
<?php $renderedAreas = []; ?>
        <tbody>
            @foreach($users as $key => $user)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$user->name}}</td>
               @if (!in_array($user->userarea->name, $renderedAreas))
        <?php  $renderedAreas[] = $user->userarea->name ?>
              <td rowspan="{{count($users->where('area',$user->area))}}">
                 {{$user->userarea->name}}</td>
                 @endif
@if (!in_array($user->candidate->election->name, $renderedElections))
        <?php $renderedElections[] = $user->candidate->election->name ?>
              <td rowspan="{{count($user->candidate->election->candidates)}}">{{$user->candidate->election->name}}</td>
              @endif
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
