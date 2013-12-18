<?php
	include('format_date.php');

	$u_id = $_SESSION['u_id'];

	//connect to database
	require_once __DIR__ . '/db_connect.php';
	$mysqli = connect();

	$query = "(SELECT * FROM post WHERE u_id IN (SELECT u_idf FROM friend WHERE u_id='$u_id'))
			   UNION 
		      (SELECT * From post WHERE u_id='$u_id') 
			   ORDER BY post_time DESC";
	$result=$mysqli->query($query);

	if ($result !== false && $result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc())
		{
			$p_id = $row['p_id'];
			$u_id = $row['u_id'];
			$msg = $row['message'];
			$time = format_date($row['post_time']);
			//sanitize output
			$msg = htmlentities($msg);
			
			$query2 = "SELECT * FROM user WHERE u_id=$u_id";
			$result2=$mysqli->query($query2);
			if($result2 !== false && $result->num_rows > 0)
			{
				$row = $result2->fetch_assoc();
				$first = $row['first_name'];
				$last = $row['last_name']; 
			}else
			{
				header('location:../404.php');
			}
			
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
						<span><?= $first ?> <?= $last ?></span>
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
	{?>
		<!--Ink Div-->
		<div id='ink'>
			<p style='text-align:center;'>No posts yet</p>
		</div>
	<?php
	}// end else if

?>