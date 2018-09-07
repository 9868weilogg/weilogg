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
				<th>Order Date</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1234</td>
				<td>2018-09-09</td>
				<td>Null</td>
			</tr>
		</tbody>
	</table>

@endsection