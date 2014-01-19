<?php
	if (isset($_GET["first_name"]) && !empty($_GET["first_name"]) &&
		isset($_GET["last_name"]) && !empty($_GET["last_name"]) &&
		isset($_GET["email"]) && !empty($_GET["email"]) && filter_var($_GET["email"], FILTER_VALIDATE_EMAIL))
	{
		$first=$_GET["first_name"];
		$last=$_GET["last_name"];
		$email=$_GET["email"];
		session_start();
		$u_id = $_SESSION['u_id'];
		
		//connect to database
		require_once __DIR__ . '/db_connect.php';
		$mysqli = connect();
		
		$first = $mysqli->real_escape_string(trim($first));
		$last = $mysqli->real_escape_string(trim($last));
		$email = $mysqli->real_escape_string(trim($email));
		
		$query = "UPDATE user SET first_name='$first', last_name='$last', email='$email'  WHERE u_id='$u_id'";
		$result=$mysqli->query($query);
		$mysqli->close();
		
		$response['success']=$result;
		print json_encode($response);
	}
	else
	{
		$response['success']=false;
		print json_encode($response);
	}
?>