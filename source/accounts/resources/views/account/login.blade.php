@extends('layout.layout', ['page_title' => 'Welcome to accounts!'])

@section('page')
<section class="container">
  <div style="max-width:330px;margin:100px auto 0px;">
    <h5 style="margin-bottom:25px;text-align:center;">L O G I N</h5>
    @if(Session::has('res_msg'))
    <p class="alert {{ Session::get('res_class') }}"><i class="fa fa-info-circle"></i> {{ Session::get('res_msg') }}</p>
    @endif
    <form method="post" action="">
      @csrf
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="_username" class="form-control" id="username" placeholder="">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="_password" class="form-control" id="password" placeholder="">
      </div>
      <div style="margin-top:15px;">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </form>
  </div>
</section>
@stop