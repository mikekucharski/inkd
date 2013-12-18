<?php include('includes/is_logged_in.php'); ?>

<html>
<head>
	
	<?php include('includes/head.php'); ?>
	<title>Friends</title>
<head>

<body>
	
	<div id="wrap">
		<?php include('includes/header.php'); ?>
		
		<div id="main">
			<div id="column" class="container">
				<div class='center col-sm-6 page-header'>
					<h1>Your Friends</h1>
				</div>
				 
				<?php include('scripts/get_friends.php'); ?>
				
			</div><!-- /column -->
		</div><!-- /main -->
	</div><!--/wrap -->


	<div id="footer">

	</div>
</body>
	
</html>
