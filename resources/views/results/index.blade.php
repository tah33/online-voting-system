@extends('layouts.backend.master')
@section('backend.title', $title)

@section('master.content')
    <div class="row">
        <div class="col-md-12">

            <div class="box">
                <div class="box-body">
                    <table id="" class="table table-hover table-bordered search">
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
                                <td><a href="{{url('results/'.$election->id)}}" class="btn btn-primary btn-sm btn-flat"><i
                                            class="fa fa-eye"></i></a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
