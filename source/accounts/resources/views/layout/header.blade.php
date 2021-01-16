<header>
	<!-- navbar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">

		<a class="navbar-brand" href="/" style="border-left:5px solid gray;padding-left:10px;margin-right:0px;">ACCOUNT MANAGER</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse flex-row-reverse" id="navbarNavDropdown">
		    <ul class="navbar-nav">
		    	<li class="nav-item p-2">
		        	<a class="nav-link" aria-current="page" href="/"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
		    	</li>
		    	<li class="nav-item p-2">
		        	<a class="nav-link" aria-current="page" href="/about"><i class="fa fa-comment-o" aria-hidden="true"></i> This Project</a>
		    	</li>
		    	<li class="nav-item dropdown p-2">
		        	<a class="nav-link dropdown-toggle" href="#" id="accountDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		        	<i class="fa fa-book" aria-hidden="true"></i> Accounts
		        	</a>
		        	<div class="dropdown-menu dropdown-menu-right" aria-labelledby="accountDropdown">
		        		<a class="dropdown-item" href="/accounts/all">User Accounts</a>
		        		<hr class="dropdown-divider">
		        		<a class="dropdown-item" href="/accounts/new"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a>
		        	</div>
		    	</li>
		    	<li class="nav-item dropdown p-2">
		        	<a class="nav-link dropdown-toggle" href="#" id="adminDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:#e5e5e5;border-radius:.25rem;">
		        		<i class="fa fa-user-circle" aria-hidden="true"></i>
		        		@if(Session::has('admin_uname')){{Session::get('admin_uname')}}@endif
		        	</a>
		        	<div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminDropdown">
		            	<a class="dropdown-item" href="/admin/change-password">Change Password</a>
		            	<hr class="dropdown-divider">
		            	<a class="dropdown-item" href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
		        	</div>
		    	</li>
		    </ul>
		</div>
	</nav>
</header>