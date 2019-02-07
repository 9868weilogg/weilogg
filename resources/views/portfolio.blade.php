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
    font-size: 60px;
    color:#DED5C7;
    margin-left:50px;
    width:220px;
}

h1.pageTitle span{
    position: absolute;
    font-size: 20px;
    color:#000;
    bottom: 30%;
    left:0;
    text-transform: uppercase;
}

.center-block{
  display: flex;
  justify-content: center;
}



h3.h3{
  text-align: center;
  display: block;
  width:100%;
  font-size: 20px;
  padding-bottom: 30px;
}

#dishmotionHomepage, #gatereadyHomepage{
  width:700;
  height:450;
}

#gatereadyHomepageImg, #dishmotionHomepageImg{
    display:none;
}


@media screen and (max-width: 700px){
  div#app{
    background-color:#ECEFF1;
    background-image:none;
  }
  
  #gatereadyHomepage,#dishmotionHomepage{
    display: none;
  }

  #gatereadyHomepageImg, #dishmotionHomepageImg{
    display:block;
    width:350;
    height:200;
  }

  h3.h3{
    
    font-size: 14px;
  }
}

</style>


@section('content')
<div class="container-fluid">
<div class="row">

<div class="pageTitle col-md-12">
    <h1 class="pageTitle">Portfolio<span>Portfolio</span></h1>

</div>


<div class="center-block col-md-12" >
    <a href="http://dishmotion.weilogg.com">
    <video preload="auto" autoplay="autoplay" loop  id="dishmotionHomepage">
     <source src="{{asset('film/dishmotion-homepage.mov')}}" type="video/mov"/>
     <source src="{{asset('film/dishmotion-homepage.mp4')}}" type="video/mp4" />
     <source src="{{asset('film/dishmotion-homepage.ogg')}}" type="video/ogg" />
     Your browser does not support the video tag.
   </video>
   <img id="dishmotionHomepageImg" src="{{asset('image/weilogg/dishmotion-poster.jpg')}}" alt="dishmotion poster">
  </a>
</div>
<div class="center-block col-md-12">
  <h3 class="h3">dishmotion</h3>
</div>
<div  class="center-block col-md-12" >
    <a href="http://gateready.weilogg.com">
    <video preload="auto" autoplay="autoplay" loop id="gatereadyHomepage" >
     <source src="{{asset('film/gateready-homepage.mov')}}" type="video/mov"/>
     <source src="{{asset('film/gateready-homepage.mp4')}}" type="video/mp4" />
     <source src="{{asset('film/gateready-homepage.ogg')}}" type="video/ogg" />
     Your browser does not support the video tag.
   </video>
   <img id="gatereadyHomepageImg" src="{{asset('image/weilogg/gateready-poster.jpg')}}" alt="gateready poster">
 </a>
</div>
<div class="center-block col-md-12">
  <h3 class="h3">gateready</h3>
</div>
</div>
@endsection