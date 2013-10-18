<?php

	if ( (isset($_POST['email']) && !empty($_POST['email'])) &&
		 (isset($_POST['pass']) && !empty($_POST['pass'])))
	{
		
		$email=$_POST['email'];
		$password =$_POST['pass'];
		
		require_once __DIR__ .'/db_connect.php';
		$db = new DB_CONNECT();
		
		$query ="SELECT * FROM user WHERE email='$email'";
		$result=mysql_query($query);
		
		if (!empty($result) &&	mysql_num_rows($result) > 0) 
		{
			$row = mysql_fetch_array($result);
		
			if($password==$row['password'])
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
			header('location:../login.php?error=wrong_password2');
		}
	}
	else 
	{
		header('location:../login.php?error=empty_fields');
	}
		
?>