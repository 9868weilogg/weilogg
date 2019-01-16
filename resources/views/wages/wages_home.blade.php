@extends('wages.layouts.app')

@push('title')
Home
@endpush

@push('css')
{{-- chart-js css --}}
<link rel="stylesheet" href="{{ asset('asset/lucid-hr-and-pm/html/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('asset/lucid-hr-and-pm/html/assets/vendor/font-awesome/css/font-awesome.min.css') }}"> --}}
@endpush

@section('content')
<!-- START: section -->
<section class="probootstrap-section probootstrap-feature-first">
  <div class="container">
    <div class="row mb70" style="margin-top: -120px;">
      <div class="col-md-4 probootstrap-animate">
        <div class="probootstrap-box">
            <div class="icon"><i class="icon-presentation"></i></div>
            <h3>Business 1presentation</h3>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
        </div>
      </div>
      <div class="col-md-4 probootstrap-animate">
        <div class="probootstrap-box">
            <div class="icon"><i class="icon-bargraph"></i></div>
            <h3>Business growth</h3>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
        </div>
      </div>
      <div class="col-md-4 probootstrap-animate">
        <div class="probootstrap-box">
            <div class="icon"><i class="icon-megaphone2"></i></div>
            <h3>Standout from the crowd</h3>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 col-md-offset-4 probootstrap-animate">
        <p class="text-center">
          <a href="#" class="btn btn-primary btn-lg btn-block" role="button">Get started</a>
        </p>
      </div>
    </div>
  </div>
</section>
<!-- END: section -->



<!-- START: section -->
{{-- <section class="probootstrap-section probootstrap-section-extra">
  <div class="container-fluid probootstrap-absolute">
    <div class="row">
      <div class="col-md-7 col-md-push-6 probootstrap-animate" data-animate-effect="fadeInRight">
        <img src="{{ asset('asset/sublime/img/img_showcase_2.jpg') }}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive shadow-left">
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-md-5 section-heading probootstrap-animate">
        <h2>Dividend Income</h2>
        <p class="lead">Passive Income</p>
        
      </div>
    </div>
  </div>
</section> --}}
<!-- END: section -->

<!-- START: section -->
{{-- <section class="probootstrap-section probootstrap-section-extra">
  <div class="container-fluid probootstrap-absolute">
    <div class="row">
      <div class="col-md-8 col-md-pull-2 probootstrap-animate" data-animate-effect="fadeInLeft">
        <img src="{{ asset('asset/sublime/img/laptop_1.jpg') }}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-md-5 col-md-push-6 section-heading probootstrap-animate">
        <h2>Capital Gain</h2>
        <p class="lead">Performance of the stock.</p>
      </div>
    </div>
  </div>
</section> --}}
<!-- END: section -->

<!-- START: section -->
{{-- <section class="probootstrap-section probootstrap-section-extra last">
  <div class="container-fluid probootstrap-absolute">
    <div class="row">
      <div class="col-md-7 col-md-push-6 probootstrap-animate" data-animate-effect="fadeInRight">
        <img src="{{ asset('asset/sublime/img/img_showcase_1.jpg') }}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive shadow-left">
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-md-5 section-heading probootstrap-animate">
        <h2>Watchlist</h2>
        <p class="lead">List of stocks.</p>
      </div>
    </div>
  </div>
</section> --}}
<!-- END: section -->

<!-- START: section -->
{{-- <section class="probootstrap-section probootstrap-section-extra">
  <div class="container-fluid probootstrap-absolute">
    <div class="row">
      <div class="col-md-8 col-md-pull-2 probootstrap-animate" data-animate-effect="fadeInLeft">
        <img src="{{ asset('asset/sublime/img/laptop_1.jpg') }}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-md-5 col-md-push-6 section-heading probootstrap-animate">
        <h2>Search</h2>
        <p class="lead">Get stock quotes.</p>
      </div>
    </div>
  </div>
</section> --}}
<!-- END: section -->

