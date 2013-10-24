<?php include('includes/is_logged_in.php'); ?>

<html>
<head>
	
	<?php include('includes/head.php'); ?>
	<title>Profile Settings</title>
<head>

<body>
	
	<div id="wrap">
		<?php include('includes/header.php'); ?>
		
		<div id="main">
			<div id="column" class="container">
				<h1>Profile Settings</h1>
				
				<?php include('scripts/get_profile_settings.php'); ?>
				
				<?php
					if(isset($_GET['updated']) && !Empty($_GET['updated']))
					{
						$updated = $_GET['updated'];
						if($updated == 1)
						{
							print "
								<div id='alert' class='alert alert-success'>
									<p><b>Success!</b> Your profile settings have been updated.</p>
								</div>
							";
						}
					}
					
					else if(isset($_GET['error']) && !Empty($_GET['error']))
					{
						$error = $_GET['error'];
						print "
							<div id='alert' class='alert alert-error'>
								<p><b>OOPS!</b> Something has gone wrong. Your profile settings were not updated.</p>
							</div>
						";
					}
				?>
			</div><!-- /column -->
		</div><!-- /main -->
	</div><!--/wrap -->


	<div id="footer">

	</div>
</body>
	
</html>
