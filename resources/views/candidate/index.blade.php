@extends('layouts.app')
@section('content')
    <div class="row"> 
        <div class="box" >
            <div class="box-body">
                <a href="{{url('elections-pdf')}}" target="_blank" class="btn btn-primary">Get Pdf</a>
    <table class="table table-hover table-bordered" width="300">
        <thead>
        <tr>
            <th>Serial</th>
            <th>Candidate</th>
            <th>Area</th>

            <th>Elections</th>
            <th>Election Date</th>
        </tr>
    
        </thead>
<?php $renderedElections = []; ?>
<?php $renderedAreas = []; ?>
@if(!empty($users))
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
              @if (!in_array($user->candidate->election->updated_at, $renderedElections))
        <?php $renderedElections[] = $user->candidate->election->updated_at ?>
              <td rowspan="{{count($user->candidate->election->candidates)}}">{{$user->candidate->election->updated_at->toDateString()}}</td>
              @endif 
            </tr>
            @endforeach
             </tbody>
             @endif
    </table>
     </div>
        </div>
    </div>
    @stop

