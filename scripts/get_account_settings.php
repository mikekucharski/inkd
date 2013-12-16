<?php
$u_id = $_SESSION['u_id'];

//connect to database
require_once __DIR__ . '/db_connect.php';
$mysqli = connect();

$query = "SELECT * FROM user WHERE u_id='$u_id'";
$result=$mysqli->query($query);

if ($result !== false && $result->num_rows > 0) 
{
	$row = $result->fetch_assoc();
	$first = $row['first_name'];
	$last = $row['last_name'];
	$email = $row['email'];
	$password = $row['password'];
	
	//sanitize output
	$first = htmlentities($first);
	$last = htmlentities($last);
	$email = htmlentities($email);
	$password = htmlentities($password);
	
	print "
	<form action='scripts/update_user.php' method='post'>
		<table id='form_table'>
		<tr>
			<td><label>First Name:</label></td>
			<td><input class='form-control' type='text' name='first_name' value='$first'></input></td>
		</tr>
		<tr>
			<td><label>Last Name:</label></td>
			<td><input class='form-control' type='text' name='last_name' value='$last'></input></td>
		</tr>
		<tr>
			<td><label>Email Address:</label></td>
			<td><input class='form-control' type='text' name='email' value='$email'></input></td>
		</tr>
		<tr>
			<td></td>
			<td><input class='btn btn-success' type='submit' name='submit' value='Apply Changes'></input></td>
		</tr>
		</table>
	</form>
	";
	print "<div class='no-marg center col-sm-6 page-header'><h1>Change Password</h1></div>";
	print "
	<form action='scripts/update_password.php' method='post'>
		<table id='form_table'>
		<tr>
			<td><label>Current Password:</label></td>
			<td><input class='form-control' type='text' name='current_password'></td>
		</tr>
		<tr>
			<td><label>New Password:</label></td>
			<td><input class='form-control' type='password' name='password1'></td>
		</tr>
		<tr>
			<td><label>Confirm Password:</label></td>
			<td><input class='form-control' type='password' name='password2'></td>
		</tr>
		<tr>
			<td></td>
			<td><input class='btn btn-success' type='submit' name='submit' value='Change Password'></input></td>
		</tr>
		</table>
	</form>
	";
}

?>