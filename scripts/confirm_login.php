<?php

	if ( (isset($_POST['email']) && !empty($_POST['email'])) &&
		 (isset($_POST['pass']) && !empty($_POST['pass'])))
	{
		
		$email=$_POST['email'];
		$password =$_POST['pass'];
		
		require_once __DIR__ .'/db_connect.php';
		$mysqli = connect();
		
		$query ="SELECT * FROM user WHERE email='$email'";
		$result=$mysqli->query($query);
		
		if ($result !== false && $result->num_rows > 0) 
		{
			$row = $result->fetch_assoc();
			$mysqli->close();
			if(hash('sha256', $row['salt'].$password)==$row['password'])
			{
				SESSION_START();
				$_SESSION['logged_in']=true;
				$_SESSION['u_id']=$row['u_id'];
				$_SESSION['first_name']=$row['first_name'];
				header('location:../home.php');
			}
			else 
			{
				header('location:../login.php?error=wrong_password');
			}
		}else{
			$mysqli->close();
			header('location:../login.php?error=wrong_password2');
		}
	}
	else 
	{
		header('location:../login.php?error=empty_fields');
	}
		
?>