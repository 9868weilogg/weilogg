@extends('layouts.gateready.gateready-app')

@section('title')
Delivery Records
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<h1>GateReady Address</h1>
		<p>Jalan Gemia</p>
		<p>Taman Bukit Belimbing</p>
		<p>43300 Seri Kembangan</p>
		<p>Selangor Darul Ehsan</p>
	</div>
	<div class="col-md-12">
		<p>Checkout your online purchases with the address above, as shipment address. </p>
		<p>Then inform GateReady <a href="/gateready/schedule-delivery" title="Schedule Delivery">here</a>.</p>
	</div>
	<table class="table table-striped">
		<thead class="thead-dark">
			<tr>
				<th>Reference Number</th>
				<th>Scheduled Date</th>
				<th>Scheduled Time</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($records as $record)
			<tr>
				<td>{{ $record->reference_number }}</td>
				<td>{{ $record->schedule_date }}</td>
				<td>{{ $time_range[$record->reference_number]->name }}</td>
				<td>{{ $status[$record->reference_number]->name }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

@endsection