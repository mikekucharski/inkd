<div class="container">
	<div class="row">
		<div class="column col-md-4">
			<img id='home_img' src='../public/img/default_profile.jpg' alt='empty'/>
			<h2 class='display_name' >Temp Name</h2>
			<div class='prof-info clear col-lg-12'>
				<div class='page-header'></div>
			</div>
		</div>
		<div class="col-md-8">

			<!--Body content-->
			<div id="ink_spill">
				<form id='create_post_form' >
					<textarea class='form-control' type="textarea" name='ink-msg' placeholder="Spill some ink"></textarea>
					<input class='btn btn-primary' type='submit' name="ink" value="Post Ink"/>
				</form>
			</div>
			
			<!-- pull all posts -->
			<div id='ink_post_container'>
				
				<?php if($all_posts === null){ ?>
					<div id='ink'>
						<p style='text-align:center;'>No posts yet</p>
					</div>
				<?php }else{
					foreach ($all_posts as $post) {?>
						<!--Ink Div-->
						<div id='ink'>
							<!-- Profile Image -->
							<div class='post-img-container'>
								<img class='post-img' src='public/img/default_profile.jpg' alt='empty'/>
							</div>

							<!-- Ink Header -->
							<div id='ink_header'>
								<div id='header_left'>
									<span><a href="profile/<?= $post['u_id']?>"><?php print htmlentities($post['first_name']);?> <?php print htmlentities($post['last_name']);?></a></span>
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
			</div> <!-- end ink_post_container -->
		</div> <!-- end .col-md-8 -->
	</div> <!-- end .row-->
</div> <!-- end .container -->


<!--Sanitize input  $msg = htmlentities($msg);       $time = format_date($post['post_time']);-->

<!--Ink Div-->
<!-- <div id='ink'>
<p style='text-align:center;'>No posts yet</p>
</div> -->