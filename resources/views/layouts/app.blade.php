<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'weilogg.com') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- bootstrap 4 -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Optional JavaScript -->
    <!-- jQuery first (for AJAX), then Bootstrap JS (for modal,dropdown)-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Vue.js cdn -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script> -->

    <!-- Font Awesome 4.7-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/css/mdb.min.css" rel="stylesheet">

    <!-- logo font grabbed from Google font -->
    <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">

    <!-- respective page 's CSS -->
    @yield('page-css')

    <!-- responsive sidebar CSS-->
    <style>
    /* The sidepanel menu */
    i.fa-bars{
      font-size: 25px;
      color:#937543;
    }

    .side-panel {
        height: 100%; /* Specify a height */
        width: 0; /* 0 width - change this with JavaScript */
        position: fixed; /* Stay in place */
        z-index: 1; /* Stay on top */
        top: 0;
        left: 0;
        background-color: #A3A9B2; /* gray */
        overflow-x: hidden; /* Disable horizontal scroll */
        padding-top: 60px; /* Place content 60px from the top */
        transition: 0.5s; /* 0.5 second transition effect to slide in the sidepanel */
    }

    /* Position and style the close button (top right corner) */
    .side-panel .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 40px;
        margin-left: 50px;
        color:#937543;
    }

    /* Logo DIV and logo style */

    div#logoMenu{
      font-family: 'Poiret One', cursive;
      
      
      margin:1.5% 0.5%;
    }  

    a.logo{
      font-size: 40px;
      border:1px double #C8C8C8 ;
      border-width: 3px;
      padding:0.5%;
      font-weight: normal;
      color:#937543;
    }    

    /*  nav link stye */
    nav{
      padding-top: 40%;
    }


    button.nav-link{
      border:1px solid #937543;
      border-radius: 100px;
      width:100px;
      background-color:#937543;
      color:white;
      margin-left:80px;
      margin-top:20px;
    } 

    body{
      font-family: 'helvetica',sans-serif;
    }
    
    label{
        text-transform: uppercase;
        color:#000;
        width:100%;
    }

    input.form-control{
      border:0px hidden transparent;
      border-bottom: 1px solid #000;
    }

    div.form-group{
      padding-bottom:20px; 
    }

    p#phoneNumber{
      color:rgb(79,79,79);
    }
    </style>

    <!-- respective page 's JS -->
    @yield('page-js')

    <!-- responsive sidebar JS -->
    <script>
    function showSideBar()
    {
      document.getElementById('sideBarDiv').style.width = '250px';
    }
    function hideSideBar()
    {
      document.getElementById('sideBarDiv').style.width = '0px';
    }
    window.onload = function(){
      // console.log('run');
      var x = new Date();
      var currentYear = x.getFullYear();
      document.getElementById('footerYear').innerHTML = currentYear;
      var age = currentYear - 1992;
      document.getElementById('myAge').innerHTML = age;
      // console.log(currentYear);

      $(document).ready(function(){
        if(window.location.hash === 'loginReg')
        {
          scrollToBottom();
        }
      });
      
        
    }

    function scrollToBottom(){
      $('html, body').animate({scrollTop:$(document).height()}, 'slow');
      hideSideBar();
    }
    </script>
