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
</head>
<body>
	<div class="row header">
		<h1 id="logo" class="col-md-4 header">
			<a href="/dishmotion">Dishmotion</a>
		</h1>
		<p class="col-md-8 header">
			soup-rice delivery service around Universiti Putra Malaysia,Serdang.
		</p>
	</div>
	@yield('content')

	<div class="row footer">
		<p align="center">
			2015@Design by <a href="/home">weilogg.com</a>
			@if(Auth::check())
			<a href="/dishmotion/admin">Admin</a>
			<a href="/dishmotion/logout">Logout</a>
			@else
			<a href="/dishmotion/login-admin">Login</a>
			@endif
		</p>
	</div>
</body>
</html>