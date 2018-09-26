@extends('layouts.dishmotion-app')

@section('title')
Home
@endsection

@section('content')

<div id="dishmotionApp">
	<app></app>
</div>
<script src="{{asset('js/dishmotion-app.js')}}"></script>
    
	


@endsection