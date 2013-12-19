<?php
	session_start();
	if(isset($_GET['u_id']) && !empty($_GET['u_id']) &&
	   isset($_GET['redirect']) && !empty($_GET['redirect']))
	{
		$friend_id = $_GET['u_id'];
		$u_id = $_SESSION['u_id'];
		$redirect = $_GET['redirect'];
		
		//connect to database
		require_once __dir__ . '/db_connect.php';
		
		$mysqli = connect();
		$query ="INSERT INTO friend(u_id, u_idf) VALUES('$u_id','$friend_id')";
		$result = $mysqli->query($query);
		$mysqli->close();
		if($result === false)
		{
			header("location:../404.php?search=$search&query=fail");
		}
		
		if($redirect === 'profile')
		{
			$path = "?u_id=$friend_id&query=success";
		}else if($redirect === 'search' && isset($_GET['email']) && !empty($_GET['email']))
		{
			$path = "?search=$search&query=success";
		}else if($redirect === 'friends')
		{
			$path = "?query=success";
		}
		
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	else 
	{
		header("location:../search_results.php?search=$search&error=empty_fields");
	}
?>