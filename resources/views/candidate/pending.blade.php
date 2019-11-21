@extends('layouts.app')
@section('content')
    <div class="row"> 
        <div class="box" style="width: 600px">
            <div class="box-body">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th style="text-align: center">No.</th>
                        <th style="text-align: center">Candiate Name</th>
                        <th style="text-align: center">Election</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                    </thead>
                    <tbody align="center">
                    @foreach ($applies as $key => $apply)
                        <tr>
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $apply->user->email }}</td>
                            <td style="text-align: center">{{ $apply->election->name }}</td>
                            @if(Auth::user()->role == 'admin')
                            <td><a href="{{url('candidates',$apply->id)}}" class="btn btn-success" onclick="return confirm('Are you sure, You want to approve')"><i class="glyphicon glyphicon-ok"></i></a>  
                            <form action="{{url('candidates',$apply->id)}}" method="post" style="float: left" onsubmit="return confirm('Are you sure you want to Reject?');">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"  class="btn btn-danger"><i class="glyphicon glyphicon-remove-circle"></i></button>                                       
                                   </form>

                            </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
