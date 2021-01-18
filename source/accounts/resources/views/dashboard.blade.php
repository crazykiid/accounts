@extends('layout.layout', ['page_title' => 'Home - Account Manager'])


@section('page')
@include('layout.header')

<div class="container-fluid p-3" style="min-height:400px">
	<!-- add new button -->
	<div>
		<a class="btn btn-light my-1" href="/accounts/new" role="button" data-toggle="tooltip" data-placement="right" title="Create New Account"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a>
	</div>

	<!-- user account stats -->
	<section>
		<div class="row text-center font-weight-bold">
			<div class="col-lg-3">
				<div class="card my-2 bg-light">
			        <a href="#" class="link">
				        <div class="card-body d-flex flex-column">
				        	Site Status
				        	<span class="display-4">Active</span>
				        </div>
			    	</a>
				</div>			
			</div>
			<div class="col-lg-3">
				<div class="card my-2 bg-light">
					<a href="/accounts/all" class="link">
				        <div class="card-body d-flex flex-column">
				        	Total Registered Users
				        	<span class="display-4">{{ $data['total_reg_users'] }}</span>
				        </div>
			    	</a>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="card my-2 bg-light">
			        <a href="/accounts/active" class="link">
				        <div class="card-body d-flex flex-column">
				        	Total Active Users
				        	<span class="display-4">{{ $data['total_act_users'] }}</span>
				        </div>
			    	</a>
				</div>			
			</div>
			<div class="col-lg-3">
				<div class="card my-2 bg-light">
			        <a href="/accounts/inactive" class="link">
				        <div class="card-body d-flex flex-column">
				        	Total Inactive Users
				        	<span class="display-4">{{ $data['total_dct_users'] }}</span>
				        </div>
			    	</a>
				</div>			
			</div>
		</div>
	</section>

	<!-- visual data part -->
	<section>
		<div class="row">
			<div class="col-lg-4">
				<div class="card mt-2">
			        <div class="card-body">
			            <canvas id="chLine"></canvas>
			        </div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="card mt-2">
			        <div class="card-body">
			            <canvas id="chLine2"></canvas>
			        </div>
				</div>			
			</div>
			<div class="col-lg-4">
				<div class="card mt-2">
			        <div class="card-body">
			            <canvas id="chLine3"></canvas>
			        </div>
				</div>			
			</div>
		</div>
	</section>
</div>
@include('layout.footer')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script type="text/javascript">
var chartData = {
  labels: {!! json_encode($data['line']['labels']) !!},
  datasets: [{
  	label: "User Registered",
    data: {{ json_encode($data['line']['data']) }},
  }]
};

var chLine = document.getElementById("chLine");
if (chLine) {
  new Chart(chLine, {
  type: 'line',
  data: chartData,
  options: {
    legend: { display: false },
		title: {
        display: true,
        text: 'Daily Registrations in {{ date('F') }}'
		}
	}
  });
}
</script>

<script type="text/javascript">
var chartData = {
  labels: {!! json_encode($data['bar']['labels']) !!},
  datasets: [{
  	label: "User Registered",
    data: {{ json_encode($data['bar']['data']) }},
  }]
};

var chLine2 = document.getElementById("chLine2");
if (chLine2) {
  new Chart(chLine2, {
  type: 'bar',
  data: chartData,
  options: {
    legend: { display: false },
		title: {
        display: true,
        text: 'Monthly Registrations in {{ date('Y') }}'
		}
	}
  });
}
</script>

<script type="text/javascript">

var chartData = {
  labels: {!! json_encode($data['doughnut']['labels']) !!},
  datasets: [{
  	backgroundColor: ["#5ee25e", "#ff4a4a", "#a9a6a6"],
    data: {{ json_encode($data['doughnut']['data']) }},
  }]
};

var chLine3 = document.getElementById("chLine3");
if (chLine3) {
	new Chart(chLine3, {
	type: 'doughnut',
	data: chartData,
	options: {
		title: {
        	display: true,
        	text: 'User Account Status'
		}
	}
	});
}
</script>
@stop