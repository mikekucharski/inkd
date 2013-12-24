<?php
	session_start();
	if(isset($_GET['u_id']) && !empty($_GET['u_id']) &&
	  isset($_GET['redirect']) && !empty($_GET['redirect']))
	{
		// ************ isset($_GET['email']) && !empty($_GET['email'])
		$friend_id = $_GET['u_id'];
		$u_id = $_SESSION['u_id'];
		$redirect = $_GET['redirect'];
		
		//conncet to database
		require_once __dir__ . '/db_connect.php';
		
		$mysqli = connect();
		$query ="DELETE FROM friend WHERE u_id=$u_id AND u_idf=$friend_id";
		$result = $mysqli->query($query);
		$mysqli->close();
		
		// DELETED FRIENDSHIP, NOW REDIRECT
		// apparently this isnt needed
		if($redirect === 'search' && isset($_GET['email']) && !empty($_GET['email']))
		{
			$search = $_GET['email'];
			$path = '?search=$search&query=success';
		}else if($redirect === 'friends')
		{
			$path = '?query=success';
		}else if($redirect === 'profile')
		{
			$path = '?u_id=$u_id&query=success';
		}
		
		
		if($result === false)
		{
			header("location:../search_results.php?search=$search&query=fail");
		}
		
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	else 
	{
		header("location:../404.php");
	}
?>