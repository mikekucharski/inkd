<?php
	$s_id = $_SESSION['u_id'];
		
	//connect to database
	require_once __DIR__ . '/db_connect.php';
	$mysqli = connect();
	
	$query = "SELECT * FROM user WHERE u_id='$u_id'";
	$result=$mysqli->query($query);
	
	if($result !== false && $result->num_rows > 0)
	{
		$row = $result->fetch_assoc();
		$first = $row['first_name'];
		$last = $row['last_name'];

		$query2 = "SELECT * FROM user_info WHERE u_id='$u_id'";
		$result2=$mysqli->query($query2);
		if($result2 !== false && $result2->num_rows > 0)
		{
			$row2 = $result2->fetch_assoc();
			$hometown = $row2['hometown'];
			$location = $row2['location'];
			$school = $row2['school'];
			$workplace = $row2['workplace'];
			$birthday = $row2['birthday'];
			$description = $row2['description'];
			
			?>
				<img class='prof_img' src='res/default_profile.jpg'/>
					<h2 class='display_name' ><?=$first?> <?=$last?></h2>
			<?php
			if($s_id != $u_id)
			{
				// **********************************************************************/
				$query3="SELECT * FROM friend WHERE u_id={$s_id} AND u_idf={$u_id}";
				$result3 = $mysqli->query($query3);
				if($result3 !== false && $result3->num_rows>0):?>
					<a href="scripts/unfriend.php?u_id=<?=$u_id?>&redirect=profile">
						<button type='submit' class='btn btn-success'>Friends</button> 
					</a>
				<?php else: ?>
					<a href="scripts/add_friend.php?u_id=<?=$row['u_id']?>&redirect=profile">
						<button type='submit' class='btn btn-primary'>Add Friend</button> 
					</a>
				<?php endif;
				// **********************************************************************/
			}
			?>
				<div class='prof-info clear col-lg-12'>
						<div class='page-header'></div>
						<p><span class='heading'>Hometown: </span><?=$hometown?></p>
						<p><span class='heading'>Current Location: </span><?=$location?></p>
						<p><span class='heading'>School: </span><?=$school?></p>
						<p><span class='heading'>Workplace: </span><?=$workplace?></p>
						<p><span class='heading'>Birthday: </span><?=$birthday?></p>
						<p><span class='heading'>Description: </span><?=$description?></p>
					</div>
			<?php
			$mysqli->close();
		}else{
			$mysqli->close();
			//header("Location: http://".$_SERVER['HTTP_HOST']."/workstudy/html/error");
			header('location: index.php?page=404');
			exit;
		}
	}else{
		$mysqli->close();
		header('location: index.php?page=404');
		//header("Location: http://".$_SERVER['HTTP_HOST']."/workstudy/html/error");
		exit;
	}
?>