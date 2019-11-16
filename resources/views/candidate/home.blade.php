@extends('layouts.app')

@section('content')
    <p>Welcome {{Auth::user()->name}} </p>
    <p>You are Candidate</p>
@stop
