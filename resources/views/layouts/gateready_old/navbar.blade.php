<nav class="navbar navbar-inverse navbar-fixed-top" style=""><!-- navbar-default -->
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar top-bar"></span>
	        <span class="icon-bar middle-bar"></span>
	        <span class="icon-bar bottom-bar"></span>
	      </button>
	      @if(Auth::guest())

	      <a class="navbar-brand" href="#"><img id="logo" src="#" alt="GateReady Logo">
	      	<span class="brand_name">GateReady</span>
	      </a>

	      @else

	      <a class="navbar-brand" href="#"><img id="logo" src="#" alt="GateReady Logo">
	      	<span class="brand_name">GateReady</span>
	      </a>

	      @endif
	    </div>
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<!--ul class="nav navbar-nav navbar-left">
				<li><a href=""></a></li>
			</ul-->
			<ul class="nav navbar-nav navbar-right">
				
				
				@if(Auth::guest())
				<!-- Trigger the login register modal with a button -->
				<li id="conversion_btn"><a href="#" data-toggle="modal" data-target="#loginRegModal">Login or Register</a></li>
				<li class="nav_btn"><a href="/gateready/faq">FAQ</a></li>
				@else
				<li id="conversion_btn"><a href="#">Experience It!</a></li>
				<li class="nav_btn"><a href="/gateready">About</a></li>
				<!-- <li><a href="#" data-toggle="modal" data-target="#howItWorksModal">How It Works</a></li> -->
				
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true">
	                @if(!Auth::user()->avatar && !Auth::user()->profile_picture)
		            <img src="#" class="navbar_avatar" height="30px" width="30px"/>
		            @elseif(Auth::user()->profile_picture)
		            <img src="#" class="navbar_avatar" height="30px" width="30px"/>
		            @else
		            <img src="#" class="navbar_avatar" height="30px" width="30px"/>
		            @endif
	                #<span class="caret"></span></a>

	                <ul class="dropdown-menu" role="menu">
	                	@if(!Auth::user()->first_time)
	                	<li><a href="#">Profile</a></li>
	                	
	                	@endif
	                	<li><a href="/gaterady/faq">FAQ</a></li>
	                    <li><a href="gateready/logout">Logout</a></li>
	                </ul>
	            </li>
	            @endif
			</ul>
		</div>
	</div>
	
</nav>

