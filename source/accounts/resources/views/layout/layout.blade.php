<html>
<head>
	<title>
@if(isset($page_title))
	{{ $page_title }}
@else
	Accounts - By Crazykid
@endif
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<style>
	.link{
		color:rgba(0,0,0,.5);
	}
	.link:hover{
		color:rgba(0,0,0,.7);
		text-decoration:none;
	}
	.alert-info {
    	color:#6d6d6d;
    	background-color:#f5f7f7;
    	border-color:#e4e4e4;
	}
	.c-g{
		color:#0bce0b;
	}
	.c-r{
		color:#ce0b0b;
	}
	#myInput {
  background-image: url('/css/searchicon.png'); /* Add a search icon to input */
  background-position: 10px 12px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 100%; /* Full-width */
  font-size: 16px; /* Increase font-size */
  padding: 12px 20px 12px 40px; /* Add some padding */
  border: 1px solid #ddd; /* Add a grey border */
  margin-bottom: 12px; /* Add some space below the input */
}
	</style>
</head>
<body>
@yield('page')
</body>
</html>