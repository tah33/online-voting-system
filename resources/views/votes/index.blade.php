@extends('layouts.app')
@section('content')
    <div class="row"> 
        <div class="box">
            <div class="box-body">
                <table class="table table-hover table-bordered">
                    <caption>Voting Area</caption>
                    <thead>
                    <tr>
                        <th style="text-align: center">No.</th>
                        <th style="text-align: center">Election Name</th>
                        <th style="text-align: center">Candidates</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                    </thead>
                    <tbody align="center">
                    @foreach ($elections as $key => $election)
                        <tr>
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $election->name }}</td>
                            <td style="text-align: center">
                              @if($election->applies)
                              @foreach($election->applies as $key=> $apply)
                                <b>{{$key+1}} .</b>:  <b>$apply->vote-></b> 
                              @endif

                            </td>
                                <td><a href="{{url('votes',$election->id)}}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                  </td>
                                </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
