@extends('layouts.gateready.gateready-app')

@section('title')
Schedule A Delivery
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<h1>Inform GateReady about your online purchases' details to schedule a delivery</h1>
	</div>
	<div class="col-md-12">
		<div>
			@foreach($errors as $error)
			{{ $error }}
			@endforeach
		</div>
		<form method="post" action="/gateready/record/schedule-delivery">
			@csrf
			<div class="form-group">
				<label for="user_id">User ID</label>
				<input name="user_id" type="text" class="form-control" value="1234" required>
				@if($errors->has('user_id'))
				<span class="invalid-feedback" role="alert">
					{{ $errors->first('user_id') }}
				</span>
				@endif
			</div>
			
			<div class="form-group">
				<label for="package_id">Choose A Plan</label>
				<select name="package_id" class="form-control" required>
					<option></option>
					<option value="1" selected>RM 3.50 per delivery (less than 5kg)</option>
				</select>
				@if($errors->has('package_id'))
				<span class="invalid-feedback" role="alert">
					{{ $errors->first('package_id') }}
				</span>
				@endif
			</div>
			<div class="form-group">
				<label for="tracking_number">Tracking Number</label>
				<input name="tracking_number" type="text" class="form-control" value="1234" required>
			</div>
			<div class="form-group">
				<label for="courier_id">Courier</label>
				<select name="courier_id" class="form-control" required>
					<option></option>
					<option value="1" selected>GDex</option>
				</select>
				@if($errors->has('courier_id'))
				<span class="invalid-feedback" role="alert">
					{{ $errors->first('courier_id') }}
				</span>
				@endif
			</div>
			<div class="form-group">
				<label for="schedule_date">Schedule Your Available Date</label>
				<input name="schedule_date" type="date" class="form-control" value="1234" required>
				@if($errors->has('schedule_date'))
				<span class="invalid-feedback" role="alert">
					{{ $errors->first('schedule_date') }}
				</span>
				@endif
			</div>
			<div class="form-group">
				<label for="time_range_id">Schedule Your Available Time</label>
				<select name="time_range_id" class="form-control" required>
					<option></option>
					<option value="1" selected>8pm - 10pm</option>
				</select>
				@if($errors->has('time_range_id'))
				<span class="invalid-feedback" role="alert">
					{{ $errors->first('time_range_id') }}
				</span>
				@endif
			</div>
			<div class="form-group">
				<button name="submit_button" type="submit" class="btn btn-outline-primary">Schedule</button>
			</div>
		</form>
	</div>
</div>


@endsection




