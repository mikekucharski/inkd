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
				<img class='prof-img' src='public/img/default_profile.jpg'/>
				<h2 class='display_name' ><?=$first?> <?=$last?></h2>
			<?php
			
			$query3="SELECT * FROM friend WHERE u_id={$s_id} AND u_idf={$u_id}";
			$result3 = $mysqli->query($query3);
			if($result3 !== false && $result3->num_rows>0)
			{
				$f_status="none";
				$uf_status="block";
			}
			else
			{
				$f_status="block";
				$uf_status="none";
				
			}
			if($s_id == $u_id)
			{
				$f_status="none";
				$uf_status="none";
			}
			
			?>
				<div class='col-lg-3 no-padding'>
					<form id='friend_form' class='friend_form' style='display:<?=$f_status?>'>
						<button type='submit' class='btn btn-primary'>Add Friend</button>
						<label name="u_idf" hidden><?=$u_id ?></label>
					</form>
					
					<form id="unfriend_form" class='unfriend_form' style='display:<?=$uf_status?>'>
						<button type='submit' class='btn btn-success'>Friends</button> 
						<label name="u_idf" hidden><?=$u_id ?></label>
					</form>
				</div>
				
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
			header('location: index.php?page=404');
			exit();
		}
	}else{
		$mysqli->close();
		header('location: index.php?page=404');
		exit();
	}
?>