<!-- START: section -->
{{-- <section class="probootstrap-section probootstrap-section-colored">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2 section-heading mb50 text-center probootstrap-animate">
        <h2>More Benefits</h2>
        <p class="lead">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
        <h3 class="heading-with-icon"><i class="icon-heart2"></i> <span>We bring emotion</span></h3>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
        <h3 class="heading-with-icon"><i class="icon-rocket"></i> <span>We guide companies</span></h3>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
      </div>
      <div class="clearfix visible-sm-block"></div>
      <div class="col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
        <h3 class="heading-with-icon"><i class="icon-image"></i> <span>We design extraordinary</span></h3>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
      </div>
      <div class="clearfix visible-md-block"></div>
      <div class="col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
        <h3 class="heading-with-icon"><i class="icon-briefcase"></i> <span>We bring emotion</span></h3>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
      </div>
      <div class="clearfix visible-sm-block"></div>
      <div class="col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
        <h3 class="heading-with-icon"><i class="icon-chat"></i> <span>We guide companies</span></h3>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
        <h3 class="heading-with-icon"><i class="icon-colours"></i> <span>We design extraordinary</span></h3>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
      </div>
      <div class="clearfix visible-sm-block"></div>
    </div>
  </div>
</section> --}}
<!-- END: section -->

<section class="probootstrap-section">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2 section-heading mb50 text-center">
        <h2>Our Products</h2>
        <p class="lead">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
        <h3 class="mb30">Search</h3>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button">Button</button>
          </div>
        </div>
        <p>Stock Quotes:</p>
        <p><a href="#" class="link-with-icon">Learn More <i class=" icon-chevron-right"></i></a></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 col-sm-6 col-xs-12">
        <h3 class="mb30">Dividend Income</h3>
        <div class="sparkline" data-type="bar" data-width="97%" data-height="150px" data-bar-Width="30" data-bar-Spacing="20" data-bar-Color="#7868da">2:2,2:4,4:2,4:1</div>
        <p><a href="#" class="link-with-icon">Learn More <i class=" icon-chevron-right"></i></a></p>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <h3 class="mb30">Watchlist</h3>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <th>Name</th>
              <th>Last Price</th>
            </thead>
            <tbody>
              <tr>
                <td>KESM</td>
                <td>RM 8.12</td>
              </tr>
            </tbody>
          </table>
        </div>
        <p><a href="#" class="link-with-icon">Learn More <i class=" icon-chevron-right"></i></a></p>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <h3 class="mb30">Capital Gain</h3>
        <div class="sparkline" data-type="bar" data-width="97%" data-height="150px" data-bar-Width="30" data-bar-Spacing="20" data-bar-Color="#7868da">-3,1,2,0,3,-1</div>
        <p><a href="#" class="link-with-icon">Learn More <i class=" icon-chevron-right"></i></a></p>
      </div>
    </div>
  </div>
</section>
<!-- END: section -->
@endsection

@push('scripts')
{{-- sublime theme js --}}
<script src="{{ asset('asset/sublime/js/scripts.min.js') }}"></script>
<script src="{{ asset('asset/sublime/js/main.min.js') }}"></script>
<script src="{{ asset('asset/sublime/js/custom.js') }}"></script>

{{-- lucid theme js --}}
<script src="{{ asset('asset/lucid-hr-and-pm/html/assets/bundles/libscripts.bundle.js') }}"></script>    
<script src="{{ asset('asset/lucid-hr-and-pm/html/assets/bundles/vendorscripts.bundle.js') }}"></script>

<script src="{{ asset('asset/lucid-hr-and-pm/html/assets/vendor/jquery-sparkline/js/jquery.sparkline.min.js') }}"></script>
   
<script src="{{ asset('asset/lucid-hr-and-pm/html/assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('asset/lucid-hr-and-pm/html/assets/js/pages/charts/sparkline.js') }}"></script>

@endpush