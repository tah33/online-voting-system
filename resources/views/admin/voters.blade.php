@extends('layouts.backend.master')
@section('backend.title', $title)

@section('master.content')
    <div class="row">
        <div class="box">
            <center>
<a href="{{url('blocked-users')}}" class="btn btn-info" style="text-align:  center;">Blocked Users</a>
<a href="{{url('voters-pdf')}}" class="btn btn-primary" target="_blank" style="text-align:  center;">Get Pdf</a>
</center>
            <div class="box-body">
                <table id="search" class="table table-hover table-bordered">
                    <caption>Voters List</caption>
                    <thead>
                    <tr>
                        <th style="text-align: center">No.</th>
                        <th style="text-align: center">Name</th>
                        <th style="text-align: center">Username</th>
                        <th style="text-align: center">Email</th>
                        <th style="text-align: center">NID</th>
                        <th style="text-align: center">Phone</th>
                        <th style="text-align: center">Type</th>
                        <th style="text-align: center">Image</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                    </thead>
                    <tbody align="center">
                    @foreach ($voters as $key => $voter)
                        <tr>
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $voter->name }}</td>
                            <td style="text-align: center">{{ $voter->username }}</td>
                            <td style="text-align: center">{{ $voter->email }}</td>
                            <td style="text-align: center">{{ $voter->nid }}</td>
                            <td style="text-align: center">{{ $voter->phone }}</td>
                            <td style="text-align: center">{{ $voter->rolename }}</td>
                            <td style="text-align: center"><img src="{{asset('images/'.$voter->image)}}" width="80px" height="42px"></td>
                            <td style="text-align: center">
                                <a href="{{url('users',$voter->id)}}" style="float: left" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                   <form action="{{url('users',$voter->id)}}" method="post" onsubmit="return confirm('Are you sure you want to Block This User?');">
                                   	@csrf
                                   	@method('delete')
									<button type="submit" style="float: left" class="btn btn-danger"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                   </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
