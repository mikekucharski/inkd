<?php

		if (isset($_POST["first"]) && !empty($_POST["first"]) 
		&& isset($_POST["last"]) && !empty($_POST["last"])
		&& isset($_POST["email"]) && !empty($_POST["email"])
		&& isset($_POST["password"]) && !empty($_POST["password"]) 
		&& isset($_POST["password2"]) && !empty($_POST["password2"])
		&& isset($_GET["uid"]) && !empty($_GET["uid"]))
	{
		$first = $_POST["first"];
		$last = $_POST["last"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$password2 = $_POST["password2"];
		$u_id = $_GET["u_id"];

		if($password != $password2){
			header("location:../account_settings.php?error=password_match");
			exit();
		}else if(strlen($password) < 6){
			header("location:../account_settings.php?error=short_password");
			exit();
		}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			header("location:../account_settings.php?error=invalid_email");
			exit();
		}else{
		
			//connect to database
			require_once __DIR__ . '/db_connect.php';
			$db = new DB_CONNECT();
			
			$query = "UPDATE user SET first_name='$first', last_name='$last', email='$email', password='$password'  WHERE u_id='$u_id'";
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
		}

	}else{
		header("location:../account_settings.php?error=empty_fields");
		exit();
	}
?>