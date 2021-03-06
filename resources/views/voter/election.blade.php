@extends('layouts.backend.master')
@section('backend.title', $title)

@section('master.content')
    <div class="box">
        <div class="box-body">
            <table id="" class="table table-hover table-bordered search">
                <caption>Election List</caption>
                <thead class="bg-gray">
                <tr>
                    <th style="text-align: center">No.</th>
                    <th style="text-align: center">Election Name</th>
                    <th style="text-align: center">Election Date</th>
                    <th style="text-align: center">Action</th>
                </tr>
                </thead>
                <tbody align="center">
                @if(count($elections) > 0)
                    @foreach ($elections as $key => $election)
                        <tr>
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $election->name }}</td>
                            <td>{{$election->updated_at->toDateString()}}</td>
                            <td><a href="{{url('voters/'.$election->id.'/edit')}}" class="btn btn-primary btn-sm btn-flat"><i
                                        class="fa fa-eye"></i></a>

                            </td>
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
@endsection
