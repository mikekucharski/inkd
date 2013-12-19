<?php
	include('format_date.php');
	
	if(isset($_GET['u_id']) &&!empty($_GET['u_id']))
	{
		$u_id = $_GET['u_id'];
		
		//connect to database
		require_once __DIR__ . '/db_connect.php';
		$mysqli = connect();
		
		// get user info
		$query2 = "SELECT * FROM user WHERE u_id=$u_id";
		$result2 = $mysqli->query($query2);
		if($result2 !== false && $result2->num_rows > 0)
		{
			$row2 = $result2->fetch_assoc();
			$first_name = $row2['first_name'];
			$last_name = $row2['last_name'];
		}else
		{
			header('location:../404.php');
		}
		
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
				$time = format_date($time);
				//sanitize output
				$msg = htmlentities($msg);
				
				
				?>
					<!--Ink Div-->
					<div id='ink'>
						<!-- Profile Image -->
						<div id='prof_img'>
							<img src='res/default_profile.jpg' alt='empty'/>
						</div>

						<!-- Ink Header -->
						<div id='ink_header'>
							<div id='header_left'>
								<span><a href="profile.php?u_id=<?=$u_id ?>"><p><?=$first_name?> <?=$last_name?></p></a></span>
							</div>
							<div id='header_right'>
								<span><?=$time?></span>
							</div>
						</div>
						
						<!-- Ink Post -->
						<div id='ink_post'>
							<p><?=$msg?></p>
						</div>
						
						<!-- Ink Options -->
						<div id='ink_options'>
							<a href='#'><span class='label-danger label'><i class='glyphicon glyphicon-heart white'></i></span> Like</a>
							<a href='#'><span class='label-primary label'><i class='glyphicon glyphicon-tint white'></i></span> Re-Ink</a>
							<a href='#'><span class='label-success label'><i class='glyphicon glyphicon-comment white'></i></span> Comment</a>
						</div>
					</div>
				<?php
			} // endwhile
			$mysqli->close();
		}else
		{
			?>
				<!--Ink Div-->
				<div id='ink'>
					<p style='text-align:center;'>No posts yet</p>
				</div>
			<?php
		}// end else if
	}else
	{
		header('location:../404.php');
	}
?>