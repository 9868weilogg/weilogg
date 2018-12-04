@extends('layouts.dishmotion-app')

@section('title')
Admin
@endsection

@section('content')

<div class="row">
	<div class="col-md-8 summary">
		<h2>
			Order Summary
		</h2>
		<table class="table table-border table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Quantity</th>
					<th>Kolej</th>
					<th>Contact</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($orders as $order)
				<tr>
					<!--  parse data from controller  -->
					
					<td>{{ $order->name }}</td>
					<td>{{ $order->quantity }}</td>
					<td>{{ $order->kolej }}</td>
					<td>{{ $order->contact }}</td>
					
					
					<!--  hard code  
					<td>William</td>
					<td>2</td>
					<td>K10 (Kolej Sepuluh)</td>
					<td>017-1234567</td>
					-->
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>
	<div class="col-md-4 filter">
		<h2>
			Choose Order Time
		</h2>
		<form method="get" action="/dishmotion/admins">
			<div class="form-group">
				<label for="start_date">Start Date:</label>
				<input name="start_date" type="date" class="form-control">
			</div>
			<div class="form-group">
				<label for="end_date">End Date:</label>
				<input name="end_date" type="date" class="form-control">
			</div>
      <input name="filter_order" type="hidden" value="1">
			<button type="submit" value="Filter" class="btn btn-primary">Filter</button>
		</form>
	</div>
</div>



@endsection

