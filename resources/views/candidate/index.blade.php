@extends('layouts.app')
@section('content')
@if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="row"> 
        <div class="box">
            <div class="box-body">
                <table class="table table-hover table-bordered">
                    <caption>Candidate List</caption>
                    <thead>
                    <tr>
                       <th class="text-center">Election</th>
                       <th class="text-center">Candidates</th>
                    </tr>
                    </thead>
                    <tbody align="center">
                    @foreach ($elections as $key => $election)
                        <tr>
                            <td style="text-align: center; margin: auto:">{{ $election->name }}</td>
                            <td style="text-align: center">
                              @foreach($election->candidates as $key => $candidate)
                              <table class="table table-hover table-bordered">
                              <tr><td>
                                <b>{{$key+1}} </b>:  <b>{{$candidate->user->name}}</b> 
                                </td></tr>
                            </table>
                              @endforeach
                            </td>
                                </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
