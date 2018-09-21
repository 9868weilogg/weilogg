<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | GateReady.com - Schedule Package Delivery Service in Universiti Putra Malaysia (UPM)</title>

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

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/css/mdb.min.css" rel="stylesheet">

    <!-- Vue.js cdn -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script> -->

    <!-- insert vue code here -->
    <!-- @yield('vue-code') -->

    <!-- insert javascript here -->
    @yield('js-code')

    <!-- insert CSS here -->
    @yield('css-code')

<style>
body{
  font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
}

@font-face{
  font-family: 'LithosPro-Regular';
  src: url('{{asset('lib/LithosPro-Regular.otf')}}');
}
a.nav-link{
  color:#CCA8F9;
}

footer{
  background-color: black;
}

h3.links, h3.social_media,h3.links a{
  color:#E4A490;
  font-weight: normal;
  padding:20px 30px;
}

.links ul li{
  list-style-type:none

}

li a{
  color:rgb(193,193,193);
  font-size:16px;
  padding: :10px 10px;
}

i.fa-facebook-official,i.fa-whatsapp,i.fa-envelope-o,i.fa-phone-square{
  font-size: 40px;
  margin:20px 20px;
  color:rgb(193,193,193);
}

p#copyright_year, p#copyright_year a{
  text-align: center;
  color:rgb(193,193,193);
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

</style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-laravel">
            <div class="container">
                
                <a class="navbar-brand" href="{{ url('/gateready') }}" style="font-family:'LithosPro-Regular'; "><img src="{{ asset('image/gateready/gateready_logo.jpg') }}" alt="gateready-logo" style="width:50px; height:30px; padding:0px; margin:0px;">GATEREADY
                </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <!-- link to go to login page -->
                                <!-- <a class="nav-link" href="/login">Login</a> -->
                                <!-- link trigger login modal -->
                                <a class="nav-link" data-toggle="modal" data-target="#loginModal">Login</a>
                            </li>
                            <li class="nav-item">
                              <!-- link to go to register page -->
                              <!-- <a class="nav-link" href="/register">Register</a> -->
                              <!-- link trigger register modal -->
                              <a class="nav-link" data-toggle="modal" data-target="#regModal">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/gateready/faq">FAQ</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="/gateready/record/{{ Auth::user()->id }}/schedule-delivery">Experience It</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/gateready/record/{{ Auth::user()->id }}">Record</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">Log Out</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        
            @yield('content')
      </div>
    


<footer class="container-fluid" id="footer">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row" >
    <div class="col-lg-5 col-lg-offset-2 col-md-6 col-md-offset-2 col-sm-6 col-sm-offset-1 col-xs-7 links" >
        
        @guest
        <h3 class=" links" style="font-family:'LithosPro-Regular'; ">GATEREADY</h3>
        @else
        <h3 class="links" ><a href="/gateready/admin" style="font-family:'LithosPro-Regular'; ">GATEREADY</a></h3>
        @endguest
        <ul>
            <li><a href="/gateready/about"  class="links" >About</a></li>
            <li><a href="/gateready/about#howItWorks" class="links" >How It Works?</a></li>
            <li><a href="/gateready/pricing"  class="links" >Pricing and Reward</a></li>
            <li><a href="/gateready/faq"  class="links" >FAQ</a></li>
            <li><a href="#"  class="links" >Help</a></li>
            <li><a href="#"  class="links" >Term</a></li>
            <li><a href="#"  class="links" >Privacy</a></li>
        </ul>
        
        
    </div>
    <div class="col-lg-5 col-md-6 col-sm-5 col-xs-5 social_media" >
        <h3 class="social_media">Social</h3>
        <div class="row">
            <div class="col-md-6 col-xs-6 social_media_i"><a href="https://www.facebook.com/GateReady-512343692305450/" target="_blank"><i class="fa fa-facebook-official"></i></a></div>
            <div class="col-md-6 col-xs-6 social_media_i"><a href="#" data-toggle="modal" data-target="#whatsappModal"><i class="fa fa-whatsapp"></i></a></div>
            <div class="col-md-6 col-xs-6 social_media_i"><a href="http://weilogg.com/help" ><i class="fa fa-envelope-o"></i></a></div>
            <div class="col-md-6 col-xs-6 social_media_i"><a href="#" data-toggle="modal" data-target="#callModal"><i class="fa fa-phone-square"></i></a></div>
        </div>
    </div>
    
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row" align="center">

    <p><a class="freepik" href="http://www.freepik.com/free-photo/man-smiling-with-a-lot-of-boxes_915972.htm">Designed by Freepik</a></p>
    <p id="copyright_year" align="center">© 2018 Design By:
          <a class="dark-grey-text" href="http://weilogg.com"> weilogg.com</a>
    </p>
</div>
</footer>







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
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="weilogg@gmail.com" required autofocus>

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
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="Logg5843" required>

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
                              <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="weilogg" required autofocus>

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
                              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="weilogg@gmail.com" required>

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
                              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="Logg5843" required>

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
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="Logg5843" required>
                          </div>
                      </div>

                      <div class="form-group row">
                          <div class="col-md-12">
                              <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" value="yes" name="agree" required> I have read and accepted <a href="gateready/term">Terms and Condition</a> and <a href="gateready/privacy-policy">Privacy Policy</a>

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
                              <button type="submit" class="btn btn-primary">
                                  Continue with Facebook
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

<!-- whatsappModal -->

<div id="whatsappModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title">Whatsapp GateReady</h4>
                <button type="button" class="close" data-dismiss="modal" style="float:right;">&times;</button>
            </div>
            <div class="modal-body" align="center">
                <h4 id="whatsapp_number">Whatsapp GateReady at <br>+60178713513<br> for more information or help.</h4>
            </div>
        </div>
    </div>
</div>
<!-- whatsappModal (end)-->

<!-- callModal -->

<div id="callModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Call GateReady</h4>
              <button type="button" class="close" data-dismiss="modal" style="float:right;">&times;</button>
                
            </div>
            <div class="modal-body" align="center">
                <h4 id="call_number">Call GateReady at <br>+60178713513<br> for more information or help.</h4>
            </div>
        </div>
    </div>
</div>
<!-- callModal (end)-->
</body>
</html>