</head>
<body>
    <div id="app">
      <div class="container">
        <div class="row">
          <!-- logo with menu button during xs mode -->
          
          <div id="logoMenu" class="col-sm-12">
            <a class="logo" href="{{ url('/') }}">
              WEILOGG
            </a>
          </div>
          <div id="menuIcon" class="col-sm-12">
            <a href="javascript:void(0);" class="icon" onclick="showSideBar()"><i class="fa fa-bars" aria-hidden="true"></i></a>
          </div>
          <!-- logo with menu button during xs mode (end)-->
          
          <!-- side bar show during xs mode -->
          <div id="sideBarDiv" class="side-panel">
            <nav class="nav flex-column">
              <a href="javascript:void(0)" onclick="hideSideBar()" class="closebtn" >&times</a>
              
              
              <button class="nav-link" onclick="window.location.href='/about'">About</button>
              <button class="nav-link" onclick="window.location.href='/portfolio'">Portfolio</button>
              <button class="nav-link" onclick="window.location.href='/resume'">Resume</button>
              <button class="nav-link" onclick="scrollToBottom()">Contact</button>
              
            </nav>
          </div>
        </div>
      </div>
          <!-- side bar show during xs mode (end)--> 
    
          
          <!-- content with grid col-12 during xs mode -->
          <div class="col-12" id="xsMode">
            <main class="py-4">
              @yield('content')
            </main>
          </div>
          <!-- content with grid col-12 during xs mode (end)-->
    </div>    
      
    <!-- Footer -->
    <footer class="page-footer font-small blue-grey lighten-5">

        <div style="background-color: #937543;">
          <div class="container">

            <!-- Grid row-->
            <div class="row py-4 d-flex align-items-center">

              <!-- Grid column -->
              <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                <h6 class="mb-0">Get connected with me on social networks!</h6>
              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-md-6 col-lg-7 text-center text-md-right">

                <!-- Facebook -->
                <a class="fb-ic" href="https://www.facebook.com/wei.logg.william">
                  
                  <i class="fa fa-facebook white-text mr-4"> </i>
                </a>
                
                <!--Linkedin -->
                <a class="li-ic" href="https://www.linkedin.com/in/cheahweilogg/">
                  <i class="fa fa-linkedin white-text mr-4"> </i>
                </a>
                <!--Instagram-->
                <a class="ins-ic" href="https://www.instagram.com/the_logggggg/?hl=en">
                  <i class="fa fa-instagram white-text"> </i>
                </a>

              </div>
              <!-- Grid column -->

            </div>
            <!-- Grid row-->

          </div>
        </div>

        <!-- Footer Links -->
        <div class="container text-center text-md-left mt-5">

          <!-- Grid row -->
          <div class="row mt-4 dark-grey-text">

            <!-- Grid column -->
            <div class="col-md-4 col-lg-4 col-xl-3 mb-4">

              <!-- Content -->
              <h6 class="text-uppercase font-weight-bold">weilogg.com</h6>
              <hr class="accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; border-color:#937543;">
              <p>Self-learned web programmer, tried mechanical engineering in construction industry and indsutrial engineering in manufacturing industry, however, decided to go into software industry. I believe that programming skill is an essential in future.</p>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4" id="loginReg">

              <!-- Links -->
              <h6 class="text-uppercase font-weight-bold">Useful Link</h6>
              <hr class=" accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; border-color:#937543;">
              <p>
                <a class="dark-grey-text" href="/portfolio">Portfolio</a>
              </p>
              <p>
                <a class="dark-grey-text" href="/resume">Resume</a>
              </p>
              <p>
                <a class="dark-grey-text" href="/about">About</a>
              </p>
              <p>
                @guest
                <a class="dark-grey-text" data-toggle="modal" data-target="#loginModal">Login</a><span> | </span>
                <a class="dark-grey-text" data-toggle="modal" data-target="#regModal">Register</a>
                @else
                <a class="dark-grey-text" href='/logout'>Logout</a>
                @endguest
              </p>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-6 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

              <!-- Links -->
              <h6 class="text-uppercase font-weight-bold">Contact</h6>
              <hr class="accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; border-color:#937543;">
              <p>
                <i class="fa fa-home mr-3"></i> Taman Bukit Belimbing, Seri Kembangan 43300, Selangor.</p>
              <p>
                <i class="fa fa-envelope mr-3"></i> william.wlcheah@gmail.com</p>
              <p id="phoneNumber">
                <i class="fa fa-phone mr-3"></i> + 017 871 3513</p>

            </div>
            <!-- Grid column -->

          </div>
          <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center text-black-50 py-3">© <span id="footerYear"></span> Copyright:
          <a class="dark-grey-text" href="http://weilogg.com"> weilogg.com</a>
        </div>
        <!-- Copyright -->

      </footer>
      <!-- Footer -->



<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">LOG IN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-12">
                  
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="email" class="col-md-12 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-12 col-form-label text-md-left">{{ __('Password') }}</label>

                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                    </div>
                </form>
                      
              </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>
<!-- end Login Modal -->

  <!-- Register Modal -->
  <div class="modal fade" id="regModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">REGISTER</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    
                  <form method="POST" action="{{ route('register') }}">
                      @csrf

                      <div class="form-group row">
                          <label for="name" class="col-md-12 col-form-label text-md-left">{{ __('Name') }}</label>

                          <div class="col-md-12">
                              <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="" required autofocus>

                              @if ($errors->has('name'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="email" class="col-md-12 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                          <div class="col-md-12">
                              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="" required>

                              @if ($errors->has('email'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="password" class="col-md-12 col-form-label text-md-left">{{ __('Password') }}</label>

                          <div class="col-md-12">
                              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="" required>

                              @if ($errors->has('password'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="password-confirm" class="col-md-12 col-form-label text-md-left">{{ __('Confirm Password') }}</label>

                          <div class="col-md-12">
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="" required>
                          </div>
                      </div>

                      <div class="form-group row">
                          <div class="col-md-12">
                              <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" value="yes" name="agree" required> I have read and accepted Terms and Condition and Privacy Policy

                                  @if ($errors->has('agree'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('agree') }}</strong>
                                      </span>
                                  @endif
                              </label>
                          </div>
                          
                      </div>

                      <div class="form-group row mb-0">
                          <div class="col-md-12">
                              <button type="submit" class="btn btn-primary">
                                  Register
                              </button>
                          </div>
                      </div>
                  </form>
                        
                </div>
            </div>
        </div>

        </div>
      
    </div>
  </div>
</div>
<!-- end of Register modal -->
</body>

</html>
