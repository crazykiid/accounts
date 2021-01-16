@extends('layout.layout', ['page_title' => 'Add New Account'])


@section('page')

@include('layout.header')

<div class="container-fluid p-3" style="min-height:400px">

    @if(Session::has('res_msg'))
    @if(Session::get('res_class') == 'alert-success')
    <div class="alert {{ Session::get('res_class') }}" role="alert"><i class="fa fa-check" aria-hidden="true"></i> {{ Session::get('res_msg') }}</div>
    @endif
    @if(Session::get('res_class') == 'alert-danger')
    <div class="alert {{ Session::get('res_class') }}" role="alert"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> {{ Session::get('res_msg') }}</div>
    @endif
    @endif

    <!-- add user account -->
    <section>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 style="padding:5px 0px 35px;">Create Account</h4>
                    <div class="pull-right">
                    </div>
                </div>
                <form class="py-3" method="post" action="" style="border-top:1px solid #ced4da;">
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
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Create</button>
                    </div>
                </form>            
            </div>
        </div>
    </section>
</div>
@include('layout.footer')
@stop