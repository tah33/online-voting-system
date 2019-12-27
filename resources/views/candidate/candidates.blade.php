@extends('layouts.app')
@section('content')
@if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
        <div class="box">
            <div class="box-body">
                <table id="search" class="table table-hover table-bordered">
                    <caption>Candidate List</caption>
                    <thead>
                    <tr>
                        <th style="text-align: center">Election Name</th>
                        <th style="text-align: center">Candidates</th>
                        <th style="text-align: center">Total Votes</th>
                    </tr>
                    </thead>
                    <tbody align="center">
                        @if($candidate)
                        <tr>
                            <td style="text-align: center">{{ $candidate->election->name }}</td>
                            <td style="text-align: center">
                              @foreach($candidates as $key => $candidate)
                              <table class="table table-hover table-bordered">
                              <tr><td>
                                <b>{{$key+1}} </b>:  <b>{{$candidate->user->name}}</b> 
                                </td></tr>
                            </table>
                              @endforeach
                            </td>
                            <td>
                              @foreach($candidates as $key => $candidate)
                              <table class="table table-hover table-bordered">
                                <tr><td style=" text-align: center ">{{$candidate->votes}}</td>
                                </tr>
                            </table>
                            @endforeach
                            </td>
                                </tr>
                    </tbody>
                    @endif
                </table>
            </div>
        </div>
@endsection
