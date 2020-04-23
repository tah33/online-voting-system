@extends('layouts.backend.master')
@section('backend.title', $title)

@section('master.content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table id="search" class="table table-hover table-bordered">
                        <caption>Election List</caption>
                        <thead class="bg-gray">
                        <tr>
                            <th>No.</th>
                            <th>Organization Name</th>
                            <th>Position</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody >
                        @foreach ($socials as $key => $social)
                            <tr align="left">
                                <td>{{ $key+1 }}</td>
                                <td>{{ $social->organization_name }}</td>
                                <td>{{ $social->title }}</td>
                                <td>{{ $social->description }}</td>
                                <td>
                                    <a href="{{url('socials/'.$social->id.'/edit')}}"
                                       class="btn btn-warning btn-sm btn-flat"><i class="fa fa-pencil"></i></a>
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
