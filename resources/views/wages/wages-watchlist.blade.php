@extends('layouts.wages.wages-app')

@section('title')
Home
@endsection

@section('css-code')
<style>



div.cover{
    position:relative;
    background-image: url('{{asset('image/weilogg/OBCCB40.jpg')}}');
    background-position:  center;
    background-size: cover;
    background-repeat: no-repeat;
    width:100%;
    height:600px;
    margin:0;
    padding: 0;
    background-color:#ECECEC;
}

h1.jumbo{
    
    position:absolute;
    width: 400px;
    padding: 0;
    text-align: center;
    top:30%;
    left:30%;
}

button.jumbo{
    position:absolute;
    width: 300px;
    text-align: center;
    top:50%;
    left:35%;
    border:2px solid #533F2F;
    color:#533F2F;
    padding: 10px 10px;
    background-color: #CEBFB2;
}

button.jumbo:hover{
    background-color: transparent;
}

div.what-is-gateready, div.how-it-works , div.what-does-gateready-help , div.pricing-and-rewards{
    background-color: #ECECEC;
    padding-bottom: 5%;
}


div.how-it-works h1 , div.what-does-gateready-help h1  , div.pricing-and-rewards h1 ,div.what-is-gateready h1 {
    text-align: center;
    padding:2% 1%;
    font-size: 30px;
}

div.how-it-works h2, div.what-does-gateready-help h2 , div.pricing-and-rewards h2  {
    text-align: center;
    padding:2% 1%;
    font-size: 20px;
    height:15%;
    color:#533F2F;
}

div.how-it-works p, div.what-does-gateready-help p, div.pricing-and-rewards p , div.what-is-gateready p{
    text-align: center;
    padding:2% 1%;
    font-size: 14px;
    margin:30px 30px;
}

div.what-is-gateready a , div.how-it-works a , div.what-does-gateready-help a , a.button-pricing-and-rewards{
    
    width: 300px;
    text-align: center;
    /*margin:20px auto;*/
    border:2px solid #533F2F;
    color:#533F2F;
    padding: 10px 10px;
    background-color: #CEBFB2;
    height:50px;
}

.center-block{
    display:flex;
    justify-content: center;
}


i.fa-shopping-bag,i.fa-smile-o,i.fa-money,i.fa-clock-o,i.fa-edit,i.fa-calendar,i.fa-truck{
    font-size: 80px;
    position: relative;
    margin:0 auto 0 auto;
    color:#533F2F;
    height:100px;
    padding:0 auto;
}

i.fa-gift,i.fa-credit-card{
    font-size: 80px;
    position: relative;
    margin:0 auto 0 auto;
    color:#594B96;
    height:100px;
    padding:0 auto;
}

i.fa-edit,i.fa-calendar,i.fa-truck{
    font-size: 80px;
    position: relative;
    margin:0 auto 0 auto;
    color:#606060;
    height:100px;
    padding:0 auto;
}

.tnc{
    font-size: 10px;
    margin:10px;
    padding:0;
    width: 100%
}

@media screen and (max-width: 600px){
    /*div.cover{
        position:relative;
        background-image: url('{{asset('image/weilogg/OBCCB40.jpg')}}');
        background-position:  center;
        background-size: cover;
        background-repeat: no-repeat;
        width:100%;
        height:600px;
        margin:0;
        padding: 0;
        background-color:#ECECEC;
    }*/

    h1.jumbo{
        font-size: 24px;
        position:absolute;
        width: 200px;
        text-align: center;
        top:30%;
        left:30%;
    }

    button.jumbo{
        position:absolute;
        width: 200px;
        top:40%;
        left:30%;
        font-size: 14px;
    }

    button.jumbo:hover{
        background-color: transparent;
}

</style>
@endsection

@section('js-code')

<meta id="token" name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('content')
<div id="wagesApp">

    <watchlist></watchlist>
    <script src="{{asset('js/wages-app.js')}}"></script>
</div>





@endsection

