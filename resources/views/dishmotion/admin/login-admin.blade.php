@extends('layouts.dishmotion-app')

@section('title')
Admin Log In
@endsection

@section('content')
<div class="container">
	<div class="row">
		<h1>Log In</h1>
		<form class="col-md-12" method="post" action="/dishmotion/login-admin">
			@csrf
			<div class="form-group">
				<label for="email">Email Address:</label>
				<input name="email" type="text" value="weilogg@gmail.com" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input name="password" type="password" value="Logg5843" class="form-control" required>
			</div>
			<button type="submit" value="LOG IN" class="btn btn-primary">LOG IN</button>
		</form>
	</div>
</div>
@endsection