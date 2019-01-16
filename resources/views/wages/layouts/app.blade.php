<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wages - @stack('title')</title>
    <meta name="description" content="Free Bootstrap Theme by uicookies.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    
    {{-- sublime theme css --}}
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet"> 
    <link rel="stylesheet" href="{{ asset('asset/sublime/css/styles-merged.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/sublime/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/sublime/css/custom.css') }}">

    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
    @stack('css')
  </head>
  <body>
    

  @include('wages.layouts.nav')
  
  @yield('content')
  
  @include('wages.layouts.footer')


  @stack('scripts')
  
  </body>
</html>