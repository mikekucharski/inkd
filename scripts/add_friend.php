<?php
	session_start();
	
	if( isset($_GET['u_idf']) && !empty($_GET['u_idf']) )
	{
		$friend_id = $_GET['u_idf'];
		$u_id = $_SESSION['u_id'];
		
		//connect to database
		require_once __dir__ . '/db_connect.php';
		
		$mysqli = connect();
		$query ="INSERT INTO friend(u_id, u_idf) VALUES('$u_id','$friend_id')";
		$result = $mysqli->query($query);
		$mysqli->close();
		$response['success'] = $result;
	}
	else 
	{
		$response['success'] = false;
		$response['error'] = 'empty parameters';
	}
	
	print json_encode($response);
?>