@extends('adminlte::page')
@section('content')
    <div class="row">
        <div class="box">
            <div class="box-body">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th style="text-align: center">No.</th>
                        <th style="text-align: center">Name</th>
                        <th style="text-align: center">Username</th>
                        <th style="text-align: center">Email</th>
                        <th style="text-align: center">NID</th>
                        <th style="text-align: center">Phone</th>
                        <th style="text-align: center">Address</th>
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
                            <td style="text-align: center">{{ $user->address }}</td>
                            <td style="text-align: center">{{ $user->image }}</td>
                            <td style="text-align: center">
                                <a href="{{url('users',$user->id)}}" style="float: left;" class="btn btn-success"><i
                                        class="fa fa-eye"></i></a>
                                <!-- <a href="{{url('delete-users',$user->id)}}"
                                   onclick="return confirm('Are you sure you want to delete?')"
                                   class="btn btn-danger"><i class="glyphicon glyphicon-remove-circle"></i></a> -->
                                   <form action="url('users',$user->id)" method="post" onsubmit="return confirm('Are you sure you want to delete?');">
                                   	@csrf
                                   	@method('delete')
									<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>                                    	
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
