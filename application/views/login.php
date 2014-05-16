<div class="login_container">
	<h2>Sign In</h2>
	<form id="loginForm" class='login_form' action="scripts/confirm_login.php" method="POST">
		<input name='email' type="text" placeholder="Email"/>
		<input name='pass' type="password" placeholder="Password"/>
		<input name='login' type="submit" value="Sign In"/><br>
	</form>
	<p>Forgot your password? <a href="/login/register" >Reset password</a><p>
	<div class="hide alert alert-error">
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	  <span><strong>Error!</strong> You did not enter a correct username or password!</span>
	</div>
	</div>

	<div class="container">
	<!-- Example row of columns -->
	<div class="row">
		<div class="col-md-4">
		  <h2>Welcome to Inkd</h2>
		  <p>Inkd is a social network similar to Facebook and Twitter. Make an account, find your friends, and spill some ink!</p>
		</div>
		<div class="col-md-4">
		  <h2>Register Now!</h2>
		  <p>Why not? Inkd is completely free.</p>
		  <a href='/login/register'><button type="button" class="btn btn-primary">Register &raquo;</button></a>
		</div>
		<div class="col-md-4">
		  <h2>Contact Us</h2>
		  <p>Inkd was created by two college students with an aspiration for programming. We'd love to hear your feedback.</p>
		</div>

	</div>
</div> <!-- /container -->