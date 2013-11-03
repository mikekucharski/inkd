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

					<div id="panel" class="span4">
					
						<!--Sidebar content-->
						<ul>
						  <li class="span7">
							<a class="thumbnail" data-toggle="lightbox" href="#demoLightbox">
							  <img src="res/mike.jpg" alt="">
							</a>
						  </li>

						</ul>

					</div> <!-- End leftbar -->
					
					<div  class="span7">
						<?php include("scripts/get_profile_posts.php"); ?>
					</div>
					
					
				</div>
			</div>
		</div><!-- /main -->
	</div><!--/wrap -->


	<div id="footer">

	</div>
</body>
	
</html>
