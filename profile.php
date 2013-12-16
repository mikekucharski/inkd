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
						<?php include("scripts/get_profile_info.php"); ?>
					</div> <!-- End leftbar -->
					
					<div  class="col-lg-7">
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
