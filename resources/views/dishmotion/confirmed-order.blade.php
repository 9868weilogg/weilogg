@extends('layouts.dishmotion-app')

@section('title')
Confirmed Order
@endsection

@section('content')
	
	<div>
		<h1>
			- THANK YOU, {{ $orders->name }} -
		</h1>
		<h2>
			Your order list:
		</h2>
		<ul>
			<li>Item: {{ $orders->quantity }} set of {{ $orders->menu }}</li>
			<li>Location: {{ $orders->kolej }}</li>
		</ul>
		<a href="/dishmotion">Back to home</a>
	</div>
@endsection

