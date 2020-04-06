@extends('layouts.backend.master')
@section('backend.title', $title)

@section('master.content')
    <div class="row">
        <div class="col-md-6">
            <div class="box">
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
                                @if( Auth::user()->role == 'candidate' && !$apply->candidates()->exists())
                                    <td>
                                        <a href="{{url('candidate-store',$apply->id)}}" class="btn btn-success btn-flat btn-sm"
                                           onclick="return confirm('Are you Sure you want  to apply for this position')"><i
                                                class="glyphicon glyphicon-ok"></i></a>
                                        @endif
                                    </td>
                                    <td>{!! \Illuminate\Support\Facades\Auth::user()->candidate->Apply !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
