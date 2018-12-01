@extends('layouts.wages.wages-app')

@section('title')
Home
@endsection

@section('css-code')
<style>


</style>
@endsection

@section('js-code')
<!-- Add this to <head> -->
<link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap/dist/css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.css"/>
<meta id="token" name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('content')
<div id="wagesApp">

    <watchlist></watchlist>

</div>

<script src="{{asset('js/wages-app.js')}}"></script>
<!-- Add this after vue.js -->
<script src="//unpkg.com/babel-polyfill@latest/dist/polyfill.min.js"></script>
<script src="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.js"></script>



@endsection

