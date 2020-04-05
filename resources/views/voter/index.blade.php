@extends('layouts.backend.master')
@section('backend.title', $title)

@section('master.content')
@if ($message = Session::get('warning'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
    <div class="box">
        <div class="box-body">
            <table id="search" class="table table-hover table-bordered">
                <caption>Voting Area</caption>
                <thead>
                    <tr>
                        <th rowspan="2" style="text-align: center">Election Name</th>
                        <th colspan="2" style="text-align: center">Candidates</th>
                    </tr>
                    <tr class="bg-grey">
                        <th>Name</th>
                        <th>Symbol</th>
                    </tr>
                </thead>
                <tbody align="center">
                    @foreach ($elections as $election)
                    <tr>
                    <td rowspan="{{count($election->candidates)+1}}">{{$election->name}}</td>
                @foreach ($election->candidates as $candidate)
                <tr>

                    <td>{{$candidate->user->name}}</td>
                <td><a href="{{url('voters',$candidate->id)}}" onclick="return confirm('Are you Sure You want to vote this candidates?')">
                    <img src="{{url('images/'.$candidate->user->party->symbol)}}" height="50px" width="50px"></a></td>
                </tr>
                @endforeach
                    @endforeach
                    </tr>
                </tbody>
                            </table>
        </div>
    </div>
@endsection
