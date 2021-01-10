@extends('layout.layout', ['page_title' => 'Home - Account Manager'])


@section('page')
@include('layout.header')

<div class="container-fluid p-3" style="min-height:400px">
	<!-- add new button -->
	<div>
		<a class="btn btn-light my-1" href="/accounts/new" role="button" data-toggle="tooltip" data-placement="bottom" title="Create New Account"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a>
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
				        	<span class="display-4">0</span>
				        </div>
			    	</a>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="card my-2 bg-light">
			        <a href="/accounts/active" class="link">
				        <div class="card-body d-flex flex-column">
				        	Total Active Users
				        	<span class="display-4">0</span>
				        </div>
			    	</a>
				</div>			
			</div>
			<div class="col-lg-3">
				<div class="card my-2 bg-light">
			        <a href="/accounts/pending" class="link">
				        <div class="card-body d-flex flex-column">
				        	Pending Activation Requests
				        	<span class="display-4">0</span>
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
  labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"],
  datasets: [{
  	label: "User Registered",
    data: [4, 6, 0, 9, 3, 7, 12],
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
        text: 'Daily Registrations in January'
		}
	}
  });
}
</script>

<script type="text/javascript">
var chartData = {
  labels: ["Jan" , "Feb" , "Mar" , "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
  datasets: [{
  	label: "User Registered",
    data: [589, 445, 483, 503, 689, 692, 634],
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
        text: 'Monthly Registrations in 2021'
		}
	}
  });
}
</script>

<script type="text/javascript">
var chartData = {
  labels: ["Activated", "Deactivated", "Pending"],
  datasets: [{
  	backgroundColor: ["#cbccce", "#8e8d8d", "#6f6f6f"],
    data: [10, 2, 0, 0],
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