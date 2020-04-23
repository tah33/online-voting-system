@extends('layouts.backend.master')
@section('backend.title', $title)

@section('master.content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table class="table table-hover table-bordered search">
                        <caption>Election List</caption>
                        <thead class="bg-gray">
                        <tr>
                            <th>No.</th>
                            <th>Election Name</th>
                            <th>Election Date</th>
                            <th>Application Start Date</th>
                            <th>Application End Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody >
                        @if(count($elections) > 0)
                        @foreach ($elections as $key => $election)
                            <tr align="left">
                                <td>{{ $key+1 }}</td>
                                <td>{{ $election->name }}</td>
                                <td>{{ $election->election_date }}</td>
                                <td>{{ $election->start_date }}</td>
                                <td>{{ $election->end_date }}</td>
                                <td>{!! $election->statusname !!}</td>
                                <td>@if($election->status == 0)
                                        <a href="{{url('elections',$election->id)}}" class="btn btn-success btn-sm btn-flat"
                                           onclick="return confirm('Are you sure you want to Active This Election?');"><i
                                                class="fa fa-check"></i></a>
                                    @else
                                        <a href="{{url('elections',$election->id)}}"
                                           class="btn btn-danger btn-sm btn-flat"
                                           onclick="return confirm('Are you sure you want to hold This Election?');"><i
                                                class="fa fa-hand-stop-o"></i></a>
                                    @endif
                                    <a href="{{url('elections/'.$election->id.'/edit')}}"
                                       class="btn btn-warning btn-sm btn-flat"><i class="fa fa-pencil"></i></a>
                                    <form action="{{url('elections',$election->id)}}" method="post" style="display: inline"
                                          onsubmit="return confirm('Are you sure you want to Delete This Election?');">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm btn-flat"><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td colspan="7">No matching records found</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
