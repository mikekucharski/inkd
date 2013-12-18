<?php
	if (isset($_GET['search'])&& !empty($_GET['search']))
	{
		$search= $_GET['search'];
		$u_id= $_SESSION['u_id'];
		//connect to the database
		require_once __dir__ . '/db_connect.php';
		$mysqli = connect();
		
		//sanitize input
		$search = $mysqli->real_escape_string(trim($search));
		$query="SELECT * FROM user where email = '$search'";
		$result = $mysqli->query($query);
		if($result !== false && $result->num_rows > 0)
		{
			
			while($row=$result->fetch_assoc())
			{	
				$query2="SELECT * FROM friend WHERE u_id={$u_id} AND u_idf={$row['u_id']}";
				$result2 = $mysqli->query($query2);
				if($result2 !== false && $result2->num_rows>0)
				{
					$status="friends";
				}
				else
				{
					$status="not friends";
				}
				if($row['u_id'] == $u_id)
				{
					$status="yourself";
				}
				?>
				<div  class="col-lg-6 center"  id="search_result">
					<div class='col-lg-2'>
						<img src="res/default_profile.jpg" /> 
					</div>
					<div class='col-lg-7'>
						<a href="profile.php?u_id=<?=$row['u_id']?>"><p><?=$row['first_name']?> <?=$row['last_name']?></p></a>
						<p><?=$row['email']?></p>
					</div>
					
					
					<div class='col-lg-3'>
					
					<?php if($status === "not friends"):?>
						<a href="scripts/add_friend.php?u_id=<?=$row['u_id']?>&email=<?=$row['email']?>">
							<button type='submit' class='btn btn-primary'>Add Friend</button> 
						</a>
					<?php elseif($status === "friends"):?>
						<a href="scripts/unfriend.php?u_id=<?=$row['u_id']?>&email=<?=$row['email']?>&redirect=search">
							<button type='submit' class='btn btn-success'>Friends</button> 
						</a>
					<?php endif;?>
					</div>
				</div>
				<?php
			}
		}
		else 
		{
			?>
			 <div class="alert alert-danger col-sm-6 center">No Search Results Found for "<?=$_GET['search']?>"</div>
			 <?php
		}
	}
	else 
	{
		?>
		<div class="alert alert-danger col-sm-6 center"><strong>No Search Results Found for "<?=$_GET['search']?>"</div>
		<?php
	}
?>