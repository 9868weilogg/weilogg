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
		<p>Then inform GateReady <a href="/gateready/record/{{ Auth::user()->id }}/schedule-delivery" title="Schedule Delivery">here</a>.</p>
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
			@if($records->isEmpty())

			<tr>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
			</tr>
			
			@else
			@foreach($records as $record)
			
			<tr>
				<td>{{ $record->reference_number }}</td>
				<td>{{ $record->schedule_date }}</td>
				<td>{{ $time_range[$record->reference_number]->name }}</td>
				<!-- to allow customer to reschedule and give feedback -->
				<!-- reschedule link -->
				@if($status[$record->reference_number]->name == 'reschedule')
				<td><a href="/gateready/record/{{ Auth::user()->id }}/reschedule-delivery/{{$record->reference_number}}" title="Reschedule Delivery">{{ $status[$record->reference_number]->name }}</a></td>
				<!-- "departed status" -->
				@elseif($status[$record->reference_number]->name == 'departed')
				<td>{{ $status[$record->reference_number]->name }}</td>
				<!-- "schedule status" -->
				@elseif($status[$record->reference_number]->name == 'schedule')
				<td>{{ $status[$record->reference_number]->name }}</td>
				<!-- "pending status" -->
				@elseif($status[$record->reference_number]->name == 'pending')
				<td>{{ $status[$record->reference_number]->name }}</td>
				<!-- "verefied status" -->
				@elseif($status[$record->reference_number]->name == 'verified')
				<td>{{ $status[$record->reference_number]->name }}</td>
				<!-- give feedback link -->
				@elseif($status[$record->reference_number]->name == 'sent')
				<td>
					<select name="forma" onchange="location = this.value;">
						<option selected>{{ $status[$record->reference_number]->name }}</option>
						<option value="/gateready/record/{{ Auth::user()->id }}/feedback/{{$record->reference_number}}">Rate Our Service</option>
						<option value="/gateready">Print Your Receipt</option>
					</select>
				</td>
				@endif
			</tr>
			
			@endforeach
			@endif
		</tbody>
	</table>

@endsection