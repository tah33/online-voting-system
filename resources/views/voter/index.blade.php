@extends('layouts.backend.master')
@section('backend.title', $title)

@section('master.content')
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
{{--                            @if($candidate->area_id == \Illuminate\Support\Facades\Auth::user()->area_id)--}}
                                <tr>

                                <td>{{$candidate->user->name}}</td>
                                <td><a href="{{url('voters',$candidate->id)}}"
                                       onclick="return confirm('Are you Sure You want to vote this candidates?')">
                                        <img src="{{url('images/'.$candidate->user->seat->party->symbol)}}" height="50px"
                                             width="50px"></a></td>
                            </tr>
{{--                                @endif--}}
                            @endforeach
                            </tr>

                        @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
