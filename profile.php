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
			<div class="container-fluid">
				<div class="row-fluid">

					<div id="column" class="span4">
					
						<!--Sidebar content-->
						<h1>Mike Kucharski</h1>
						<img src="res/default_profile.jpg"/>
						<button type="button" class="btn btn-primary">Add Friend</button>
						<div class='page-header'></div>
						<p>Hometown:</p>
						<p>East Haven</p>
						<p>Current Location:</p>
						<p>School:</p>
						<p>Workplace:</p>
						<p>Birthday</p>
						<p>Description</p>
						
					</div> <!-- End leftbar -->
					
					<div  class="span7">
						<?php include("scripts/get_profile_posts.php"); ?>
					</div> <!-- End rightbar -->
					
				</div>
			</div>
		</div><!-- /main -->
	</div><!--/wrap -->


	<div id="footer">

	</div>
</body>
	
</html>
