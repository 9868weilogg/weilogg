@extends('layouts.gateready.gateready-app')

@section('title')
Reschedule Delivery
@endsection

@section('content')
<div class="container">
<div class="row">
	<div class="col-md-12">
		<h1>Reschedule Your Delivery</h1>
	</div>
	<div class="col-md-12">
		<div>
			@foreach($errors as $error)
			{{ $error }}
			@endforeach
		</div>
		<form method="post" action="/gateready/record/{{ Auth::user()->id }}/reschedule-delivery/{{$record_reference_number}}">
			@csrf
			
			<div class="form-group row">
				<label class="col-form-label col-md-4 text-md-right" for="schedule_date">Schedule Your Available Date</label>
				<div class="col-md-8">
					<input name="schedule_date" type="date" class="form-control" value="1234" required>
					@if($errors->has('schedule_date'))
					<span class="invalid-feedback" role="alert">
						{{ $errors->first('schedule_date') }}
					</span>
					@endif
				</div>
			</div>
			<div class="form-group row">
				<label class="col-form-label col-md-4 text-md-right" for="time_range_id">Schedule Your Available Time</label>
				<div class="col-md-8">
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
			</div>
			<div class="form-group">
				
					<button name="submit_button" type="submit" class="btn btn-outline-primary  col-md-6 ">Reschedule</button>
				
			</div>
		</form>
	</div>
</div>
</div>





@endsection







