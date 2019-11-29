@extends('layouts.app')
@section('content')
       <div class="row"> 
       <div class="box" style="width: 600px">
            <div class="box-body">
                <table class="table table-hover table-bordered">
                    <caption>{{$users->first()->area->name}}</caption>
                    <thead>
                        <th>Candidate</th>
                        <th>Party</th>
                        <th>Symbol</th>
                        <th>Vote</th>
                        <th>Result</th>
                    </thead>
                    @foreach($users as $user)
                    <tr>
                    <td>{{$user->name}}</td>
                    <td>Party</td>
                    <td><img src="{{url('images/',$user->symbol)}}" width="50px" height="50px"></td>

                    <td>{{$user->candidate ? $user->candidate->votes : ''}}</td>
                    </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
