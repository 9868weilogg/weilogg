@extends('layouts.app')

@section('title')
Blog
@endsection

@section('page-js')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<!-- Add this to <head> bootstrap-vue -->
<link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap/dist/css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.css"/>


@endsection

@section('page-css')

<style>
body{
    font-weight: 100;
}

div#app{
    background-color:#e8e8e8;
}


div.body{
    width:100%;
}

/* page title (about) style */

h1.pageTitle{
    border-bottom: 2px solid #DED5C7;
    position: relative;
    font-size: 80px;
    color:#DED5C7;
    margin-left:50px;
    width:210px;
}

h1.pageTitle span{
    position: absolute;
    font-size: 20px;
    color:#000;
    bottom: 40%;
    left:0;
}

/* page title (about) style */

/* topic heading style */

div.topic{
    padding: 0% 10%
}

h1.topic{
    border:1px solid #937543;
    padding: 1%;
    width:200px;
    border-radius: 100px;
    text-align: center;
    font-size:20px;
    background-color:#937543;
    text-transform: uppercase;
    font-weight: 400;
    margin:5% 0% 2% 10%;
    color:#E7EAED;
}

p.topic{
    text-transform: uppercase;
    font-weight: bold;
}

p.topic span{
    text-transform: none;
    font-weight:normal;
}

/* topic heading style */

/* skill level bar style */

div h4{
    font-weight: bold;
    font-size: 15px;
    margin-top:3%;
}

div#phpLaravel{
    width:100%;
    background-color: #c8c8c8;
}

div#phpLaravelLevel{
    width:75%;
    background-color: #937543;
    height:10px;
}

div#mysql{
    width:100%;
    background-color: #c8c8c8;
}

div#mysqlLevel{
    width:75%;
    background-color: #937543;
    height:10px;
}

div#htmlCss{
    width:100%;
    background-color: #c8c8c8;
}

div#htmlCssLevel{
    width:75%;
    background-color: #937543;
    height:10px;
}

div#git{
    width:100%;
    background-color: #c8c8c8;
}

div#gitLevel{
    width:50%;
    background-color: #937543;
    height:10px;
}

div#javascript{
    width:100%;
    background-color: #c8c8c8;
}

div#javascriptLevel{
    width:40%;
    background-color: #937543;
    height:10px;
}

div#cnc{
    width:100%;
    background-color: #c8c8c8;
}

div#cncLevel{
    width:40%;
    background-color: #937543;
    height:10px;
}

div#plc{
    width:100%;
    background-color: #c8c8c8;
}

div#plcLevel{
    width:40%;
    background-color: #937543;
    height:10px;
}

div#cad{
    width:100%;
    background-color: #c8c8c8;
}

div#cadLevel{
    width:80%;
    background-color: #937543;
    height:10px;
}

div#solidworks{
    width:100%;
    background-color: #c8c8c8;
}

div#solidworksLevel{
    width:60%;
    background-color: #937543;
    height:10px;
}

div#ajax{
    width:100%;
    background-color: #c8c8c8;
}

div#ajaxLevel{
    width:50%;
    background-color: #937543;
    height:10px;
}

/* skill level bar style */



/* The icon style */
i.fa-object-group, i.fa-globe{
  font-size: 100px;
  color:#937543;
}

h5.serviceGroup{
    font-weight: bold;
}   
/* The icon style */

p.story{
    letter-spacing: 0.05em;
    text-align: justify;
    width:90%;
    font-weight: normal;
}

span.bold{
    font-weight: 600;
}

span.italic{
    font-style:italic;
}

@media screen and (max-width: 600px){
    div#app{
        
        background-position: left top;
    }

    p.story{
        width:100%;
    }
}
</style>

@section('content')
<div id="blogIndex">
    @guest
    <blog-index></blog-index>
    @else
    <blog-admin></blog-admin>
    @endguest
</div>


<script src="{{asset('js/weilogg-app.js')}}"></script>
<!-- Add this after vue.js bootstrap-vue -->
<script src="//unpkg.com/babel-polyfill@latest/dist/polyfill.min.js"></script>
<script src="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.js"></script>
@endsection
