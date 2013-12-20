<html>
	<head>
	<link rel="stylesheet" type="text/css" href="css/login_style.css">
	<?php include('includes/head.php'); ?>
		<title>Log In</title>
	</head>
	
	 <body>

		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		  <div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="#">Ink'd</a>
			</div>
		  </div>
		</div> 
		
		<div class="login_container">
			<h2>Sign In</h2>
			<form class='login_form' action="scripts/confirm_login.php" method="POST">
				<input name='email' type="text" placeholder="Email"/>
				<input name='pass' type="password" placeholder="Password"/>
				<input name='login' type="submit" value="Sign In"/><br>
			</form>
			<p>Forgot your password? <a href="register.php" >Reset password</a><p>
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
			  <a href='register.php'><button type="button" class="btn btn-primary">Register &raquo;</button></a>
			</div>
			<div class="col-md-4">
			  <h2>Contact Us</h2>
			  <p>Inkd was created by two college students with an aspiration for programming. We'd love to hear your feedback.</p>
			</div>
			
		  </div>

		  <hr>

		  <footer>
			<p>&copy; Mike Kucharski & Dhruv Patel</p>
		  </footer>
		</div> <!-- /container -->
	</body>
</html>
