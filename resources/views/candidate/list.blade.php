@extends('layouts.backend.master')
@section('backend.title', $title)

@section('master.content')
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-body">
                    <table id="search" class="table table-hover table-bordered">
                        <caption>Apply Area</caption>
                        <thead class="bg-gray">
                        <tr>
                            <th style="text-align: center">No.</th>
                            <th style="text-align: center">Election</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                        </thead>
                        <tbody align="center">
                        @if(count($applies) > 0)
                        @foreach ($applies as $key => $apply)
                            <tr>
                                <td style="text-align: center">{{ $key+1 }}</td>
                                <td style="text-align: center">{{ $apply->name }}</td>
                                @if( Auth::user()->role == 'candidate' && !\Illuminate\Support\Facades\Auth::user()->candidate()->exists())
                                    <td>
                                        <a href="{{url('candidate-store',$apply->id)}}" class="btn btn-success btn-flat btn-sm"
                                           onclick="return confirm('Are you Sure you want  to apply for this election')"><i
                                                class="fa fa-check"></i></a>
                                    </td>
                                @else
                                    <td>{!! \Illuminate\Support\Facades\Auth::user()->candidate->approval !!}</td>
                                @endif
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td colspan="5">No matching records found</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
