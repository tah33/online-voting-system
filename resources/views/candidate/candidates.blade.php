@extends('layouts.app')
@section('content')
    <div class="row"> 
        <div class="box" style="width: 600px">
            <div class="box-body">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th style="text-align: center">No.</th>
                        <th style="text-align: center">Name</th>
                        @if(Auth::user()->role == 'admin')
                        <th style="text-align: center">Action</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody align="center">
                        @if(!empty($candidates))
                    @foreach ($candidates as $key => $candidate)
                        <tr>
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $candidate->user->name }}</td>
                            <td>
                                <a href="{{url('profiles',$candidate->id)}}" class="btn btn-success" onclick="return confirm('Are you sure, You want to apply for this position')"><i class="glyphicon glyphicon-check"></i></a>
                                   
                            </td>
                        </tr>
                    @endforeach
                                @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
