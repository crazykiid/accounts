<html>
<head>
	<title>
	@yield('page-title')
	</title>
	<meta name="google-site-verification" content="">
	<meta name="msvalidate.01" content="">
	<!-- basic meta tags - social media meta tags - Facebook Open Graph - Twitter Cards -->
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, minimal-ui, user-scalable=no">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta property="og:title" content="">
	<meta property="og:description" content="">
	<meta property="og:image" content="">
	<meta property="og:url" content="">
	<meta property="og:site_name" content="">
	<meta property="og:type" content="website">
	<meta property="twitter:card" content="summary">
	<meta property="twitter:title" content="">
	<meta property="twitter:image" content="">
	<meta property="twitter:url" content="">
	<meta property="twitter:description" content="">
	<!-- end of SMMT - FOG - TC -->
	<link rel="canonical" href="">
	<link rel="shortcut icon" href="" type="image/x-icon">
	<link rel="stylesheet" href="" type="text/css" media="all">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<!-- navbar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="container-fluid">

	    <a class="navbar-brand" href="/">ACCOUNT MANAGER</a>

	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>

	    <div class="collapse navbar-collapse" id="navbarNavDropdown">
	      <ul class="navbar-nav">
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="/">Home</a>
	        </li>
	        <li class="nav-item dropdown">
	          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            Accounts
	          </a>
	          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	            <li><a class="dropdown-item" href="/account/new">Add New Account</a></li>
	            <li><a class="dropdown-item" href="/account/all">Registered Accounts</a></li>
	          </ul>
	        </li>
					<li class="nav-item dropdown">
	          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            Setting
	          </a>
	          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	            <li><a class="dropdown-item" href="/admin/details">Admin Details</a></li>
	            <li><a class="dropdown-item" href="/admin/change-password">Change Password</a></li>
	          </ul>
	        </li>
	      </ul>
	    </div>

	  </div>
	</nav>

	@yield('content')
	<footer>
	</footer>
</body>
</html>