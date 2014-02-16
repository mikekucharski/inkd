<div class="container">
	<div class="row">
		<div class="column col-lg-4">
			<img id='home_img' src='../public/img/default_profile.jpg' alt='empty'/>
			<h2 class='display_name' >Temp Name</h2>
			<div class='prof-info clear col-lg-12'>
				<div class='page-header'></div>
			</div>
		</div>
		<div class="col-lg-7">

			<!--Body content-->
			<div id="ink_spill">
				<form id='create_post_form' >
					<textarea class='form-control' type="textarea" name='ink-msg' placeholder="Spill some ink"></textarea>
					<input class='btn btn-primary' type='submit' name="ink" value="Post Ink"/>
				</form>
			</div>
			
			<!-- pull all posts -->
			<div id='ink_post_container'>
				<?php include('scripts/get_all_posts.php'); ?>
			</div>
		</div>
	</div>
</div>