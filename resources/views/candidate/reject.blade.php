@extends('layouts.backend.master')
@section('backend.title', $title)

@section('master.content')
    <div class="row">
        <div class="col-md-8">
            <div class="box">
                <div class="box-body">
                    <table id="search" class="table table-hover table-bordered">
                        <caption>Reject List</caption>
                        <thead>
                        <tr>
                            <th style="text-align: center">No.</th>
                            <th style="text-align: center">Candidate Name</th>
                            <th style="text-align: center">Election</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                        </thead>
                        <tbody align="center">
                        @foreach ($rejects as $key => $reject)
                            <tr>
                                <td style="text-align: center">{{ $key+1 }}</td>
                                <td style="text-align: center">{{ $reject->user->email }}</td>
                                <td style="text-align: center">{{ $reject->election->name }}</td>
                                <td><a href="{{url('candidates',$reject->id)}}" class="btn btn-success btn-flat btn-sm"
                                       onclick="return confirm('Are you sure, You want to approve')"><i
                                            class="fa fa-check"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
