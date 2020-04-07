@extends('layouts.backend.master')
@section('backend.title', $title)

@section('master.content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    {{--<center>
                        <a href="{{url('elections-pdf')}}" target="_blank" class="btn btn-primary">Get Pdf</a>
                    </center>--}}
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
                                    @if (!in_array($candidate->area_id, $ids))
                                        @php
                                            $ids[] = $candidate->area_id ;
                                        @endphp
                                        <td rowspan="{{count($election->candidates->where('area_id',$candidate->area_id))}}">
                                            {{$candidate->area->name}}</td>
                                    @endif
                                    @if (!in_array($election->name, $userElections))
                                        @php
                                            $userElections[] = $election->name;
                                            $now = \Carbon\Carbon::now('Asia/Dhaka')->format('Y-m-d');
                                            /*dd($now,$election->election_date);*/
                                        @endphp
                                        <td rowspan="{{count($election->candidates)}}">{{$election->name}}
                                            @if($election->election_date >= $now)
                                            <span class="label label-success">Active</span>
                                            @endif
                                        </td>

                                        <td rowspan="{{count($election->candidates)}}">{{$election->election_date}}</td>
                                    @endif
                                </tr>
                            @endforeach
                            @php
                                $ids = $userElections = [];
                            @endphp
                        @endforeach

                        </tbody>
                    </table>
                    {{$elections->links()}}
                </div>
            </div>

        </div>
    </div>
@stop

