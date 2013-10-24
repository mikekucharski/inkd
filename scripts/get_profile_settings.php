<?php
error_reporting(0);
$u_id = $_SESSION['u_id'];

//connect to database
require_once __DIR__ . '/db_connect.php';
$db = new DB_CONNECT();

$query = "SELECT * FROM user_info WHERE u_id='$u_id'";
$result = mysql_query($query);

if (!empty($result) &&	mysql_num_rows($result) > 0) 
{
	$row = mysql_fetch_array($result);
	
	$hometown = $row['hometown'];
	$location = $row['location'];
	$school = $row['school'];
	$workplace = $row['workplace'];
	$birthday = $row['birthday'];
	$description = $row['description'];
	
	print "
	<form action='scripts/update_user_info.php' method='get'>
		<table id='form_table'>
		<tr>
			<td><label>Hometown:</label></td>
			<td><input type='text' name='hometown' value='$hometown'></input></td>
		</tr>
		<tr>
			<td><label>Location:</label></td>
			<td><input type='text' name='location' value='$location'></input></td>
		</tr>
		<tr>
			<td><label>School:</label></td>
			<td><input type='text' name='school' value='$school'></input></td>
		</tr>
		<tr>
			<td><label>Workplace:</label></td>
			<td><input type='text' name='workplace' value='$workplace'></td>
		</tr>
		<tr>
			<td><label>Birthday:</label></td>
			<td><input type='text' name='birthday' value='$birthday'></td>
		</tr>
		<tr>
			<td><label>Short Description:</label></td>
			<td><input type='text' name='description' value='$description'></td>
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