<!-- loginRegModal -->
<div id="loginRegModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">

			<div class="modal-header" >
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<!-- <ul class="nav nav-pills">
					
					<li id="login_pill" class="active"><a data-toggle="pill" href="#login">Login</a></li>
					<li id="register_pill"><a data-toggle="pill" href="#register">Register</a></li>
				</ul> -->
			</div>

			<div class="modal-body">
				<ul class="nav nav-pills">
					
					<li id="login_pill" class="active"><a data-toggle="pill" href="#login">Login</a></li>
					<li id="register_pill"><a data-toggle="pill" href="#register">Register</a></li>
				</ul>
				<div align="center">
					<a href="auth/facebook"><button class="facebook_share"><i class="fa fa-facebook"></i>Continue with Facebook</button></a>
				</div>
			<!-- </div>
			<div class="modal-footer"> -->
				
				<div class="tab-content">
					<div id="login" class="tab-pane fade in active">
						<!-- login -->
						<!-- form -->
						<div class="login_form_div">
							<form id="login_form" class="form-horizontal" role="form" method="POST" action="#">
		                        <div id="spinner" class="spinner" style="width:100px; height:100px;display:none;opacity:.5;">
									<img id="img-spinner" src="#" alt="Loading" height="100px" width="100px"/>
								</div>
		                        {{ csrf_field() }}

	                            <div class="login_field">
	                                <input id="email" type="email" class="" name="email" value="grabskill@gmail.com" placeholder="Email Address"><!-- old('email') -->
	                                <!-- ajax validation error -->
				                    <span id="email_ajax_validate" class="ajax_validate" style="color:red;"></span>      
				                    <!-- php validation error -->
				                    @if($errors->has('email'))
				                    <span class="login_error">{{ $errors->first('email') }}</span>
				                    @endif
	                            </div>

	                            <div class="login_field">
	                                <input id="password" type="password" class="" name="password" placeholder="Password">
	                                <!-- ajax validation error -->
				                    <span id="password_ajax_validate" class="ajax_validate" style="color:red;"></span>      
				                    <!-- php validation error -->
				                    @if($errors->has('password'))
				                    <span class="login_error">{{ $errors->first('password') }}</span>
				                    @endif
	                            </div>

                                <div class="login_field">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
		                        <div class="login_field">
		                        	<input type="submit" name="login" class="btn btn-default" value="Login">
		                        </div>
		                        <div class="login_field">
		                        	<a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
		                        </div>   
		                    </form>
		                </div>
		                <!-- end login form div -->
					</div>
					<div id="register" class="tab-pane fade">
						<div class="register_form_div">
							<!-- registration -->

							<!-- form -->
							<form id="register_form" class="form-horizontal" role="form" method="POST" action="#">
		                        
	                        	<div id="spinner" class="spinner" style="width:100px; height:100px;display:none;opacity:.5;">
									<img id="img-spinner" src="#" alt="Loading" height="100px" width="100px"/>
								</div>
		                        
		                        {{ csrf_field() }}

	                            <div class="register_field">
	                                <input id="name" type="text" class="" name="register_name" value="Logg" placeholder="Name">
	                                <!-- ajax validation error -->
				                    <span id="register_name_ajax_validate" class="ajax_validate" style="color:red;"></span>      
				                    <!-- php validation error -->
				                    @if($errors->has('register_name'))
				                    <span class="register_error">{{ $errors->first('register_name') }}</span>
				                    @endif
	                            </div>

	                            <div class="register_field">
	                                <input id="email" type="email" class="" name="register_email" value="grabskill@gmail.com" placeholder="Email Address">
	                                <!-- ajax validation error -->
				                    <span id="register_email_ajax_validate" class="ajax_validate" style="color:red;"></span>      
				                    <!-- php validation error -->
				                    @if($errors->has('register_email'))
				                    <span class="register_error">{{ $errors->first('register_email') }}</span>
				                    @endif
	                            </div>

	                            <div class="register_field">
	                                <input id="password" type="password" class="" name="register_password" placeholder="Password">
	                                <!-- ajax validation error -->
				                    <span id="register_password_ajax_validate" class="ajax_validate" style="color:red;"></span>      
				                    <!-- php validation error -->
				                    @if($errors->has('register_password'))
				                    <span class="register_error">{{ $errors->first('register_password') }}</span>
				                    @endif
	                            </div>

	                            <div class="register_field">
	                                <input id="password-confirm" type="password" class="" name="register_password_confirmation" placeholder="Confirm Password">

	                            </div>

	                            <div class="register_field">
	                                <input id="tnc" type="checkbox"  name="tnc" value="1">&nbsp;I have read and accepted <a href="#">
	                                Terms and Condition </a>and <a href="#">Privacy Policy</a>

	                                <!-- ajax validation error -->
				                    <span id="tnc_ajax_validate" class="ajax_validate" style="color:red;"></span>      
				                    <!-- php validation error -->
				                    @if($errors->has('tnc'))
				                    <span class="register_error">{{ $errors->first('tnc') }}</span>
				                    @endif
	                            </div>

	                            <div class="register_field">
                                	<input type="submit" class="btn btn-default" value="Register">
		                        </div>
		                    </form>
		                </div>
		                <!-- end registration form div -->
					</div>
				</div>
			</div>
		  <!-- 
		    <button type="button" class="close" data-dismiss="modal">&times;</button>
		    <h4 class="modal-title">Modal Header</h4>
		  </div>
		  
		    <p>Some text in the modal.</p>
		  </div>
		  
		    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div> -->
		</div>

	</div>
</div>

<style>
#register_form span, #login_form span{
	color:red;
}

ul.dropdown-menu{
	background: #272727;

}

ul.dropdown-menu li a:hover{
	background: #3d3d3d;
	
}
</style>




