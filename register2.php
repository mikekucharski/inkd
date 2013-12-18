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
		
		<div class="login_container register_container">
			<h1>Get Ink'd</h1>
			<form class='login_form' action="scripts/create_user.php" method="POST">
				<table>
					<tr>
						<td><label>First Name:</label></td>
						<td><input name='first' type="text" placeholder="First Name"/></td>
					</tr>
					<tr>
						<td><label>Last Name:</label></td>
						<td><input name='last' type="text" placeholder="Last Name"/> </td>
					</tr>
					<tr>
						<td><label>Email:</label></td>
						<td><input name='email' type="text" placeholder="Email" /> </td>
					</tr>
					<tr>
						<td><label>Password:</label></td>
						<td><input name='password' type="password" placeholder="Password"/> </td>
					</tr>
					<tr>
						<td><label>Confirm Password:</label></td>
						<td><input name='password2' type="password" placeholder="Confirm Password"/> </td>
					</tr>
					<tr>
						<td></td>
						<td><input name='submit' type="submit" value="Register"/></td>
					</tr>
				
				</table>
			</form>
		</div>

		<div class="container">
		  <hr>

		  <footer>
			<p>&copy; Mike Kucharski & Dhruv Patel</p>
		  </footer>
		</div> <!-- /container -->
	</body>
</html>
