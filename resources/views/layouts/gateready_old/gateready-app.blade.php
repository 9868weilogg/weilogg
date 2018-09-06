<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <link rel="shortcut icon" href="{{ asset('images/logo/gatereadyfavicon.ico') }}" />
        <title>@yield('title') | GateReady.com - Schedule Package Delivery Service in Universiti Putra Malaysia (UPM)</title>
        <!-- CSS And JavaScript -->
        <!-- bootstrap 4 -->
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


        @yield('head')
        <style>
            body{
                background-color: #ececed;
                letter-spacing: 0.07em;
                font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
            }


            nav{
                background-color: #272727;
            }

            nav div.navbar-header{
                height:60px;
                
            }

            #conversion_btn{
                border:1px solid #cda9ff;
                padding:0;
                margin:5px;
            }

            #conversion_btn :hover, ul.navbar-right li.nav_btn :hover{
                background-color: #3d3d3d;
            }

            ul.navbar-right li.nav_btn{
                border:1px solid #272727;
                padding:0;
                margin:5px;
            }

            #bs-example-navbar-collapse-1 ul.navbar-right li a{
                color:#cda9ff;
            }

            img#logo{
                height:50px;
                margin:0 5px 0 0;
                padding: 0;
                display:inline;
            }

            a.navbar-brand{
                padding:5px 10px ;
                
            }

            @font-face{
                font-family: 'LithosPro-Regular';
                src: url('{{asset('lib/LithosPro-Regular.otf')}}');
            }
            span.brand_name {
                color:#cda9ff;
                font-family:'LithosPro-Regular', georgia, serif;
            }

            li#login_pill, li#register_pill{
                width:35%;

            }

            li#login_pill a,li#register_pill a{
                text-align: center;
                background: transparent;
                border:1px solid #776395;
                color: #776395;
            }

            li#login_pill a:focus,li#register_pill a:focus{
                color: #fff;
                background: #776395;
            }

            button.facebook_share{
                background-color: #3b5998;
                color:#fff;
                border:none;
                font-size: 12px;
                padding-top:3%;
                padding-bottom:3%; 
                min-width:50%;
                margin:20px auto;
            }

            button.facebook_share i.fa-facebook{
                margin:0;
                padding: 0;
                padding-right:5%;
                color:#fff;
            }

            button.facebook_share:hover{
                background-color: #355088;
                color:#fff;
                border:none;

            }

            div.login_field, div.register_field{
                padding:0 5%;
            }

            div.text, div.text{
                padding:2% 5%;
            }

            input[type=email],input[type=password],input[type=text]{
                border:none;
                border-bottom: 1px solid #000;
                border-radius: 0;
                background: transparent;
                letter-spacing: 0.05em;
                width: 100%;
                margin:10px 0;
                padding:5px;
            }

            input[type=submit]{
                border:1px solid #85654a;
                color:#85654a;
                margin:10px auto 10px auto;
                width: 100%;
                letter-spacing: 0.1em;
                background: transparent;
            }

            button[type=submit]{
                border:1px solid #85654a;
                color:#85654a;
                margin:10px auto 10px auto;
                width: 100%;
                letter-spacing: 0.1em;
                background: transparent;
            }

        </style>
        
    </head>

    <body>
        <div>
            <!-- <nav class="navbar navbar-default"> -->
                <!-- Navbar Contents -->
                @yield('navbar')
        </div>
        <section id="content">
                @yield('content')
        </section>
        
        @include('layouts.gateready.footer')
        
        
        @yield('js')
    </body>
</html>