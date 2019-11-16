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
                    </tr>
                    </thead>
                    <tbody align="center">
                    @foreach ($applies as $key => $apply)
                        <tr>
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $apply->user->email }}</td>
                            <td style="text-align: center">{{ $apply->election->name }}</td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
