<!-- register -->
<html>

	<head>
		<link rel="stylesheet" type="text/css" href="css/login_style.css">
		<link href='http://fonts.googleapis.com/css?family=Raleway:300' rel='stylesheet' type='text/css'>
		<title>Register</title>
	<head>
	
	<body>
		
		<div id="wrap">
			<div id="header">
				<img src="res/logo.png" alt="Logo">
			</div>
			
			<div id="main">
				<div class="register_form">
					<h1>Get Ink'd</h1>
					<form id="register" action="scripts/create_user.php" method="POST">
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

			</div>

		</div>

		<div id="footer">

		</div>
	</body>
	
</html>
