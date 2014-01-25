<?php

session_start();
$u_id = $_SESSION['u_id'];

//connect to database
require_once __DIR__ . '/db_connect.php';
$mysqli = connect();

$query = "SELECT * FROM user WHERE u_id='$u_id'";
$result=$mysqli->query($query);

if($result !== false && $result->num_rows > 0) 
{
	$row = $result->fetch_assoc();
	$mysqli->close();
	
	$first = $row['first_name'];
	$last = $row['last_name'];
	$email = $row['email'];
	
	//sanitize output
	$response['success'] = true;
	$response['first'] = htmlentities($first);
	$response['last'] = htmlentities($last);
	$response['email'] = htmlentities($email);
}

$response['success'] = false;
print json_encode($response);
?>