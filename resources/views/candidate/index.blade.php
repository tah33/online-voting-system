@extends('layouts.app')
@section('content')
    <div class="row"> 
        <div class="box" style="width: 600px">
            <div class="box-body">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th style="text-align: center">No.</th>
                        <th style="text-align: center">Name</th>
                        @if(Auth::user()->role == 'admin')
                        <th style="text-align: center">Action</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody align="center">
                    @foreach ($elections as $key => $election)
                        <tr>
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $election->name }}</td>
                            <td>@if(! $candidate && Auth::user()->role == 'admin')
                                <a href="{{url('candidate-store',$election->id)}}" class="btn btn-success" onclick="return confirm('Are you sure, You want to apply for this position')"><i class="glyphicon glyphicon-check"></i></a>
                                @endif
                                   
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection