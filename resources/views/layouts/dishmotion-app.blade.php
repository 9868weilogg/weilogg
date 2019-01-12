<!doctype html>
<html lang="en">

<head>
	<title>
	@yield('title') | Dishmotion - soup-rice delivery service around Universiti Putra Malaysia,Serdang.
	</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

	<!-- owner's style remote&local server-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/dishmotion-style.css') }}">

	<!-- footer mdbootstrap code -->
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Bootstrap core CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.10/css/mdb.min.css" rel="stylesheet">
</head>
<body>
	
		<div class="row header">
			<h1 id="logo" class="header">
				<a href="/dishmotion/home">Dishmotion</a> <span class="header">
				soup-rice delivery service around Universiti Putra Malaysia,Serdang.
			</span>
		</div>
			</h1>
			
	@yield('content')

	
	<!-- Footer -->
	<footer class="page-footer font-small blue">

	  <!-- Copyright -->
	  <div class="footer-copyright text-center py-3">&copy; 2015 Copyright:
	    <a href="http://weilogg.com">weilogg.com</a>
	  </div>
	  <!-- Copyright -->
	  <!-- Copyright -->
	  <div class="footer-copyright text-center py-3">
	    {{-- @if(Auth::check()) --}}
		<a href="/dishmotion/admins">Admin</a>
		{{-- <a href="/dishmotion/logout">Logout</a> --}}
		{{-- @else --}}
		{{-- <a href="/dishmotion/login-admin">Login</a> --}}
		{{-- @endif --}}
	  </div>
	  <!-- Copyright -->

	</footer>
	<!-- Footer -->
	
</body>
</html>