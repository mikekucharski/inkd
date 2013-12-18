<?php include('includes/is_logged_in.php'); ?>

<html>
<head>
	
	<?php include('includes/head.php'); ?>
	<title>Home</title>
<head>

<body>
	
	<div id="wrap">
		<?php include('includes/header.php'); ?>
		
		<div id="main">
			<div class="container">
				<div class="row">
					<div id="column" class="col-lg-4">
						<!--Sidebar content-->

					</div> <!-- End leftbar -->
					
					<div  class="col-lg-7">

						<!--Body content-->
						<div id="ink_spill">
							<form method='POST' action='scripts/create_post.php' >
								<textarea class='form-control' type="textarea" name='post' placeholder="Spill some ink"></textarea>
								<input class='btn btn-primary' type='submit' name="ink" value="Post Ink"/>
							</form>
						</div>
						
						<!-- pull all posts -->
						<?php include('scripts/get_all_posts.php'); ?>
					</div>
					
					
				</div>
			</div>
		</div><!-- /main -->
	</div><!--/wrap -->


	<div id="footer">

	</div>
</body>
	
</html>
