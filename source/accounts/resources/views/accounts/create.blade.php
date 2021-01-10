@extends('layout.layout', ['page_title' => 'Add New Account'])


@section('page')

@include('layout.header')

<section class="container">
    <div style="margin-top:30px;">
        <h5 style="margin-bottom:20px;">Add New Account</h5>
        @if(Session::has('res_msg'))
        @if(Session::get('res_class') == 'alert-success')
            <div class="alert {{ Session::get('res_class') }}" role="alert"><i class="fa fa-check" aria-hidden="true"></i> {{ Session::get('res_msg') }}</div>
        @endif
        @if(Session::get('res_class') == 'alert-danger')
            <div class="alert {{ Session::get('res_class') }}" role="alert"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> {{ Session::get('res_msg') }}</div>
        @endif
        @endif
        <form method="post" action="">
            @csrf
            <div class="form-group">
                <label for="username">Name</label>
                <input type="text" name="_name" class="form-control" id="username" value="@if(Session::has('res_data')){{Session::get('res_data._name')}}@endif">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="_email" class="form-control" id="email" value="@if(Session::has('res_data')){{Session::get('res_data._email')}}@endif">
            </div>
            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="number" name="_contact" class="form-control" id="contact" value="@if(Session::has('res_data')){{Session::get('res_data._contact')}}@endif">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="_password" class="form-control" id="password" value="@if(Session::has('res_data')){{Session::get('res_data._password')}}@endif">
            </div>
            <div style="margin-top:15px;">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
            </div>
        </form>
    </div>
</section>
@stop