<?php

	if (isset($_POST["first"]) && !empty($_POST["first"]) 
		&& isset($_POST["last"]) && !empty($_POST["last"])
		&& isset($_POST["email"]) && !empty($_POST["email"])
		&& isset($_POST["password"]) && !empty($_POST["password"]) 
		&& isset($_POST["password2"]) && !empty($_POST["password2"]))
	{
		$first = $_POST["first"];
		$last = $_POST["last"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$password2 = $_POST["password2"];
		
		if($password != $password2){
			header("location:../register.php?error=password_match");
			exit();
		}else if(strlen($password) < 6){
			header("location:../register.php?error=short_password");
			exit();
		}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			header("location:../register.php?error=invalid_email");
			exit();
		}else{
			//All good, save data
			
			//Salt the password
			define('SALT_LENGTH', 20);
			$salt='';
			$character = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
			for ($i=0; $i<20; $i++)
			{
				$salt.=$character[rand(0, (strlen($character)-1))];
			}
			
			$password = hash('sha256', $salt.$password);
			
			//connect to database
			require_once __DIR__ . '/db_connect.php';
			$mysqli = connect();
			
			//sanitize input
			$first = $mysqli->real_escape_string(trim($first));
			$last = $mysqli->real_escape_string(trim($last));
			$email = $mysqli->real_escape_string(trim($email));
			$password = $mysqli->real_escape_string(trim($password));
			
			$query = "INSERT INTO user(first_name, last_name, email, password, salt) VALUES('$first', '$last', '$email', '$password', '$salt')";
			$result=$mysqli->query($query);
			$last_id= $mysqli->insert_id;
			
			$query2 = "INSERT INTO user_info(u_id,hometown,location, school, workplace, birthday, description) VALUES('$last_id','','','','','','')";
			$result2 = $mysqli->query($query2);
			// check if row inserted or not
			$mysqli->close();
			if (($result && $result2) !== false) 
			{
				// successfully inserted into database
				SESSION_START();
				$_SESSION['logged_in']=true;
				$_SESSION['u_id']=$last_id;
				$_SESSION['first_name']=$first;
				header("location:../index.php?page=home&new_acc=true");
				exit();
			} else {
				header("location:../register.php?error=query_fail");
			}
		}

	}else{
		header("location:../register.php?error=empty_fields");
		exit();
	}
?>