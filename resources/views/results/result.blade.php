@extends('layouts.app')
@section('content')
    <div class="row"> 
        <div class="box" style="width: 600px">
            <div class="box-body">
                <table class="table table-hover table-bordered">
                    <caption>{{$parties->first()->election->name}} List</caption>
                    <thead>
                    <tr>
                        <th style="text-align: center">No.</th>
                        <th style="text-align: center">Party Name</th>
                        <th style="text-align: center">Seats Win</th>
                        <th style="text-align: center">Total Seats</th>
                        <th style="text-align: center">Winner</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                    </thead>
                    @php
                    $count = 1;
                    @endphp
                    <tbody align="center">
                    @foreach ($parties as $key => $party)
                        <tr>
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $party->name }}</td>
                            <td style="text-align: center">{{ $party->seats }}</td>
                            @if($count != 0)

                            <td rowspan="{{count($parties)}}" style="text-align: center">{{ count($party->election->candidates) }}</td>
                            <td rowspan="{{count($parties)}}" style="text-align: center">{{$winner->name}}</td>
                            @endif
                            @php
                    $count = 0;
                    @endphp
                            <td> <a href="{{url('result-election/'.$party->id)}}" class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
