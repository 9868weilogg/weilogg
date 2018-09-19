@extends('layouts.gateready.gateready-app')

@section('title')
Feedback to GateReady
@endsection

@section('content')

<div class="container">
<div class="row">
	<div class="col-md-12">
		<h1>Feedback to us, we will serve you better.</h1>
	</div>
	<div class="col-md-12">
		@if($errors)
		@foreach($errors as $error)
		{{ $error }}
		@endforeach
		@endif
		<form method="post" action="/gateready/record/{{ Auth::user()->id }}/feedback/{{ $record_reference_number }}">
			@csrf
			<div class="form-group">
				<label for="msg">Feedback Message</label>
				<textarea rows="4" cols="50" name="msg" placeholder="Enter Your Message Here..." class="form-control" autofocus required></textarea>
			</div>
			<div class="form-group">
				<input class="form-control btn btn-outline-primary" role="button" type="submit" value="Submit">
			</div>
		</form>
	</div>
</div>
</div>



@endsection




