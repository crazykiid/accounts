@extends('layout.layout', ['page_title' => 'Change Admin Password'])


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
                    <h4 style="padding:5px 0px 35px;">Change Admin Password</h4>
                    <div class="pull-right">
                    </div>
                </div>
                <form class="py-3" method="post" action="">
                            @csrf
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" name="_password" class="form-control" id="password">
                            </div>
                            <div style="margin-top:15px;">
                                <button type="submit" class="btn btn-outline-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Update Password</button>
                            </div>
                </form>            
            </div>
        </div>
    </section>
</div>
@include('layout.footer')
@stop