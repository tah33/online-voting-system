@extends('layouts.app')
@section('content')
        <div class="box" style="width: 600px">
            <div class="box-body">
                <table id="search" class="table table-hover table-bordered">
                    @if(! empty($users))
                    <caption>Canidate Areas for {{$users->first()->candidate->election->name}}</caption>
                    @endif
                    <thead>
                    <tr>
                        <th style="text-align: center">No.</th>
                        <th style="text-align: center">Area</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                    </thead>
                    <tbody align="center">
                    @if(!empty($users))
                    @foreach ($users as $key => $user)
                        <tr>
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $user->userarea->name }}</td>
                            <td> <a href="{{url('results/'.$user->area.'/edit')}}" class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
@endsection
