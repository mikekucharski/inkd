<?php
	require_once('../includes/helpers.php');
	session_start();
	
	
	if (isset($_POST['ink-msg']) && !empty($_POST['ink-msg']))
	{
		$post_msg =$_POST['ink-msg'];
		$u_id=$_SESSION['u_id'];
		date_default_timezone_set('America/New_York');
		$post_time= date('Y-m-d H:i:s');
		$repost_id=-1;

		//Connect To Database
		require_once __dir__ . '/db_connect.php';
		$mysqli = connect();
		
		//sanitize input
		$post_msg = $mysqli->real_escape_string(trim($post_msg));
		
		$query ="INSERT INTO post(u_id, repost_id, message, post_time) VALUES('$u_id', '$repost_id', '$post_msg', '$post_time')";
		$result=$mysqli->query($query);
		
		if($result !== false)
		{
			$query2 = "SELECT * FROM user WHERE u_id=$u_id";
			$result2=$mysqli->query($query2);
			if($result2 !== false && $result2->num_rows > 0)
			{
				$row = $result2->fetch_assoc();
				$first = $row['first_name'];
				$last = $row['last_name']; 
			}else
			{
				$response['success'] = false;
				print json_encode($response);
				exit();
			}
		}else
		{
			$response['success'] = false;
			print json_encode($response);
			exit();
		}
		
		
		$mysqli->close();
		
		$response = array('success' => $result, 'u_id' => $u_id, 'first_name' => $first, 'last_name' => $last,
						  'post_time' => format_date($post_time), 'post_msg' => htmlentities($post_msg));
		print json_encode($response);
	}
	else 
	{
		$response['success'] = false;
		print json_encode($response);
	}
?>