@extends('layout.layout', ['page_title' => 'User Accounts'])


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

	<!-- user accounts -->
	<section>
		<div class="card">
			<div class="card-body">
				<div class="d-flex flex-column flex-lg-row justify-content-between">
					<h4 style="padding:5px 0px 35px;">User Accounts</h4>
					<div class="form-group pull-right">
					    <input type="text" class="search form-control" placeholder="search">
					</div>
				</div>
				<div class="table-responsive">
				<table class="table table-striped">
					<thead>
					    <tr>
					      	<th scope="col">status</th>
					    	<th scope="col">Name</th>
					    	<th scope="col">Email</th>
					    	<th scope="col">Contact</th>
					    	<th scope="col">Registration Date</th>
					    	<th scope="col">Actions</th>
					    	<th scope="col">Access Control</th>
					    </tr>
					</thead>
					<tbody class="u-list">
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
					    	<td>{{ date("M d, Y", strtotime($user->_reg_at)) }}</td>
					    	<td>
								<a class="btn btn-outline-secondary btn-sm my-1" href="/accounts/update/{{ $user->_id }}" role="button" data-toggle="tooltip" data-placement="bottom" title="Edit Account Details"><i class="fa fa-pencil" aria-hidden="true"></i> edit</a>
					    	</td>
					    	<td>
					    		@if($user->_status == 9)
								<a class="btn btn-outline-success btn-sm my-1" href="/accounts/activate/{{ $user->_id }}" role="button" data-toggle="tooltip" data-placement="bottom" title="Activate Account"><i class="fa fa-check" aria-hidden="true"></i> activate</a>
					    		@elseif($user->_status == 0)
					    		<a class="btn btn-outline-danger btn-sm my-1" href="/accounts/suspend/{{ $user->_id }}" role="button" data-toggle="tooltip" data-placement="bottom" title="De-activate Account"><i class="fa fa-times" aria-hidden="true"></i> suspend</a>
					    		<a class="btn btn-outline-secondary btn-sm my-1" href="/accounts/unlock/{{ $user->_id }}" role="button" data-toggle="tooltip" data-placement="bottom" title="Unlock Account"><i class="fa fa-unlock-alt" aria-hidden="true"></i> unlock</a>
					    		@elseif($user->_status == 1)
					     		<a class="btn btn-outline-danger btn-sm my-1" href="/accounts/suspend/{{ $user->_id }}" role="button" data-toggle="tooltip" data-placement="bottom" title="De-activate Account"><i class="fa fa-times" aria-hidden="true"></i> suspend</a>
					     		<a class="btn btn-outline-secondary btn-sm my-1 px-3" href="/accounts/lock/{{ $user->_id }}" role="button" data-toggle="tooltip" data-placement="bottom" title="Lock Account"><i class="fa fa-lock" aria-hidden="true"></i> lock</a>
					     		@endif
					      </td>
					    </tr>
					    @endforeach
				  	</tbody>
				</table>
				</div>
			</div>
		</div>
	</section>
</div>
@include('layout.footer')
<script>
function status(code){
	if(code == 0){
		return '<span class="badge badge-danger">Inactive</span>';
	}
	else if(code == 1){
		return '<span class="badge badge-success">Active</span>';
	}
	else if(code == 9){
		return '<span class="badge badge-dark">Suspended</span>';
	}
	else{
		return '<span class="badge badge-secondary">Unknown</span>';
	}
}

function actions(code, id){
	if(code == 0){
		return '<a class="btn btn-outline-danger btn-sm my-1" href="/accounts/suspend/'+id+'" role="button" data-toggle="tooltip" data-placement="bottom" title="De-activate Account"><i class="fa fa-times" aria-hidden="true"></i> suspend</a> <a class="btn btn-outline-secondary btn-sm my-1" href="/accounts/unlock/'+id+'" role="button" data-toggle="tooltip" data-placement="bottom" title="Unlock Account"><i class="fa fa-unlock-alt" aria-hidden="true"></i> unlock</a>';
	}
	else if(code == 1){
		return '<a class="btn btn-outline-danger btn-sm my-1" href="/accounts/suspend/'+id+'" role="button" data-toggle="tooltip" data-placement="bottom" title="De-activate Account"><i class="fa fa-times" aria-hidden="true"></i> suspend</a> <a class="btn btn-outline-secondary btn-sm my-1 px-3" href="/accounts/lock/'+id+'" role="button" data-toggle="tooltip" data-placement="bottom" title="Lock Account"><i class="fa fa-lock" aria-hidden="true"></i> lock</a>';
	}
	else if(code == 9){
		return '<a class="btn btn-outline-success btn-sm my-1" href="/accounts/activate/'+id+'" role="button" data-toggle="tooltip" data-placement="bottom" title="Activate Account"><i class="fa fa-check" aria-hidden="true"></i> activate</a>';
	}
	else{
		return null;
	}
}
function date(raw){
	var formatted = null, t, months;
	months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
	t = raw.split(/[- :]/);
	formatted = months[t[1]-1]+' '+t[2]+', '+t[0];
	return formatted;
}

function resultList(d, q){
	var data = {'q':q, '_token':'{{csrf_token()}}'}, row;
    $.ajax({
        type:'POST',
        url:'/accounts/search/',
		dataType: 'json',
		data: data,
		success:function(res){
			var count = res.data.length;
			if(count){
				var i = 0;
				while(i < count){
					row = row + '<tr><td>'+status(res.data[i]._status)+'</td><td>'+res.data[i]._name+'</td><td>'+res.data[i]._email+'</td><td>'+res.data[i]._contact+'</td><td>'+date(res.data[i]._reg_at)+'</td><td><a class="btn btn-outline-secondary btn-sm my-1" href="/accounts/update/'+res.data[i]._id+'" role="button" data-toggle="tooltip" data-placement="bottom" title="Edit Account Details"><i class="fa fa-pencil" aria-hidden="true"></i> edit</a></td><td>'+actions(res.data[i]._status, res.data[i]._id)+'</td></tr>';
					i++;
				}
			}
			else{
				row = '<tr><td colspan="7" style="padding:1rem .75rem;">No Results Found.</td></tr>';
			}
			d.empty().append(row);
		},
		error: function(res){
			row = '<tr><td colspan="7" style="padding:1rem .75rem;">Error Occurred, Try Again.</td></tr>';
			d.empty().append(row);
		}
	});
}

$(document).ready(function(){
	const listDom = $(".u-list");
	const oldList = listDom.html();
	$(".search").keyup(function(){
		var query = $(".search").val();
	    if(query.length >= 3){
	    	resultList(listDom, query);
	    }
	    else{
	    	listDom.empty().append(oldList);
	    }
	});
});
</script>
@stop