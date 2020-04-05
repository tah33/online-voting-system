@extends('layouts.backend.master')
@section('backend.title', $title)

@section('master.content')
        <div class="box" >
            <div class="box-body">
                <center>
                <a href="{{url('elections-pdf')}}" target="_blank" class="btn btn-primary">Get Pdf</a>
            </center>
    <table id="search" class="table table-hover table-bordered" width="300">
        <thead>
        <tr>
            <th>Serial</th>
            <th>Candidate</th>
            <th>Area</th>

            <th>Elections</th>
            <th>Election Date</th>
        </tr>

        </thead>
@php
$userElections = [];
$ids = [];
$user_elections = [];
$user = 1;
@endphp
        <tbody>
            @foreach ($elections as $election)
            @foreach($election->candidates as $key => $candidate)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$candidate->user->name}}</td>
               @if (!in_array($candidate->user_id, $ids))
        @php
        $ids[] = $candidate->user_id ;
        @endphp
              <td rowspan="{{count($election->candidates->where('area',$candidate->area))}}">
                 {{$candidate->user->userarea->name}}</td>
                 @endif
@if (!in_array($election->name, $userElections))
        @php $userElections[] = $election->name; @endphp
              <td rowspan="{{count($election->candidates)}}">{{$election->name}}</td>
              @endif
              @if (!in_array($election->updated_at, $userElections))
        @php $userElections[] = $election->updated_at; @endphp
              <td rowspan="{{count($election->candidates)}}">{{$election->updated_at->toDateString()}}</td>
              @endif
            </tr>
            @endforeach
            @endforeach

             </tbody>
    </table>
     </div>
        </div>
    @stop

