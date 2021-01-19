@extends('layout.layout', ['page_title' => 'Home - Account Manager'])


@section('page')
@include('layout.header')

<div class="container-fluid p-3" style="min-height:600px">
	<!-- top -->
	<div class="py-2">
		<span style="color:#969698;font-size:22px;font-weight:300;">Today {{ date('M d, Y - l') }}</span>
	</div>

	<!-- user account stats -->
	<section>
		<div class="row text-center font-weight-bold">
			<div class="col-lg-3">
				<div class="card my-2 bg-light">
					<a href="/accounts/all" class="link">
				        <div class="card-body d-flex flex-column">
				        	Registered Accounts
				        	<span class="display-4">{{ $data['total_reg_users'] }}</span>
				        </div>
			    	</a>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="card my-2 bg-light">
			        <a href="/accounts/active" class="link">
				        <div class="card-body d-flex flex-column">
				        	Active Accounts
				        	<span class="display-4">{{ $data['total_act_users'] }}</span>
				        </div>
			    	</a>
				</div>			
			</div>
			<div class="col-lg-3">
				<div class="card my-2 bg-light">
			        <a href="/accounts/inactive" class="link">
				        <div class="card-body d-flex flex-column">
				        	Inactive Accounts
				        	<span class="display-4">{{ $data['total_dct_users'] }}</span>
				        </div>
			    	</a>
				</div>			
			</div>
			<div class="col-lg-3">
				<div class="card my-2 bg-light">
			        <a href="/accounts/suspended" class="link">
				        <div class="card-body d-flex flex-column">
				        	Suspended Accounts
				        	<span class="display-4">{{ $data['total_sus_users'] }}</span>
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
			            <canvas id="chBar"></canvas>
			        </div>
				</div>			
			</div>
			<div class="col-lg-4">
				<div class="card mt-2">
			        <div class="card-body">
			            <canvas id="chDough"></canvas>
			        </div>
				</div>			
			</div>
		</div>
	</section>
</div>
@include('layout.footer')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script type="text/javascript">
var cl = document.getElementById("chLine");
if(cl){
	new Chart(cl,{
		type: 'line',
		data: {!! json_encode($data['line']) !!},
		options: {
			legend: { display: false },
			title: {
	        	display: true,
	        	text: 'Daily Registrations in {{ date('F') }}'
			}
		}
	});
}
var cb = document.getElementById("chBar");
if(cb){
	new Chart(cb,{
		type: 'bar',
		data: {!! json_encode($data['bar']) !!},
		options: {
			legend: { display: false },
			title: {
        	display: true,
        	text: 'Monthly Registrations in {{ date('Y') }}'
		}
	},
	scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true,
            },
        }]
    }
  });
}
var cd = document.getElementById("chDough");
if(cd){
	new Chart(cd,{
	type: 'doughnut',
	data: {!! json_encode($data['doughnut']) !!},
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