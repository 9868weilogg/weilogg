<style>
@media screen and (min-width:600px){
    .icon, div#xsMode, div#logoMenu,div#sideBarDiv{
    display:none;
  }
}

@media screen and (max-width: 600px){
  .icon, div#xsMode, div#logoMenu{
    display:inline;
  }
  
  div.name-nav-md, div#mdMode{
    display:none;
  }
</style>

<!-- side bar show during md mode -->
<div class="col-3 name-nav-md" name="nav-md" style="background-color:cyan;">
  <div id="logoSideBar">
    <a class="navbar-brand" href="{{ url('/') }}">
      {{ config('app.name', 'weilogg.com') }}
    </a>
  </div>
  <nav class="nav flex-column">
    
    @guest
    <div id="navbarSupportedContent">
    <a class="nav-link" href="/">Home</a>
    <a class="nav-link" href="/about">About</a>
    <a class="nav-link" href="/portfolio">Portfolio</a>
    <a class="nav-link" href="/resume">Resume</a>
    <a class="nav-link" href="/contact">Contact</a>
    <a class="nav-link" data-toggle="modal" data-target="#loginModal">Login</a>
    <a class="nav-link" data-toggle="modal" data-target="#regModal">Register</a>
    
    </div>
    @else
    <a class="nav-link" href="/logout">Logout</a>
    @endguest
    
  </nav>
</div> 
<!-- side bar show during md mode (end)-->

<!-- content with grid col-9 during md mode -->
<div class="col-9" id="mdMode">
  <main class="py-4">
    @yield('content')
  </main>
</div>
<!-- content with grid col-9 during md mode (end)-->


