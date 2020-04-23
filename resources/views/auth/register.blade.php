@extends('layouts.backend.base')
@section('backend.title',$title)
@section('base.content')

    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Registration Form</h3>
            </div>
            <ul class="text-danger fa">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <form action="{{route('register')}}" method="post" enctype="multipart/form-data">@csrf
                        <div class="col-md-4">

                            <label for="">Name</label>
                            <div class="form-group has-feedback">
                                <input type="text" name="name" class="form-control" placeholder="Enter Name"
                                       value="{{old('name')}}" autofocus>
                                <span class="fa fa-user form-control-feedback"></span>
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>

                            <label for="">Username</label>
                            <div class="form-group has-feedback">
                                <input type="text" name="username" class="form-control" placeholder="Enter Username"
                                       value="{{old('username')}}">
                                <span class="fa fa-user form-control-feedback"></span>
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                            </div>

                            <label for="">Email</label>
                            <div class="form-group has-feedback">
                                <input type="email" name="email" class="form-control" placeholder="Enter Email"
                                       value="{{old('email')}}">
                                <span class="fa fa-envelope form-control-feedback"></span>
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>

                            <label for="">Password</label>
                            <div class="form-group has-feedback">
                                <input type="password" name="password" class="form-control" placeholder="Enter Pasword">
                                <span class="fa fa-lock form-control-feedback"></span>
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            </div>

                            <label for="">Confirm Password</label>
                            <div class="form-group has-feedback">
                                <input type="password" name="password_confirmation" class="form-control"
                                       placeholder="Confirm Password">
                                <span class="fa fa-lock form-control-feedback"></span>
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            </div>

                            <label for="">Area</label>
                            <div class="form-group">
                                <select name="area" class="form-control select2">
                                    <option value="">Select Area</option>
                                    @foreach($areas as $area)
                                        <option value="{{$area->id}}">{{$area->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('area') }}</span>
                            </div>

                            <label for="">NID</label>
                            <div class="form-group has-feedback">
                                <input type="number" name="nid" class="form-control" placeholder="Enter NID"
                                       value="{{old('nid')}}">
                                <span class="fa fa-building-o form-control-feedback"></span>
                                <span class="text-danger">{{ $errors->first('nid') }}</span>
                            </div>

                            <input type="submit" class="btn btn-primary btn-sm btn-flat" value="Create Account">

                        </div>

                        <div class="col-md-4">
                            <label for="">Date of Birth</label>
                            <div class="form-group has-feedback">
                                <input type="text" name="dob" class="form-control datepicker"
                                       placeholder="Enter Date Of Birth"
                                       value="{{old('dob')}}">
                                <span class="fa fa-calendar-check-o form-control-feedback"></span>
                                <span class="text-danger">{{ $errors->first('dob') }}</span>
                            </div>

                            <label for="">Gender</label>
                            <div class="form-group has-feedback">
                                <select name="gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                <span class="text-danger">{{ $errors->first('gender') }}</span>
                            </div>

                            <label for="">Role</label>
                            <div class="form-group has-feedback">
                                <select name="role" class="form-control role">
                                    <option value="">Registered As</option>
                                    <option value="candidate">Candidate</option>
                                    <option value="voter">Voter</option>
                                </select>
                                <span class="text-danger">{{ $errors->first('role') }}</span>
                            </div>

                            <div class="candidate" style="display: none">
                                <label for="">Party</label>
                                <div class="form-group has-feedback">
                                    <select name="party" class="form-control">
                                        <option value="">Select Party</option>
                                        @foreach($parties as $party)
                                        <option value="{{$party->id}}">{{$party->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('party') }}</span>
                                </div>
                                <a href="javascript:void(0)" class="add_party">Not Listed Here? Click to add Yours</a>
                            </div>

                            <label for="">Phone</label>
                            <div class="form-group has-feedback">
                                <input type="tel" name="phone" class="form-control"
                                       placeholder="Enter Symbol Name"
                                       value="{{old('phone')}}">
                                <span class="fa fa-phone form-control-feedback"></span>
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            </div>

                            <label for="">Image</label>
                            <div class="form-group has-feedback">
                                <input type="file" name="image" class="form-control">
                                <span class="fa fa-image form-control-feedback"></span>
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            </div>

                        </div>

                        <div class="panel panel-primary party col-md-4" style="display: none">
                            <div class="panel panel-heading">Party Details</div>
                            <label for="">Party Name</label>
                            <div class="form-group has-feedback">
                                <input type="text" name="party_name" class="form-control"
                                       placeholder="Enter Party Name"
                                       value="{{old('party_name')}}">
                                <span class="fa fa-user form-control-feedback"></span>
                                <span class="text-danger">{{ $errors->first('party_name') }}</span>
                            </div>

                            <label for="">Symbol Name</label>
                            <div class="form-group has-feedback">
                                <input type="text" name="symbol_name" class="form-control"
                                       placeholder="Enter Symbol Name" value="{{old('symbol_name')}}">
                                <span class="fa fa-user form-control-feedback"></span>
                                <span class="text-danger">{{ $errors->first('symbol_name') }}</span>
                            </div>

                            <label for="">Symbol</label>
                            <div class="form-group has-feedback">
                                <input type="file" name="symbol" class="form-control">
                                <span class="fa fa-image form-control-feedback"></span>
                                <span class="text-danger">{{ $errors->first('symbol') }}</span>
                            </div>
                        </div>

                    </form>

                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <p class="text-muted">Already Have an Accunt? <a href="{{route('login')}}"><i class="fa fa-sign-in"></i>
                        Click Here</a></p>
                <p class="text-muted">Go Home <a href="{{url('/')}}"><i class="fa fa-home"></i> Click Here</a></p>
            </div>
        </div>
    </div>
    <!-- /.box -->

@endsection
@push('base.js')
    <script>
        $(document).on('click', '.role', function () {
            let role = $(this).val();
            if (role === 'candidate')
                $('.candidate').show();
            else
                $('.candidate').hide();
        });

        $(document).on('click', '.add_party', function () {
                $('.party').toggle();
        });
    </script>
@endpush
