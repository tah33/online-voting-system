@extends('layouts.app')
@section('content')
    <div class="row"> 
        <div class="box" style="width: 600px">
            <div class="box-body">
                <table id="search" class="table table-hover table-bordered">
                    <caption>Reject List</caption>
                    <thead>
                    <tr>
                        <th style="text-align: center">No.</th>
                        <th style="text-align: center">Candiate Name</th>
                        <th style="text-align: center">Election</th>
                    </tr>
                    </thead>
                    <tbody align="center">
                    @foreach ($rejects as $key => $reject)
                        <tr>
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $reject->user->email }}</td>
                            <td style="text-align: center">{{ $reject->election->name }}</td>
                            <td><a href="{{url('candidates',$reject->id)}}" class="btn btn-success" onclick="return confirm('Are you sure, You want to approve')"><i class="glyphicon glyphicon-ok"></i></a></td> 
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
