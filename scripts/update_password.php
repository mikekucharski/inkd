<?php

	session_start();
	
	if (isset($_POST['current_password']) && !empty($_POST['current_password']) &&
	   (isset($_POST['password1']) && !empty($_POST['password1'])) &&
	   (isset($_POST['password2']) && !empty($_POST['password2'])))
	{
		$current_password=$_POST['current_password'];
		$password1=$_POST['password1'];
		$password2=$_POST['password2'];
		
		if($password1 != $password2)
		{
			header('location:../account_settings.php?error=pass_match');
			exit();
		}else if(strlen($password1) < 6)
		{
			header('location:../account_settings.php?error=pass_short');
			exit();
		}
		
		$u_id=$_SESSION['u_id'];
		//connect to database
		require_once __DIR__ .'/db_connect.php';
		$db = new DB_CONNECT();
		
		$query ="SELECT * FROM user WHERE u_id='$u_id'";
		$result=mysql_query($query);
		
		if (!empty($result) &&	mysql_num_rows($result) > 0) 
		{
			$row = mysql_fetch_array($result);
			if(hash('sha256', $row['salt'].$current_password)==$row['password'])
			{
				$new_password = hash('sha256', $row['salt'].$password1);
				$query2= "UPDATE user SET password='$new_password'";
				$result2=mysql_query($query2);
				if($result2)
				{
					header('location:../account_settings.php?updated=2');
				}
				else
				{
					header('location:../account_settings.php?error=query_fail');
				}
			}
			else 
			{
				header('location:../account_settings.php?error=wrong_current_password');
			}
		}else
		{
			header('location:../account_settings.php?error=query_fail');
		}
		
	}
	else
	{
		header('location:../account_settings.php?error=empty_fields');
	}

?>