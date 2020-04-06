@extends('layouts.backend.master')
@section('backend.title', $title)

@section('master.content')
    <div class="box">
        <div class="box-body">
            <table id="search" class="table table-hover table-bordered">
                <caption>Candidate List</caption>
                <thead>
                <tr>
                    <th style="text-align: center">Election Name</th>
                    <th style="text-align: center">Candidates</th>
                    <th style="text-align: center">Area</th>
                </tr>
                </thead>
                <tbody align="center">
                <tr>
                    <td style="text-align: center">{{ $election->name }}</td>
                    <td style="text-align: center">
                        @foreach($election->candidates as $key => $candidate)
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <td>
                                        <b>{{$key+1}} </b>: <b>{{$candidate->user->name}}</b>
                                    </td>
                                </tr>
                            </table>
                        @endforeach
                    </td>
                    <td>
                        @foreach($election->candidates as $key => $candidate)
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <td style=" text-align: center ">{{$candidate->user->userarea->name}}</td>
                                </tr>
                            </table>
                        @endforeach
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
