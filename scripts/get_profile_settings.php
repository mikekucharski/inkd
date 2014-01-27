<?php
session_start();
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
	
	$response=array(
		'success' =>true,
		'data' => array(
			'hometown' => htmlentities($hometown), 
			'location' =>  htmlentities($location),
			'school'=>  htmlentities($school),
			'workplace' => htmlentities($workplace),
			'birthday' => htmlentities($birthday),
			'description' => htmlentities($description)
		)
	);
}
else
{
	$response=array(
		'success' =>false,
		'data' => json_decode("{}")
	);
}

print json_encode($response);

?>