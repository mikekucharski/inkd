<?php

session_start();

if (isset($_POST['current_password']) && !empty($_POST['current_password']) &&
   (isset($_POST['password1']) && !empty($_POST['password1'])) &&
   (isset($_POST['password2']) && !empty($_POST['password2'])))
{
	$current_password=$_POST['current_password'];
	$password1=$_POST['password1'];
	$password2=$_POST['password2'];
	
	if(($password1 != $password2) || (strlen($password1) < 6))
	{
		$response['success'] = false;
		print json_encode($response);
		exit();
	}
	$u_id=$_SESSION['u_id'];
	//connect to database
	require_once __DIR__ .'/db_connect.php';
	$mysqli = connect();
	
	$current_password = $mysqli->real_escape_string(trim($current_password));
	$password1 = $mysqli->real_escape_string(trim($password1));
	$password2 = $mysqli->real_escape_string(trim($password2));
	
	$query ="SELECT * FROM user WHERE u_id='$u_id'";
	$result=$mysqli->query($query);
	
	if ($result !== false && $result->num_rows > 0) 
	{
		$row = $result->fetch_assoc();
		if(hash('sha256', $row['salt'].$current_password)==$row['password'])
		{
			$new_password = hash('sha256', $row['salt'].$password1);
			$query2= "UPDATE user SET password='$new_password'";
			$result2=$mysqli->query($query2);
			
			$response['success'] = $result2;
		}
		else 
		{
			$response['success'] = false;
			$response['Error_Type'] = "Wrong Current Password";
		}
	}else
	{
		$response['success'] = $result;
		$response['Error_Type'] = "Query Fail";
	}
	$mysqli->close();
	
}
else
{
	$response['success'] = false;
	$response['Error_Type'] = "Empty Fields";
}

print json_encode($response);

?>