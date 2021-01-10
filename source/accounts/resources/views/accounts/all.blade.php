@extends('layout.layout', ['page_title' => 'Registered Accounts'])


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

	<!-- user account stats -->
	<section>
		<table class="table table-striped">
			<thead>
			    <tr>
			      	<th scope="col"># status</th>
			    	<th scope="col">Name</th>
			    	<th scope="col">Email</th>
			    	<th scope="col">Contact</th>
			    	<th scope="col">Registration Date</th>
			    	<th scope="col">Actions</th>
			    </tr>
			</thead>
			<tbody>
				@foreach($data as $user)
			    <tr>
			    	<td>
			    	@if($user->_status == 0)
					<span class="badge badge-danger">Inactive</span>
			    	@elseif($user->_status == 1)
			    	<span class="badge badge-success">Active</span>
			    	@elseif($user->_status == 9)
			    	<span class="badge badge-dark">Suspended</span>
			    	@else
			    	<span class="badge badge-secondary">Unknown</span>
			    	@endif
			    	</td>
			    	<td>{{ $user->_name }}</td>
			    	<td>{{ $user->_email }}</td>
			    	<td>{{ $user->_contact }}</td>
			    	<td>{{ $user->_reg_at }}</td>
			    	<td>
			    		<a class="btn btn-outline-secondary btn-sm my-1" href="/accounts/edit/{{ $user->_id }}" role="button" data-toggle="tooltip" data-placement="bottom" title="Edit Account Details"><i class="fa fa-pencil" aria-hidden="true"></i> edit</a>
			    		@if($user->_status == 0)
			    		<a class="btn btn-outline-secondary btn-sm my-1" href="/accounts/unlock/{{ $user->_id }}" role="button" data-toggle="tooltip" data-placement="bottom" title="De-activate Account"><i class="fa fa-unlock-alt" aria-hidden="true"></i> unlock</a>
			    		@elseif($user->_status == 1)
			     		<a class="btn btn-outline-secondary btn-sm my-1" href="/accounts/lock/{{ $user->_id }}" role="button" data-toggle="tooltip" data-placement="bottom" title="De-activate Account"><i class="fa fa-lock" aria-hidden="true"></i> lock</a>
			     		@endif
			     		<a class="btn btn-outline-danger btn-sm my-1" href="/accounts/suspend/{{ $user->_id }}" role="button" data-toggle="tooltip" data-placement="bottom" title="De-activate Account"><i class="fa fa-times" aria-hidden="true"></i> suspend</a>
			      </td>
			    </tr>
			    @endforeach
		  	</tbody>
		</table>
	</section>
</div>
@stop