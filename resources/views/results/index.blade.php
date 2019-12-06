@extends('layouts.app')
@section('content')
    <div class="row"> 
        <div class="box" style="width: 600px">
            <div class="box-body">
                <table class="table table-hover table-bordered">
                    <caption>Election List</caption>
                    <thead>
                    <tr>
                        <th style="text-align: center">No.</th>
                        <th style="text-align: center">Election Name</th>
                        <th style="text-align: center">Election Date</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                    </thead>
                    <tbody align="center">
                    @foreach ($elections as $key => $election)
                        <tr>
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $election->name }}</td>
                            <td>{{$election->updated_at->toDateString()}}</td>
                            <td> <a href="{{url('results/'.$election->id)}}" class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
