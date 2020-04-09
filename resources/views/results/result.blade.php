@extends('layouts.backend.master')
@section('backend.title', $title)

@section('master.content')
    <div class="box" style="width: 600px">
        <div class="box-body">
            <table id="search" class="table table-hover table-bordered">
                @if(count($parties) > 0)
                    <caption>{{$parties->first()->election->name}} List</caption>
                @endif
                <thead>
                <tr>
                    <th style="text-align: center">No.</th>
                    <th style="text-align: center">Party Name</th>
                    <th style="text-align: center">Seats Win</th>
                    <th style="text-align: center">Total Seats</th>
                    <th style="text-align: center">Winner</th>
                </tr>
                </thead>
                @php
                    $count = 1;
                @endphp
                <tbody align="center">
                @if(count($parties) > 0)
                    @foreach ($parties as $key => $party)
                        <tr style="text-align: center">
                            <td>{{ $key+1 }}</td>
                            <td>{{ $party->name }}</td>
                            <td>{{ $party->seats }}</td>
                            @php
                                $winner = $parties->where('seats',$parties->max('seats'));
                            @endphp
                        @if($count != 0)
                                <td rowspan="{{count($parties)}}">{{ count(($party->election->candidates->groupBy('area_id'))) }}</td>
                                <td rowspan="{{count($parties)}}">
                                    @if (count($winner) > 1)
                                        @foreach($winner as $win)
                                        @php
                                            $names[] = $win->name;
                                        @endphp
                                            @endforeach
                                        {{$names[array_rand($names)]}}
                                        @else
                                        {{$parties->where('seats',$parties->max('seats'))->first()->name}}
                                        @endif
                                </td>
                            @endif
                            @php
                                $count = 0;
                            @endphp

                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
