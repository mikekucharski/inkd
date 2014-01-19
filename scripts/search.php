<?php
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
				$f_status="none";
				$uf_status="block";
			}
			else
			{
				$f_status="block";
				$uf_status="none";
				
			}
			if($row['u_id'] == $u_id)
			{
				$f_status="none";
				$uf_status="none";
			}
			?>
			<div  class="col-lg-6 center"  id="search_result">
				<div class='col-lg-2'>
					<img src="res/default_profile.jpg" /> 
				</div>
				<div class='col-lg-7'>
					<a href="index.php?page=profile&u_id=<?=$row['u_id']?>"><p><?=$row['first_name']?> <?=$row['last_name']?></p></a>
					<p><?=$row['email']?></p>
				</div>
				
				
				<div class='col-lg-3 no-padding'>
					<form id='friend_form' class='friend_form' style='display:<?=$f_status?>'>
						<button type='submit' class='btn btn-primary'>Add Friend</button>
						<label name="u_idf" hidden><?=$row['u_id']?></label>
					</form>
					
					<form id="unfriend_form" class='unfriend_form' style='display:<?=$uf_status?>'>
						<button type='submit' class='btn btn-success'>Friends</button> 
						<label name="u_idf" hidden><?=$row['u_id']?></label>
					</form>
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

?>