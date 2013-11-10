<?php
	
	error_reporting(0);
	
	if(isset($_GET['u_id']) &&!empty($_GET['u_id']))
	{
		$u_id = $_GET['u_id'];
		
		//connect to database
		require_once __DIR__ . '/db_connect.php';
		$mysqli = connect();
		
		$query = "SELECT * FROM post WHERE u_id='$u_id' ORDER BY post_time DESC";
		$result=$mysqli->query($query);
		
		if ($result !== false && $result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc())
			{
				$p_id = $row['p_id'];
				$u_id = $row['u_id'];
				$msg = $row['message'];
				$time = $row['post_time'];
				
				//sanitize output
				$msg = htmlentities($msg);
				
				print "
					<!--Ink Div-->
					<div id='ink'>
						<!-- Profile Image -->
						<div id='prof_img'>
							<img src='res/default_profile.jpg' alt='empty'/>
						</div>

						<!-- Ink Header -->
						<div id='ink_header'>
							<div id='header_left'>
								<span>Mike Kucharski</span>
							</div>
							<div id='header_right'>
								<span>{$time}</span>
							</div>
						</div>
						
						<!-- Ink Post -->
						<div id='ink_post'>
							<p>{$msg}</p>
						</div>
						
						<!-- Ink Options -->
						<div id='ink_options'>
							<a href='#'><span class='label-danger label'><i class='glyphicon glyphicon-heart white'></i></span> Like</a>
							<a href='#'><span class='label-primary label'><i class='glyphicon glyphicon-tint white'></i></span> Re-Ink</a>
							<a href='#'><span class='label-success label'><i class='glyphicon glyphicon-comment white'></i></span> Comment</a>
						</div>
					</div>
				";
				$mysqli->close();
			} // endwhile
			$mysqli->close();
		}// end if
	}else
	{
		header('location:404.php');
	}
	
?>