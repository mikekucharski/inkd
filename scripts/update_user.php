<?php
	$first = "";
	$last = "";
	$email = "";
	
	session_start();
	$u_id = $_SESSION['u_id'];
	
	if (isset($_POST["first_name"]) && !empty($_POST["first_name"]))
	{
		$first = $_POST["first_name"];
	}
	if(isset($_POST["last_name"]) && !empty($_POST["last_name"]))
	{
		$last = $_POST["last_name"];
	}
	if(isset($_POST["email"]) && !empty($_POST["email"])
		&& filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
	{
		$email = $_POST["email"];
	}else{
		header("location:../account_settings.php?invalid_email");
		exit();
	}
	
	//connect to database
	require_once __DIR__ . '/db_connect.php';
	$mysqli = connect();
	
	$query = "UPDATE user SET first_name='$first', last_name='$last', email='$email'  WHERE u_id='$u_id'";
	$result=$mysqli->query($query);
	$mysqli->close();
	if ($result !== false) 
	{
		// successfully updated database
		header("location:../account_settings.php?updated=1");
		exit();
	} else {
		header("location:../account_settings.php?error=query_fail");
		exit();
	}
?>