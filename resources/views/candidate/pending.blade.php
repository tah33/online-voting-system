@extends('layouts.backend.master')
@section('backend.title', $title)

@section('master.content')
    <div class="row">
        <div class="col-md-8">
            <div class="box">
                <div class="box-body">
                    <table id="search" class="table table-hover table-bordered">
                        <caption>Pending Applications</caption>
                        <thead class="bg-gray">
                        <tr>
                            <th style="text-align: center">No.</th>
                            <th style="text-align: center">Candiate Name</th>
                            <th style="text-align: center">Election</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                        </thead>
                        <tbody align="center">
                        @if(count($applies) > 0)
                        @foreach ($applies as $key => $apply)
                            <tr>
                                <td style="text-align: center">{{ $key+1 }}</td>
                                <td style="text-align: center">{{ $apply->user['email'] }}</td>
                                <td style="text-align: center">{{ $apply->election->name }}</td>
                                @if(Auth::user()->role == 'admin')
                                    <td><a href="{{url('candidates',$apply->id)}}" class="btn btn-success btn-sm btn-flat"
                                           onclick="return confirm('Are you sure, You want to approve')"><i
                                                class="fa fa-check"></i></a>
                                        <form action="{{url('candidates',$apply->id)}}" method="post"
                                              style="display: inline"
                                              onsubmit="return confirm('Are you sure you want to Reject?');">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm btn-flat"><i
                                                    class="fa fa-times"></i></button>
                                        </form>

                                    </td>
                                    @else
                                    <td>{!! $apply->approval !!}</td>
                                @endif
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td colspan="4">No matching records found</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
