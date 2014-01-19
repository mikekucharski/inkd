<?php
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
	$password = $row['password'];
	
	//sanitize output
	$first = htmlentities($first);
	$last = htmlentities($last);
	$email = htmlentities($email);
	$password = htmlentities($password);
}

?>