@extends('layouts.app')

@section('title')
Home
@endsection

@section('page-css')
<style>
div#app{
        background-image:url('{{asset('image/weilogg/clouds-dusk-evening-912617.jpg')}}'); 
        background-size:cover;
        background-position:center;
        background-repeat: no-repeat;
        height:100%;
        width:100%;
}



div img{
    height:150px;
    width:150px;
    border-radius: 50%;
    border:1px solid #937543;
    position:absolute;
    top:300px;
    left:0;
    right:0;
    bottom:0;
    margin:auto;
}

div.about{
    position:absolute;
    top:250px;
    left:0;
    right:0;
    bottom:0;
    margin:auto;
    width:200px;
}

div.about > p{
    color:#c8c8c8;
}
span.myName{
    font-family: 'Poiret One', cursive;
    font-size:20px;
}

span.myDescription{
    font-size:14px;
}

a.myStoryLink , a.resumeLink{
    border:1px solid #937543;
    width:150px;
    padding:2% 2.5%;
    font-size: 15px;
    margin-left:3%;
    text-transform: uppercase;
    color:white;
}

@media screen and (max-width: 600px){
    div img{
        height:100px;
        width:100px;
        
        position:absolute;
        top:400px;
        left:0;
        right:0;
        bottom:0;
        margin:auto;
    }

    div.about{
        
        top:300px;
        
    }

    a.myStoryLink , a.resumeLink{
        
        width:150px;
        padding:1.5% 2%;
        font-size: 15px;
        margin-left:5%;

    }


    
}
</style>

@section('content')

<div class="container">
    <div class="row">
        <div class="photo">
            <img src="{{asset('image/weilogg/me.jpg')}}" alt="weilogg's photo">  

        </div>
        <div class="about align-content-center">
            <p><span class="myName">WEILOGG</span> <span>aka William.</span><br>
                <span class="myDescription">I'm web developer & engineer.</span></p>
            
            <a href="/about" class="myStoryLink">My Story</a>
            <a href="/resume" class="resumeLink">Resume</a>
        </div>
    </div>
</div>

@endsection
