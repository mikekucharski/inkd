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
	$db = new DB_CONNECT();
	
	$query = "UPDATE user SET first_name='$first', last_name='$last', email='$email'  WHERE u_id='$u_id'";
	$result = mysql_query($query);
	
	if ($result) 
	{
		// successfully updated database
		header("location:../account_settings.php?updated=1");
		exit();
	} else {
		header("location:../account_settings.php?error=query_fail");
		exit();
	}

	/*** PASSWORD VALIDATION	
		if( isset($_POST["password"]) && !empty($_POST["password"]) 
		&& isset($_POST["password2"]) && !empty($_POST["password2"]))
		{}
		
		if($password != $password2){
			header("location:../account_settings.php?error=password_match");
			exit();
		}else if(strlen($password) < 6){
			header("location:../account_settings.php?error=short_password");
			exit();
		}else{
		
		}
	**/
?>