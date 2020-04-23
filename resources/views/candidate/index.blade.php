@extends('layouts.backend.master')
@section('backend.title', $title)

@section('master.content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Candidates List</h3>
                </div>

                <form action="javascript:void(0)" method="post">
                    <div class="col-md-4 pull-right">
                        <div class="form-group has-feedback">
                            <input type="text" name="name" class="form-control election_search" placeholder="Search By Election Name..."
                                   value="{{old('name')}}">
                            <span class="fa fa-search form-control-feedback"></span>
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                    </div>
                </form>

                <div class="box-body">
                    <table id="search" class="table table-hover table-bordered" width="300">
                        <thead class="bg-gray">
                        <tr>
                            <th>Serial</th>
                            <th>Candidate</th>
                            <th>Area</th>

                            <th>Elections</th>
                            <th>Election Date</th>
                        </tr>

                        </thead>
                        @php
                            $userElections = [];
                            $ids = [];
                            $user_elections = [];
                            $user = 1;
                        @endphp
                        <tbody id="election_data">
                        @if(count($elections->first()->candidates) > 0)
                        @foreach ($elections as $election)
                            @foreach($election->candidates as $key => $candidate)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$candidate->user->name}}</td>
                                    @if (!in_array($candidate->area_id, $ids))
                                        @php
                                            $ids[] = $candidate->area_id ;
                                        @endphp
                                        <td rowspan="{{count($election->candidates->where('area_id',$candidate->area_id))}}">
                                            {{$candidate->area->name}}</td>
                                    @endif
                                    @if (!in_array($election->name, $userElections))
                                        @php
                                            $userElections[] = $election->name;
                                            $now = \Carbon\Carbon::now('Asia/Dhaka')->format('Y-m-d');
                                            /*dd($now,$election->election_date);*/
                                        @endphp
                                        <td rowspan="{{count($election->candidates)}}">{{$election->name}}
                                            @if($election->election_date >= $now)
                                                <span class="label label-success">Active</span>
                                            @endif
                                        </td>

                                        <td rowspan="{{count($election->candidates)}}">{{$election->election_date}}</td>
                                    @endif
                                </tr>
                            @endforeach
                            @php
                                $ids = $userElections = [];
                            @endphp
                        @endforeach
                        @else
                            <tr>
                                <td colspan="5">No matching records found</td>
                            </tr>
                        @endif

                        </tbody>
                    </table>
                    {{$elections->links()}}
                </div>
            </div>

        </div>
    </div>
@stop
@push('base.js')
    <script>
        $(document).on('keyup','.election_search',function(){
            let name = $(this).val();
            console.log(name);
            $.ajax({
                method : "POST",
                url : "{{url('candidate-search')}}",
                data : {
                    name : name,
                    "_token" : "{{csrf_token()}}",
                },
                success : function(result){
                    console.log(result);
                    $('#election_data').html(result);
                }
            })
        })
    </script>
    @endpush
