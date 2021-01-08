@extends('layout.layout', ['page_title' => 'Home'])


@section('page')

@include('layout.header')

@if(Session::get('username'))
Welcome {{ Session::get('username') }}!
@endif

@stop