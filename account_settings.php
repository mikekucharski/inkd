<?php include('includes/is_logged_in.php'); ?>

<html>
<head>
	
	<?php include('includes/head.php'); ?>
	<title>Account Settings</title>
<head>

<body>
	
	<div id="wrap">
		<?php include('includes/header.php'); ?>
		
		<div id="main">
			<div id="column" class="container">
				<div class='center span8 page-header'>
					<h1>Account Settings</h1>
				</div>
				
				<?php include('scripts/get_account_settings.php'); ?>
				
				<?php
					if(isset($_GET['updated']) && !Empty($_GET['updated']))
					{
						$updated = $_GET['updated'];
						$type="settings have";
						if($updated == 1)
						{
							$type="profile settings have";
						}else if($updated == 2)
						{
							$type="password has";
						}
						print "
							<div id='alert' class='alert alert-success'>
								<p><b>Success!</b> Your $type been updated.</p>
							</div>
						";
					}
					else if(isset($_GET['error']) && !empty($_GET['error']))
					{
						$error = $_GET['error'];
						$msg = "";
						if($error == 'empty_fields')
						{
							$msg= "<b>OOPS!</b> Must fill out all of the fields.";
						}else if($error == 'wrong_current_password')
						{
							$msg= "<b>OOPS!</b> Incorrect current password.";
						}else if($error == 'pass_match')
						{
							$msg= "<b>OOPS!</b> New passwords must match.";
						}else if($error == 'pass_short')
						{
							$msg= "<b>OOPS!</b> New password must be 6 or more characters.";
						}else
						{
							$msg= "<b>OOPS!</b> Something has gone wrong. Your profile settings were not updated.";
						}
						
						print "
							<div id='alert' class='alert alert-error'>
								<p>$msg </p>
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
