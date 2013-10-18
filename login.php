<!-- login -->
<html>

	<head>
		<!-- Bootstrap CSS-->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<!-- Bootstrap JS-->
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		
		<link rel="stylesheet" type="text/css" href="css/login_style.css">
		<link href='http://fonts.googleapis.com/css?family=Raleway:300' rel='stylesheet' type='text/css'>
		<title>Log In</title>
	<head>
	
	<body>
		
		<div id="wrap">
			<div id="header">

			</div>
			
			<div id="main">
				<div class="login_form">
					<h1>Sign In</h1>
					<form action="scripts/confirm_login.php" method="POST">
						<input name='email' type="text" placeholder="Email"/>
						<input name='pass' type="password" placeholder="Password"/>
						<input name='login' type="submit" value="Sign In"/><br>
					</form>
					<p>Don't have an account? <a href="register.php" >Register</a><p>
					<div class="hide alert alert-error">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <span><strong>Error!</strong> You did not enter a correct username or password!</span>
					</div>
				</div>
			</div>

		</div>

		<div id="footer">

		</div>
	</body>
	
</html>
