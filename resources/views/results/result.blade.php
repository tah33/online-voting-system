@extends('layouts.app')
@section('content')
    <div class="row"> 
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
                        <tr>
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $party->name }}</td>
                            <td style="text-align: center">{{ $party->seats }}</td>
                            @if($count != 0)
                            <td rowspan="{{count($parties)}}" style="text-align: center">{{ count(($party->election->candidates->groupBy('area'))) }}</td>
                            <td rowspan="{{count($parties)}}" style="text-align: center">{{$winner->name}}</td>
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
    </div>
@endsection
