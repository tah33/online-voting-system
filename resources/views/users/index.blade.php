@extends('layouts.app')
@section('content')
@if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="row"> 
        <div class="box">            
            <div class="box-body">
<a href="{{url('blocked-users')}}" class="btn btn-info" style="text-align:  center;">Blocked Users</a>
<a href="{{url('users-pdf')}}" class="btn btn-primary" target="_blank" style="text-align:  center;">Get PDF</a>

                <table class="table table-hover table-bordered">
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
                        <th style="text-align: center">Image</th>
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
                            <td style="text-align: center"><img src="{{asset('images/'.$user->image)}}" width="80px" height="42px"></td>
                            <td style="text-align: center">
                                <a href="{{url('users',$user->id)}}" style="float: left" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                   <form action="{{url('users',$user->id)}}" method="post" onsubmit="return confirm('Are you sure you want to Block This User?');">
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
