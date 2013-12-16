<?php
	if (isset($_GET['search'])&& !empty($_GET['search']))
	{
		$search= $_GET['search'];
		
		//connect to the database
		require_once __dir__ . '/db_connect.php';
		$mysqli = connect();
		
		//sanitize input
		$search = $mysqli->real_escape_string(trim($search));
		$query="SELECT first_name FROM user where first_name = '$search'";
		$result = $mysqli->query($query);
		if($result !== false && $result->num_rows > 0)
		{
			while($row=$result->fetch_assoc())
			{
				print $row['first_name'];
			}
		}
		else 
		{
			print "No Results Found/ Query Fail";
		}
	}
?>