@extends('layouts.app')
@section('content')
       <div class="row"> 
        <div class="box" style="width: 600px">
            <div class="box-body">
                <table class="table table-hover table-bordered">
                    <caption>Canidate Areas for {{$users->first()->candidate->election->name}}</caption>
                    <thead>
                    <tr>
                        <th style="text-align: center">No.</th>
                        <th style="text-align: center">Area</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                    </thead>
                    <tbody align="center">
                    @foreach ($users as $key => $user)
                        <tr>
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $user->userarea->name }}</td>
                            <td> <a href="{{url('results/'.$user->area.'/edit')}}" class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
