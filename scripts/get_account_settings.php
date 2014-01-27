<?php

session_start();
$u_id = $_SESSION['u_id'];

//connect to database
require_once __DIR__ . '/db_connect.php';
$mysqli = connect();

$query = "SELECT first_name, last_name, email FROM user WHERE u_id='$u_id'";
$result=$mysqli->query($query);

if($result !== false && $result->num_rows > 0) 
{
	$row = $result->fetch_assoc();
	$mysqli->close();
	
	$first = $row['first_name'];
	$last = $row['last_name'];
	$email = $row['email'];
	
	//sanitize output
	$response = array(
		'success' => true,
		'data' => array(
			'first' => htmlentities($first),
			'last' => htmlentities($last),
			'email' => htmlentities($email)
		)
	);
}else{
	$response = array(
		'success' => false,
		'data' => json_decode("{}")
	);
}

print json_encode($response);
?>