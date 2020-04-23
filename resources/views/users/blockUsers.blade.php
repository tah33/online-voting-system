@extends('layouts.backend.master')
@section('backend.title', $title)

@section('master.content')
    <div class="box">
        <div class="box-body">
            <table id="search" class="table table-hover table-bordered">
                <caption>Blocked Users List</caption>
                <thead class="bg-gray">
                <tr>
                    <th style="text-align: center">No.</th>
                    <th style="text-align: center">Name</th>
                    <th style="text-align: center">Username</th>
                    <th style="text-align: center">Email</th>
                    <th style="text-align: center">NID</th>
                    <th style="text-align: center">Phone</th>
                    <th style="text-align: center">Address</th>
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
                        <td style="text-align: center">{{ $user->address }}</td>
                        <td style="text-align: center">
                            <a href="{{url('unblock',$user->id)}}" class="btn btn-success btn-flat btn-sm"
                               onclick="return confirm('Are you sure you want to unblock This User?');"><i
                                    class="fa fa-check"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
