  <!-- START: header -->
  <header role="banner" class="probootstrap-header">
    <div class="container-fluid">
      <!-- <div class="row"> -->
        <a href="/wages/home" class="probootstrap-logo">Wages</a>
        
        <a href="#" class="probootstrap-burger-menu visible-xs" ><i>Menu</i></a>
        <div class="mobile-menu-overlay"></div>

        <nav role="navigation" class="probootstrap-nav hidden-xs">
          <ul class="probootstrap-main-nav">
            <li><a href="/wages/valuations">Valuations</a></li>
            <li><a href="/wages/portfolios">Portfolio</a></li>
            <li><a href="pricing.html">Pricing</a></li>
            <li><a href="tour.html">Tour</a></li>
            <li><a href="login.html">Log in</a></li>
            {{-- <li class="probootstrap-cta"><a href="signup.html">Sign up</a></li> --}}
          </ul>
          <div class="extra-text visible-xs">
            <a href="#" class="probootstrap-burger-menu"><i>Menu</i></a>
            <h5>Social</h5>
            <ul class="social-buttons">
              <li><a href="#"><i class="icon-twitter"></i></a></li>
              <li><a href="#"><i class="icon-facebook"></i></a></li>
              <li><a href="#"><i class="icon-instagram2"></i></a></li>
            </ul>
            <p><small>&copy; Copyright 2017. All Rights Reserved.</small></p>
          </div>
        </nav>
        @if($request->route()->getName() == "home.index")
          <section class="probootstrap-intro">
            <div class="container">
              <div class="row">
                <div class="col-md-8 col-md-offset-2">
                  asdasd
                  {{-- <h1 class="probootstrap-animate">Create cool template, For the better web</h1>
                  <div class="probootstrap-subtitle probootstrap-animate">
                    <h2>A modern type of website template for your new business brought to you by <a href="https://uicookies.com/" target="_blank">uicookies.com</a></h2>
                  </div>
                  <p class="watch-intro probootstrap-animate"><a href="https://vimeo.com/45830194" class="popup-vimeo">Watch the intro <i class="icon-play2"></i></a></p> --}}
                </div>
              </div>
            </div>
          </section>
        @endif

      <!-- </div> -->
    </div>
    
    
  </header>
  <!-- END: header -->