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
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                
                <a class="navbar-brand" href="{{ url('/gateready') }}"><img src="{{ asset('image/gateready/gateready_logo.jpg') }}" alt="gateready-logo" style="width:50px; height:30px; padding:0px; margin:0px;">
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">Log Out</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- Footer -->
    <footer class="page-footer font-small blue-grey lighten-5">

        <div style="background-color: #21d192;">
          <div class="container">

            <!-- Grid row-->
            <div class="row py-4 d-flex align-items-center">

              <!-- Grid column -->
              <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                <h6 class="mb-0">Get connected with us on social networks!</h6>
              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-md-6 col-lg-7 text-center text-md-right">

                <!-- Facebook -->
                <a class="fb-ic">
                  <i class="fa fa-facebook white-text mr-4"> </i>
                </a>
                <!-- Twitter -->
                <a class="tw-ic">
                  <i class="fa fa-twitter white-text mr-4"> </i>
                </a>
                <!-- Google +-->
                <a class="gplus-ic">
                  <i class="fa fa-google-plus white-text mr-4"> </i>
                </a>
                <!--Linkedin -->
                <a class="li-ic">
                  <i class="fa fa-linkedin white-text mr-4"> </i>
                </a>
                <!--Instagram-->
                <a class="ins-ic">
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
          <div class="row mt-3 dark-grey-text">

            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mb-4">

              <!-- Content -->
              @guest
              <h6 class="text-uppercase font-weight-bold" >gateready.com</h6>
              @else
              <h6 class="text-uppercase font-weight-bold" ><a href="/gateready/admin" style="color:rgb(78,78,78)">gateready.com</a></h6>
              @endguest
              <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
              <p>GateReady will help you to receive and keep your online purchases delivery safely from courier. Then, GateReady will deliver to you after you have scheduled a date and time of you convenient.</p>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

              <!-- Links -->
              <h6 class="text-uppercase font-weight-bold">About Us</h6>
              <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
              <p>
                <a class="dark-grey-text" href="/gateready/about">Services</a>
              </p>
              <p>
                <a class="dark-grey-text" href="/gateready/about">How It Works?</a>
              </p>
              <p>
                <a class="dark-grey-text" href="/gateready/sitemap">Site Map</a>
              </p>
              <p>
                <a class="dark-grey-text" href="/gateready/faq">FAQ</a>
              </p>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

              <!-- Links -->
              <h6 class="text-uppercase font-weight-bold">Useful links</h6>
              <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
              <p>
                <a class="dark-grey-text" href="#!">Your Account</a>
              </p>
              <p>
                <a class="dark-grey-text" href="/gateready/pricing">Pricing</a>
              </p>
              <p>
                <a class="dark-grey-text" href="/gateready/help">Help</a>
              </p>
              <p>
                <a class="dark-grey-text" href="#!">Term</a>
              </p>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

              <!-- Links -->
              <h6 class="text-uppercase font-weight-bold">Contact</h6>
              <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
              <p>
                <i class="fa fa-home mr-3"></i> Seri Kembangan 43300, Selangor.</p>
              <p>
                <i class="fa fa-envelope mr-3"></i> info@gateready.com</p>
              <p>
                <i class="fa fa-phone mr-3"></i> + 01 234 567 88</p>
              <p>
                <i class="fa fa-print mr-3"></i> + 01 234 567 89</p>

            </div>
            <!-- Grid column -->

          </div>
          <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center text-black-50 py-3">© 2018 Design By:
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
                              <label for="email" class="col-md-4 col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                              <div class="col-md-8">
                                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="weilogg@gmail.com" required autofocus>

                                  @if ($errors->has('email'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                              <div class="col-md-8">
                                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="Logg5843" required>

                                  @if ($errors->has('password'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <div class="col-md-8 offset-md-4">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                      <label class="form-check-label" for="remember">
                                          {{ __('Remember Me') }}
                                      </label>
                                  </div>
                              </div>
                          </div>

                          <div class="form-group row mb-0">
                              <div class="col-md-8 offset-md-4">
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
                              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                              <div class="col-md-8">
                                  <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="weilogg" required autofocus>

                                  @if ($errors->has('name'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                              <div class="col-md-8">
                                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="weilogg@gmail.com" required>

                                  @if ($errors->has('email'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                              <div class="col-md-8">
                                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="Logg5843" required>

                                  @if ($errors->has('password'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                              <div class="col-md-8">
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
                              <div class="col-md-6 offset-md-4">
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
</body>
</html>
