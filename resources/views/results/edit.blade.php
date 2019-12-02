@extends('layouts.app')
@section('content')
       <div class="row"> 
       <div class="box">
            <div class="box-body">
                <table class="table table-hover table-bordered">
                    <caption>{{$users->first()->userarea->name}}</caption>
                    <thead>
                        <th>Serial</th>
                        <th>Candidate</th>
                        <th>Party</th>
                        <th>Symbol</th>
                        <th>Symbol Name</th>
                        <th>Vote</th>
                        <th>Result</th>
                    </thead>
                    @foreach($users as $key => $user)
                    <tr>
                        <td>{{$key+1}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->party->name}}</td>
                    <td><img src="{{url('images/',$user->symbol)}}" width="50px" height="50px"></td>
                    <td>{{$user->party->symbol_name}}</td>
                    <td>{{$user->candidate ? $user->candidate->votes : ''}}</td>
                    <td> @if($user->candidate->votes == $max) 
        @if($users_max_vote->count()>1)
            Draw between 
            @foreach($users_max_vote as $vote) 
               {{$vote->name}} 
            @endforeach 
        @else
            Winner 
        @endif
        @endif
                    </td> 
                    </tr>
                        @endforeach
                   
                </table>
            </div>
        </div>
    </div>
@endsection
