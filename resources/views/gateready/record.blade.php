@extends('layouts.gateready.gateready-app')

@section('title')
Delivery Records
@endsection

@section('css-code')
<style>
body{
	background-color: #ECECEC;
}
h1.record{
	text-align: center;
    padding:10px 20px;
    font-size: 30px;
}
h2.record{
	text-align: center;
    padding:10px 20px;
    font-size: 20px;
    border: 1px solid #000;
    color:white;
    background-color: #000;
}
p.record {
	text-align:  center;
    padding:10px auto;
    font-size: 16px;
    
}
</style>
@endsection

@section('content')
<div class="container">
<div class="row">
	<div class="col-md-12">
		<h1 class="record">GateReady Address</h1>
		<p class="record">Jalan Gemia<br>
		Taman Bukit Belimbing<br>
		43300 Seri Kembangan<br>
		Selangor Darul Ehsan</p>
	</div>
	<div class="col-md-12">
		<p class="record">Checkout your online purchases with the address above, as shipment address. <br>
		Then inform GateReady <a href="/gateready/record/{{ Auth::user()->id }}/schedule-delivery" title="Schedule Delivery">here</a>.</p>
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
				<td><a href="/gateready/record/{{ Auth::user()->id }}/reschedule-delivery/{{$record->reference_number}}" title="Reschedule Delivery">{{ $status[$record->reference_number]->name }}</a> | <a href="/gateready/record/{{ Auth::user()->id }}/invoice/{{$record->reference_number}}" title="Print Delivery Invoice">Print Invoice</a></td>
				
				<!-- "departed status" -->
				@elseif($status[$record->reference_number]->name == 'departed')
				<td>{{ $status[$record->reference_number]->name }} | <a href="/gateready/record/{{ Auth::user()->id }}/invoice/{{$record->reference_number}}" title="Print Delivery Invoice">Print Invoice</a></td>
				<!-- "schedule status" -->
				@elseif($status[$record->reference_number]->name == 'schedule')
				<td>{{ $status[$record->reference_number]->name }} | <a href="/gateready/record/{{ Auth::user()->id }}/invoice/{{$record->reference_number}}" title="Print Delivery Invoice">Print Invoice</a></td>
				<!-- "pending status" -->
				@elseif($status[$record->reference_number]->name == 'pending')
				<td>{{ $status[$record->reference_number]->name }} | <a href="/gateready/record/{{ Auth::user()->id }}/invoice/{{$record->reference_number}}" title="Print Delivery Invoice">Print Invoice</a></td>
				<!-- "verefied status" -->
				@elseif($status[$record->reference_number]->name == 'verified')
				<td>{{ $status[$record->reference_number]->name }} | <a href="/gateready/record/{{ Auth::user()->id }}/invoice/{{$record->reference_number}}" title="Print Delivery Invoice">Print Invoice</a></td>
				<!-- give feedback link -->
				@elseif($status[$record->reference_number]->name == 'sent')
				<td>
					<select name="forma" onchange="location = this.value;">
						<option selected>{{ $status[$record->reference_number]->name }}</option>
						<option value="/gateready/record/{{ Auth::user()->id }}/feedback/{{$record->reference_number}}">Rate Our Service</option>
						<option value="/gateready/record/{{ Auth::user()->id }}/receipt/{{$record->reference_number}}">Print Your Receipt</option>
					</select>
				</td>
				@endif
			</tr>
			
			@endforeach
			@endif
		</tbody>
	</table>
</div>

@endsection