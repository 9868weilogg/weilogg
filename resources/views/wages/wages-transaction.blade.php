@extends('layouts.wages.wages-app')

@section('title')
Transaction
@endsection

@section('css-code')
<style>
/* page title (about) style */

h1.pageTitle{
    border-bottom: 2px solid #DED5C7;
    position: relative;
    font-size: 80px;
    color:#DED5C7;
    margin-left:50px;
    width:210px;
    font-weight:normal;
}

h1.pageTitle span{
    position: absolute;
    font-size: 20px;
    color:#000;
    bottom: 40%;
    left:0;
}

</style>
@endsection

@section('js-code')

<meta id="token" name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

<div id="transaction"></div>




@endsection

