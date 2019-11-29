@extends('layouts.app')
@section('content')
       <div class="row"> 
        <div class="box" style="width: 600px">
            <div class="box-body">
                <table class="table table-hover table-bordered">
                    <caption>Canidate Areas for {{$election->name}}</caption>
                    <thead>
                    <tr>
                        <th style="text-align: center">No.</th>
                        <th style="text-align: center">Area</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                    </thead>
                    <tbody align="center">
                    @foreach ($election->candidates as $key => $candidate)
                        <tr>
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $candidate->user->area->name }}</td>
                            <td> <a href="{{url('results/'.$candidate->user->area_id.'/edit')}}" class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
