<div id="column" class="container">
	<div class='center col-sm-6 page-header'>
		<h1>Profile Settings</h1>
	</div>
	
	<?php include('../scripts/get_profile_settings.php'); ?>
	
	<div id='response'>
	
	</div>
	
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