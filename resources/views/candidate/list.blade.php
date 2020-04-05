@extends('layouts.backend.master')
@section('backend.title', $title)

@section('master.content')
@if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-error alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
        <div class="box" style="width: 600px">
            <div class="box-body">
                <table id="search" class="table table-hover table-bordered">
                    <caption>Apply Area</caption>
                    <thead>
                    <tr>
                        <th style="text-align: center">No.</th>
                        <th style="text-align: center">Election</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                    </thead>
                    <tbody align="center">
                    @foreach ($applies as $key => $apply)
                        <tr>
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $apply->name }}</td>
                            @if( Auth::user()->role == 'candidate')
                            <td>
                                <a href="{{url('candidate-store',$apply->id)}}" class="btn btn-success" onclick="return confirm('Are you Sure you want  to apply for this position')"><i class="glyphicon glyphicon-ok"></i></a>
                            @endif
                        </td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection
