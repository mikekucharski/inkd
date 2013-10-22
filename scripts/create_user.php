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
			
			//connect to database
			require_once __DIR__ . '/db_connect.php';
			$db = new DB_CONNECT();
			
			$query = "INSERT INTO user(first_name, last_name, email, password) VALUES('$first', '$last', '$email', '$password')";
			$result = mysql_query($query);
			$last_id= mysql_insert_id();
			
			$query2 = "INSERT INTO user_info(u_id,hometown,location, school, workplace, birthday, description) VALUES('$last_id','','','','','','')";
			$result2 = mysql_query($query2);
			// check if row inserted or not
			if ($result && $result2) 
			{
				// successfully inserted into database
				SESSION_START();
				$_SESSION['logged_in']=true;
				$_SESSION['u_id']=$last_id;
				$_SESSION['first_name']=$first;
				header("location:../home.php?new_acc=true");
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