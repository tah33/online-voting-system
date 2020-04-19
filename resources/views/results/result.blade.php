@extends('layouts.backend.master')
@section('backend.title', $title)
@section('master.content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Result Declaration Area</h3>
                </div>
{{--
                <form action="javascript:void(0)" method="post">
                    <div class="col-md-4 pull-right">
                        <div class="form-group has-feedback">
                            <input type="text" name="name" class="form-control election_search" placeholder="Search By Election Name..."
                                   value="{{old('name')}}" autofocus>
                            <span class="fa fa-search form-control-feedback"></span>
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                    </div>
                </form>--}}
                <div class="box-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th style="text-align: center">No.</th>
                            <th style="text-align: center">Party Name</th>
                            <th style="text-align: center">Seats Win</th>
                            <th style="text-align: center">Total Seats</th>
                            <th style="text-align: center">Winner</th>
                            <th style="text-align: center">Election Name</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                        </thead>
                        @php
                            $count = 1;
                        @endphp
                        <tbody id="election_data" align="center">
                        @if(count($parties) > 0)
                            @foreach ($parties as $key => $party)
                                <tr style="text-align: center">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $party->party->name }}</td>
                                    <td>{{ $party->seats  }} </td>
                                  {{--  @php
                                        $winner = $parties->where('seat',$parties->max('seat'));
                                    @endphp--}}
                                    @if($count != 0)
                                        <td rowspan="{{count($parties)}}">{{ count(($election->candidates->groupBy('area_id'))) }}</td>
                                        <td rowspan="{{count($parties)}}">{{$election->winner}}

                                        </td>
                                        <td rowspan="{{count($parties)}}">{{$election->name}}</td>
                                        <td valign="bottom" rowspan="{{count($parties)}}"><a href="{{url('results',$party->election_id)}}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-eye"></i></a></td>
                                    @endif
                                    @php
                                        $count = 0;
                                    @endphp

                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('base.js')
    <script>
        $(document).on('keyup','.election_search',function(){
            let name = $(this).val();
            console.log(name);
            $.ajax({
                method : "POST",
                url : "{{url('result-search')}}",
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
