@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome {{Auth::user()->name}} </p>
    <p>You are Voter</p>
@stop
