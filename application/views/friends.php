<div class="column container">
	<div class='center col-sm-6 page-header'>
		<h1>Friends (<?= $friends_count?>)</h1>
	</div>
	 
	<?php if($friends === null){ ?>
		<p style='text-align:center;'>No friends yet.</p>
	<?php }else{
		foreach ($friends as $friend) {?>
			<div  class="search_result col-lg-6 center">
				<div class='col-lg-2'>
					<img src="public/img/default_profile.jpg" /> 
				</div>
				<div class='col-lg-8'>
					<a href="profile/<?=$friend['u_id']?>"><p><?=$friend['first_name']?> <?=$friend['last_name']?></p></a>
					<p><?=$friend['email']?></p>
				</div>
				
				<div class='col-lg-2 no-padding'>
					<form class='friend_form' style='display:none'>
						<button type='submit' class='btn btn-primary'>Add Friend</button>
						<label name="u_idf" hidden><?=$friend['u_id']?></label>
					</form>
					
					<form class='unfriend_form' style='display:block'>
						<button type='submit' class='btn btn-success'>Friends</button> 
						<label name="u_idf" hidden><?=$friend['u_id']?></label>
					</form>
				</div>
			</div>
	<?php }
	}?>
	
</div><!-- /column -->