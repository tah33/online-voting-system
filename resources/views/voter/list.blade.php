@extends('layouts.backend.master')
@section('backend.title', $title)

@section('master.content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table class="table table-hover table-bordered search">
                        <caption>Voters List of {{$election->name}}</caption>
                        <thead class="bg-gray">
                        <tr>
                            <th style="text-align: center">No.</th>
                            <th style="text-align: center">Name</th>
                            <th style="text-align: center">Username</th>
                            <th style="text-align: center">email</th>
                            <th style="text-align: center">Phone</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                        </thead>
                        <tbody align="center">
                        @if(count($election->voters) > 0)
                        @foreach ($election->voters as $key => $voter)
                            <tr>
                                <td style="text-align: center">{{ $key+1 }}</td>
                                <td style="text-align: center">{{ $voter->user->name }}</td>
                                <td style="text-align: center">{{ $voter->user->username }}</td>
                                <td style="text-align: center">{{ $voter->user->email }}</td>
                                <td style="text-align: center">{{ $voter->user->phone }}</td>
                                    <td>
                                        <a href="{{url('users',$voter->user_id)}}" class="btn btn-success btn-flat btn-sm">
                                            <i class="fa fa-eye"></i></a>
                                    </td>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td colspan="6">No matching records found</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
