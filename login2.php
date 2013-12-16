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

		<!-- Main jumbotron for a primary marketing message or call to action -->
		<div class="jumbotron" style='padding-top:75px;'>
		  <div class="container">
			<h1>Welcome to Ink'd!</h1>
			<p>Join our social network and connect with your friends. Why not? It's free!</p>
			<p><a name="register" href="register2.php" class="btn btn-primary btn-lg" role="button">Register &raquo;</a></p>
		  </div>
		</div>
		
		<div class="login_container">
			<h1>Sign In</h1>
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
			  <h2>What is Ink'd?</h2>
			  <p> </p>
			</div>
			<div class="col-md-4">
			  <h2>Why Ink'd?</h2>
			  <p> </p>
		   </div>
			<div class="col-md-4">
			  <h2>Contact Us</h2>
			  <p></p>
			</div>
		  </div>

		  <hr>

		  <footer>
			<p>&copy; Mike Kucharski & Dhruv Patel</p>
		  </footer>
		</div> <!-- /container -->
	</body>
</html>
