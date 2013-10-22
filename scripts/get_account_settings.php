<?php

$u_id = $_SESSION['u_id'];

//connect to database
require_once __DIR__ . '/db_connect.php';
$db = new DB_CONNECT();

$query = "SELECT * FROM user WHERE u_id='$u_id'";
$result = mysql_query($query);

if (!empty($result) &&	mysql_num_rows($result) > 0) 
{
	$row = mysql_fetch_array($result);
	
	$first = $row['first_name'];
	$last = $row['last_name'];
	$email = $row['email'];
	$password = $row['password'];
	
	print "
	<form action='#' method='get'>
		<table id='form_table'>
		<tr>
			<td><label>First Name:</label></td>
			<td><input type='text' name='first_name' value='$first'></input></td>
		</tr>
		<tr>
			<td><label>Last Name:</label></td>
			<td><input type='text' name='last_name' value='$last'></input></td>
		</tr>
		<tr>
			<td><label>Email Address:</label></td>
			<td><input type='text' name='email' value='$email'></input></td>
		</tr>
		<tr>
			<td><label>Current Password:</label></td>
			<td><input type='text' name='current_password'></td>
		</tr>
		<tr>
			<td><label>New Password:</label></td>
			<td><input type='text' name='password1'></td>
		</tr>
		<tr>
			<td><label>Confirm Password:</label></td>
			<td><input type='text' name='password2'></td>
		</tr>
		<tr>
			<td></td>
			<td><input type='submit' name='submit' value='Apply Changes'></input></td>
		</tr>
		</table>
	</form>
	";
}

?>