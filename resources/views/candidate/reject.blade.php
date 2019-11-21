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
                    @foreach ($rejects as $key => $reject)
                        <tr>
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $reject->user->email }}</td>
                            <td style="text-align: center">{{ $reject->election->name }}</td>
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
