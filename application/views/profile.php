<div class="container">
	<div class="row">
		<div class="column col-lg-4">
			<!--Sidebar content-->
			<!-- scripts/get_profile_info.php -->
			<img class='prof-img' src='public/img/default_profile.jpg'/>
			<h2 class='display_name'><?=$p_info['first_name']; ?> <?=$p_info['last_name']; ?></h2>

			<div class='col-lg-3 no-padding'>
				<form class='friend_form' style='display:<?=$f_button?>'>
					<button type='submit' class='btn btn-primary'>Add Friend</button>
					<label name="u_idf" hidden><?= $_GET["u_id"]; ?></label>
				</form>
				
				<form class='unfriend_form' style='display:<?=$uf_button?>'>
					<button type='submit' class='btn btn-success'>Friends</button> 
					<label name="u_idf" hidden><?= $_GET["u_id"]; ?></label>
				</form>
			</div>
			
			<div class='prof-info clear col-lg-12'>
				<div class='page-header'></div>
				<p><span class='heading'>Hometown: </span><?=$p_info['hometown']; ?></p>
				<p><span class='heading'>Current Location: </span><?=$p_info['location']; ?></p>
				<p><span class='heading'>School: </span><?=$p_info['school']; ?></p>
				<p><span class='heading'>Workplace: </span><?=$p_info['workplace']; ?></p>
				<p><span class='heading'>Birthday: </span><?=$p_info['birthday']; ?></p>
				<p><span class='heading'>Description: </span><?=$p_info['description']; ?></p>
			</div>
		</div> <!-- End leftbar -->
		
		<div  class="col-lg-8">
			<?php if($profile_posts === null){ ?>
					<div id='ink'>
						<p style='text-align:center;'>No posts yet</p>
					</div>
				<?php }else{
					foreach ($profile_posts as $post) {?>
						<!--Ink Div-->
						<div id='ink'>
							<!-- Profile Image -->
							<div class='post-img-container'>
								<img class='post-img' src='public/img/default_profile.jpg' alt='empty'/>
							</div>

							<!-- Ink Header -->
							<div id='ink_header'>
								<div id='header_left'>
									<span><a href="profile/<?= $_GET["u_id"]; ?>"><?php print htmlentities($post['first_name']);?> <?php print htmlentities($post['last_name']);?></a></span>
								</div>
								<div id='header_right'>
									<span><?php print format_date($post['post_time']);?></span>
								</div>
							</div>
							
							<!-- Ink Post -->
							<div id='ink_post'>
								<p><?php print htmlentities($post['message']);?></p>
							</div>
							
							<!-- Ink Options -->
							<div id='ink_options'>
								<a href='#'><span class='label-danger label'><i class='glyphicon glyphicon-heart white'></i></span> Like</a>
								<a href='#'><span class='label-primary label'><i class='glyphicon glyphicon-tint white'></i></span> Re-Ink</a>
								<a href='#'><span class='label-success label'><i class='glyphicon glyphicon-comment white'></i></span> Comment</a>
							</div>
						</div>
					<?php }
				}?>
		</div> <!-- End rightbar -->
		
	</div>
</div><!-- end container -->