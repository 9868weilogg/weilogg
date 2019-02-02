@extends('layouts.app')

@section('title')
Blog
@endsection

@section('page-css')
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
{{-- <link rel="stylesheet" href="{{ asset('asset/lucid-hr-and-pm/html/assets/vendor/bootstrap/css/bootstrap.min.css') }}"> --}}
{{-- <link rel="stylesheet" href="{{ asset('asset/lucid-hr-and-pm/html/assets/vendor/font-awesome/css/font-awesome.min.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('asset/lucid-hr-and-pm/html/assets/vendor/summernote/dist/summernote.css') }}"/>

<!-- MAIN CSS -->
{{-- <link rel="stylesheet" href="{{ asset('asset/lucid-hr-and-pm/html/assets/css/main.css') }}"> --}}
{{-- <link rel="stylesheet" href="{{ asset('asset/lucid-hr-and-pm/html/assets/css/color_skins.css') }}"> --}}

<style>
div#app{
  {{-- background-image:url('{{asset('image/weilogg/abstract-art-decoration-1029624.jpg')}}'); --}}
  background-size:cover;
  background-position:center;
  background-repeat: no-repeat;
  background-attachment: fixed;
}

/* page title (resume) style */

h1.pageTitle{
    border-bottom: 2px solid #DED5C7;
    position: relative;
    font-size: 80px;
    color:#DED5C7;
    margin-left:50px;
    width:290px;
}

h1.pageTitle span{
    position: absolute;
    font-size: 20px;
    color:#000;
    bottom: 40%;
    left:0;
}

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

h1.date{
  border:1px solid #937543;
  padding: 1%;
  width:100px;
  border-radius: 100px;
  text-align: center;
  font-size: 14px;
  color:#c8c8c8;
  background-color: #937543;
}

div.content h2{
  font-size: 20px;
  font-weight: 400;
}

p.content {
  font-size: 14px;
  color:#6a6a6a;
  text-decoration: underline;
  font-weight: 300;
}

/* The actual content */
div.content {
    padding: 20px 30px;
    background-color: #DED5C7;
    position: relative;
    border-radius: 6px;
}





/* The actual timeline (the vertical ruler) */
.timeline {
    position: relative;
    max-width: 1200px;
    margin: 0 auto;
}

/* The actual timeline (the vertical ruler) */
.timeline::after {
    content: '';
    position: absolute;
    width: 6px;
    background-color: #6A6A6A;
    top: 0;
    bottom: 0;
    left: 50%;
    margin-left: -3px;
}
/* Container around content */
div.box{
  
  padding: 20px 20px;
    position: relative;
    width: 50%;
}

/* The circles on the timeline */
.box::after {
    content: '';
    position: absolute;
    width: 20px;
    height: 20px;
    right: -10px;
    background-color: #6A6A6A;
    border: 4px solid #EBEBF9;
    top: 30px;
    border-radius: 50%;
    z-index: 1;
}
/* Place the container to the left */
.left {
    left: 0;
}

/* Place the container to the right */
.right {
    left: 50%;
}



/* Fix the circle for containers on the right side */
.right::after {
    left: -10px;
}



/* mobile version */
@media screen and (max-width:600px){
  div#app{
      background-color:#ECEFF1;
      background-image:none;
    }
    
  .timeline{
    margin-left:10px;
  }

  .right{
    left:0;
  }

  /* The actual timeline (the vertical ruler) */
  .timeline::after {
      content: '';
      position: absolute;
      
      top: 0;
      bottom: 0;
      left: 0;
  }

  /* Container around content */
  div.box{
    
      width: 100%;
  }

  /* The circles on the timeline */
  .box::after {
      content: '';
      position: absolute;
      
      left: -10px;
      
      border-radius: 50%;
      z-index: 1;
  }
}

</style>

@section('content')

<div class="row justify-content-center body">
  
  <div class="col-md-12">
    <div class="pageTitle">
      <h1 class="pageTitle">Blog<span>BLOG</span></h1>

    </div>

        
  </div>
  <div class="col-12">
    @foreach($blogPosts as $post)
      {!! $post->blog_title !!}<br/>
      {!! $post->blog_post !!}
      <hr/>
    @endforeach
  </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('asset/lucid-hr-and-pm/html/assets/bundles/libscripts.bundle.js') }}"></script>    
<script src="{{ asset('asset/lucid-hr-and-pm/html/assets/bundles/vendorscripts.bundle.js') }}"></script>

<script src="{{ asset('asset/lucid-hr-and-pm/html/assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('asset/lucid-hr-and-pm/html/assets/vendor/summernote/dist/summernote.js') }}"></script>
@endpush
