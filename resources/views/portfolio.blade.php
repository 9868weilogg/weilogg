@extends('layouts.app')

@section('title')
Portfolio
@endsection

@section('page-css')
<style>
div#app{
    background-image: url('{{asset('image/weilogg/bricks-brickwall-brickwork-1092364.jpg')}}');
    background-attachment: fixed;
    background-size:cover;
    background-position: left bottom;
}
/* page title (portfolio) style */

h1.pageTitle{
    border-bottom: 2px solid #DED5C7;
    position: relative;
    font-size: 80px;
    color:#DED5C7;
    margin-left:50px;
    width:310px;
}

h1.pageTitle span{
    position: absolute;
    font-size: 20px;
    color:#000;
    bottom: 40%;
    left:0;
    text-transform: uppercase;
}

div.card{
    margin:1% 3% 1% 1%;
}

</style>

@section('content')
<div class="row">

<div class="pageTitle col-md-12">
    <h1 class="pageTitle">Portfolio<span>Portfolio</span></h1>

</div>
<div class="card col-md-5">
    <div>dishmotion</div>
    <div><a href="/dishmotion"><img src="img" alt="dishmotion - Home-cooked soup delivery in UPM"></a></div>
</div>
<div class="card col-md-5">
    <div>gateready</div>
    <div><a href="/gateready"><img src="img" alt="gateready - Schedule Delivery in UPM"></a></div>
    
</div>

@endsection