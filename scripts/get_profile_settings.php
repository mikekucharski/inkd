<?php
$u_id = $_SESSION['u_id'];

//connect to database
require_once __DIR__ . '/db_connect.php';
$mysqli = connect();

$query = "SELECT * FROM user_info WHERE u_id='$u_id'";
$result=$mysqli->query($query);

if($result !== false && $result->num_rows > 0) 
{
	$row = $result->fetch_assoc();
	$mysqli->close();
	
	$hometown = $row['hometown'];
	$location = $row['location'];
	$school = $row['school'];
	$workplace = $row['workplace'];
	$birthday = $row['birthday'];
	$description = $row['description'];
	
	//sanitize output
	$hometown = htmlentities($hometown);
	$location = htmlentities($location);
	$school = htmlentities($school);
	$workplace = htmlentities($workplace);
	$birthday = htmlentities($birthday);
	$description = htmlentities($description);
	
	?>
	<form id='ps_form'>
		<table id='form_table'>
		<tr>
			<td><label>Hometown:</label></td>
			<td><input id='hometown' class='form-control' type='text' name='hometown' maxlength='50' value='<?=$hometown ?>'></input></td>
		</tr>
		<tr>
			<td><label>Location:</label></td>
			<td><input id='location' class='form-control' type='text' name='location' maxlength='50' value='<?=$location ?>'</input></td>
		</tr>
		<tr>
			<td><label>School:</label></td>
			<td><input id='school' class='form-control' type='text' name='school' maxlength='50' value='<?=$school ?>'></input></td>
		</tr>
		<tr>
			<td><label>Workplace:</label></td>
			<td><input id='workplace' class='form-control' type='text' name='workplace' maxlength='50' value='<?=$workplace ?>'></td>
		</tr>
		<tr>
			<td><label>Birthday:</label></td>
			<td><input class='form-control' type='text' name='birthday' id='datepicker' readonly="readonly" value='<?=$birthday?>'></td>
		</tr>
		<tr>
			<td><label>Short Description:</label></td>
			<td><input id='description' class='form-control' type='text' name='description' maxlength='250' value='<?=$description?>'></td>
		</tr>
		<tr>
			<td></td>
			<td><input id='update_ps' class='btn btn-success' type='submit' name='submit' value='Apply Changes'></input></td>
		</tr>
		</table>
	</form>
	<?php
}
?>