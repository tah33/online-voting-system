@extends('layouts.backend.master')
@section('backend.title', $title)

@section('master.content')
    <div class="row">
        <div class="box" style="width: 600px">
            <div class="box-body">
                <table id="search" class="table table-hover table-bordered">
                    <caption>Election List</caption>
                    <thead class="bg-gray">
                    <tr>
                        <th style="text-align: center">No.</th>
                        <th style="text-align: center">Election Name</th>
                        <th style="text-align: center">Status</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                    </thead>
                    <tbody align="center">
                    @foreach ($ongoings as $key => $ongoing)
                        <tr>
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $ongoing->name }}</td>
                            <td style="text-align: center">{{ $ongoing->status == 0 ? "Inactive" : "Active"  }}</td>
                            <td>
                                @if(Auth::user()->role == 'admin')
                                    @if($ongoing->status == 0)
                                        <a href="{{url('elections',$ongoing->id)}}" style="float: left;"
                                           class="btn btn-success"
                                           onclick="return confirm('Are you sure you want to Active This Election?');"><i
                                                class="glyphicon glyphicon-ok"></i></a>
                                    @else
                                        <a href="{{url('elections',$ongoing->id)}}" style="float: left;"
                                           class="btn btn-danger"
                                           onclick="return confirm('Are you sure you want to hold This Election?');"><i
                                                class="glyphicon glyphicon-remove"></i></a>
                                    @endif
                                    <a href="{{url('elections/'.$ongoing->id.'/edit')}}" style="float: left"
                                       class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <form action="{{url('elections',$ongoing->id)}}" method="post"
                                          onsubmit="return confirm('Are you sure you want to Delete This Election?');">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" style="float: left" class="btn btn-danger"><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                @else
                                    <a href="{{url('election-candidate',$ongoing->id)}}" class="btn btn-primary"><i
                                            class="glyphicon glyphicon-eye-open"></i></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
