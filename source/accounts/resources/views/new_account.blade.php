@extends('layout.layout', ['page_title' => 'Add New Account'])


@section('page')

@include('layout.header')

<section class="container">
  <div style="margin-top:30px;">
    <h5 style="margin-bottom:20px;">Add New Account</h5>
    @if(Session::has('res_msg'))
    <p class="alert {{ Session::get('res_class') }}"><i class="fa fa-info-circle"></i> {{ Session::get('res_msg') }}</p>
    @endif
    <form method="post" action="">
      @csrf
      <div class="form-group">
        <label for="username">Name</label>
        <input type="text" name="_name" class="form-control" id="username">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="_email" class="form-control" id="email">
      </div>
      <div class="form-group">
        <label for="contact">Contact</label>
        <input type="number" name="_contact" class="form-control" id="contact">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="_password" class="form-control" id="password">
      </div>
      <div style="margin-top:15px;">
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </form>
  </div>
</section>
@stop