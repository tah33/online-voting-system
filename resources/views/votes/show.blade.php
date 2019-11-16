@extends('layouts.app')
@section('content')
@if ($message = Session::get('error'))
        <div class="alert alert-error alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="row"> 
        <div class="box">
            <div class="box-body">
                <table class="table table-hover table-bordered">
                    <caption>Voting Area of {{$applies->first()->election->name}}</caption>
                    <thead>
                    <tr>
                        <th style="text-align: center">No.</th>
                        <th style="text-align: center">Candidate Name</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                    </thead>
                    <tbody align="center">
                    @foreach ($applies as $key => $apply)
                        <tr>
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $apply->user->name }}</td>
                                <td><a href="{{url('votes/'.$apply->id.'/edit')}}" class="btn btn-success" onclick="return confirm('Are You sure you want to vote this candidate')"><i class="glyphicon glyphicon-ok-sign"></i></a>
                                  </td>
                                </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
