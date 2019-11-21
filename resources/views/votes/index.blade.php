@extends('layouts.app')
@section('content')

    <div class="row"> 
        <div class="box">
            <div class="box-body">
                <table class="table table-hover table-bordered">
                    <caption>Voting Area</caption>
                    <thead>
                    <tr>
                        <th style="text-align: center">Election Name</th>
                        <th style="text-align: center">Candidates</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                    </thead>
                    <tbody align="center">
                    @foreach ($elections as $key => $election)
                        <tr>
                            <td style="text-align: center">{{ $election->name }}</td>
                            <td style="text-align: center">
                              @if($candidates)
                              @foreach($candidates as $key => $candidate)
                              <table class="table table-hover table-bordered">
                              <tr><td>
                                <b>{{$key+1}} </b>:  <b>{{$candidate->user->name}}</b> 
                                </td></tr>
                            </table>
                              @endforeach
                              @endif
                            </td>
                            <td>
                                @if($candidates)
                              @foreach($candidates as $key => $candidate)
                              <table class="table table-hover table-bordered">
                                <tr><td style=" text-align: center ">
                                <a href="{{'candidates'.$candidate->id.'/edit'}}" class="btn btn-success btn-sm" style="margin-top: -10px"><i class="glyphicon glyphicon-ok"></i></a> </td>
                                </tr>
                            </table>
                            @endforeach
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
