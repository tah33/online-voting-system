@extends('layouts.backend.master')
@section('backend.title', $title)
@section('master.content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <center>
                        <a href="{{url('blocked-users')}}" class="btn btn-primary btn-sm btn-flat">Blocked
                            Users</a>
                        {{--<a href="{{url('users-pdf')}}" class="btn btn-primary" target="_blank"
                           style="text-align:  center;">Get
                            PDF</a>--}}
                    </center>
                    <table class="table table-hover table-bordered" id="search">
                        <caption>Users List</caption>
                        <thead>
                        <tr>
                            <th style="text-align: center">No.</th>
                            <th style="text-align: center">Name</th>
                            <th style="text-align: center">Username</th>
                            <th style="text-align: center">Email</th>
                            <th style="text-align: center">NID</th>
                            <th style="text-align: center">Phone</th>
                            <th style="text-align: center">Type</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                        </thead>
                        <tbody align="center">
                        @foreach ($users as $key => $user)
                            <tr>
                                <td style="text-align: center">{{ $key+1 }}</td>
                                <td style="text-align: center">{{ $user->name }}</td>
                                <td style="text-align: center">{{ $user->username }}</td>
                                <td style="text-align: center">{{ $user->email }}</td>
                                <td style="text-align: center">{{ $user->nid }}</td>
                                <td style="text-align: center">{{ $user->phone }}</td>
                                <td style="text-align: center">{{ $user->rolename }}</td>
                                <td style="text-align: center">
                                    <a href="{{url('users',$user->id)}}" class="btn btn-success btn-sm btn-flat"><i
                                            class="fa fa-eye"></i></a>
                                    <form action="{{url('users',$user->id)}}" method="post" style="display: inline"
                                          onsubmit="return confirm('Are you sure you want to Block This User?');">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm btn-flat"><i
                                                class="fa fa-times"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
