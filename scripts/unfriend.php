<?php
	session_start();
	if(isset($_GET['u_id']) && !empty($_GET['u_id']) &&
	   isset($_GET['email']) && !empty($_GET['email']))
	{
		$friend_id = $_GET['u_id'];
		$u_id = $_SESSION['u_id'];
		$search = $_GET['email'];
		
		//conncet to database
		require_once __dir__ . '/db_connect.php';
		
		$mysqli = connect();
		$query ="DELETE FROM friend WHERE u_id=$u_id AND u_idf=$friend_id";
		$result = $mysqli->query($query);
		$mysqli->close();
		if($result!== false)
		{
			header("location:../search_results.php?search=$search&query=success");
		}
		else
		{
			header("location:../search_results.php?search=$search&query=fail");

		}
	}
	else 
	{
		header("location:../search_results.php?search=$search&error=empty_fields");
	}
?>