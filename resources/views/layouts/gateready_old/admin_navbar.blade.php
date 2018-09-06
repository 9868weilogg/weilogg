<nav class="navbar navbar-default navbar-fixed-top" style="position:fixed;top:0;width:100%;z-index:10;"><!-- navbar-default -->
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar top-bar"></span>
	        <span class="icon-bar middle-bar"></span>
	        <span class="icon-bar bottom-bar"></span>
	      </button>
	      <a class="navbar-brand" href="{{ url('/') }}">Hotel.com</a>
	    </div>
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<!--ul class="nav navbar-nav navbar-left">
				<li><a href=""></a></li>
			</ul-->
			<ul class="nav navbar-nav navbar-right">
				@if(Auth::check())
				<li><a href="{{ url('/post_room') }}">Post Room</a></li>
				<li><a href="{{ url('/show_room') }}">Show Room</a></li>
				<li><a href="{{ url('/records') }}">Records</a></li>
				@endif
				
				@if(Auth::guest())
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true">
	                Log In / Add Admin<span class="caret"></span></a>

	                <ul class="dropdown-menu" role="menu">
					
						<li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
						<li><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-user"></span> Add Admin</a></li>
					</ul>
				</li>
				@else
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true">
	                {{ Auth::user()->name }}<span class="caret"></span></a>

	                <ul class="dropdown-menu" role="menu">
	                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
	                </ul>
	            </li>
	            @endif
			</ul>
		</div>
	</div>
</nav>