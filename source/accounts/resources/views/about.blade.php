@extends('layout.layout', ['page_title' => 'This Project'])


@section('page')
@include('layout.header')

<div class="container-fluid p-3">
	<section>
		<h4 style="padding:30px 0px 12px;margin:0px;">This Project</h4>
        <div>
        	<p>
          	Hi there, I am here again with a new project. I was learning Laravel, So I have decided to create a project side by side by implimenting this I was reading about.<br>
            In this project I'm using Bootstrap(v4.0) with Fontawesome(v4.7) for front-end development, Chart.js(v2.8) for data visualization and back-end is powered by Laravel 8 and MySQL.
        	</p>
            <b>Concept:</b><br>
            <ul>
            	<li>Admin is main user, who has power to create a new user, modify user or delete user.</li>
            	<li>Admin can deactivate a user temporarily or can delete a user permanently.</li>
            	<li>Admin can see daily, monthly user registration data and other data in form of visual data charts at dashboard.</li>
            </ul>
        	</p>
        </div>
	</section>
</div>
@include('layout.footer')
@stop