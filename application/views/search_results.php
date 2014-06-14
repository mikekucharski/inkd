<div class="column container">
	<div class='center col-sm-6 page-header'>
		<h1>Search Results</h1>
	</div>
	 
	<?php if($all_results === null){ ?>
		 <div class="alert alert-danger col-sm-6 center">No Search Results Found for "<?=$_GET['search']?>"</div>
	<?php }else{
		foreach ($all_results as $user) {
			if($user['friends'])
			{
				$f_status="none";
				$uf_status="block";
			}
			else
			{
				$f_status="block";
				$uf_status="none";
				
			}
			if(Session::get('u_id') == $user['u_id'])
			{
				$f_status="none";
				$uf_status="none";
			}
			?>
			<div class="col-lg-6 center search_result">
				<div class='col-lg-2'>
					<img src="public/img/default_profile.jpg" /> 
				</div>
				<div class='col-lg-7'>
					<a href="profile/<?=$user['u_id']?>"><p><?=$user['first_name']?> <?=$user['last_name']?></p></a>
					<p><?=$user['email']?></p>
				</div>
				
				
				<div class='col-lg-3 no-padding'>
					<form class='friend_form' style='display:<?=$f_status?>'>
						<button type='submit' class='btn btn-primary'>Add Friend</button>
						<label name="u_idf" hidden><?=$user['u_id']?></label>
					</form>
					
					<form class='unfriend_form' style='display:<?=$uf_status?>'>
						<button type='submit' class='btn btn-success'>Friends</button> 
						<label name="u_idf" hidden><?=$user['u_id']?></label>
					</form>
				</div>
			</div>
			<?php } 
		} ?>
	
</div><!-- /column -->