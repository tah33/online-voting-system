@extends('layouts.backend.master')
@section('backend.title', $title)

@section('master.content')
    <div class="box" style="width: 600px">
        @if(! empty($users))
            <div class="box-header with-border">
                <h3 class="box-title">Candidate Areas for {{$users->first()->candidate->election->name}}</h3>
            </div>
        @endif
        <div class="box-body">
            <table id="search" class="table table-hover table-bordered">
                <thead class="bg-gray">
                <tr>
                    <th style="text-align: center">No.</th>
                    <th style="text-align: center">Area</th>
                    <th style="text-align: center">Action</th>
                </tr>
                </thead>
                <tbody align="center">
                @if(!empty($users) )
                    @foreach ($users as $key => $user)
                        <tr>
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $user->area->name }}</td>
                            <td><a href="{{url('results/'.$user->area_id.'/edit')}}" class="btn btn-primary btn-sm btn-flat"><i
                                        class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="3">No matching records found</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
