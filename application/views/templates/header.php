<html>
<head>
	<link href='http://fonts.googleapis.com/css?family=Raleway:300' rel='stylesheet' type='text/css'>
	<base href="http://inkd.com/" />
	<!-- Bootstrap CSS-->
	<link href="public/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">

	<!-- Bootstrap JS-->
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="public/bootstrap/js/bootstrap.min.js"></script>
	
	<!-- jQuery UI -->
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	
	<link rel="stylesheet" type="text/css" href="public/css/main.css">
	<script src="public/js/helpers.js"></script>
	<script src="public/js/eventlisteners.js"></script>
	<title><?=$title?></title>
<head>
<body>
<div id="wrap">
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php?page=home">Ink'd</a>
			</div><!-- end navbar-header -->
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li <?php active_tab('home')?> ><a href="home"><i class="glyphicon glyphicon-home"></i> Home</a></li>
					<li <?php active_tab('profile')?> ><a href="profile/<?=$_SESSION['u_id'];?>" ><i class="glyphicon glyphicon-user"></i> Profile</a></li>
					<li <?php active_tab('friends')?> ><a href="index.php?page=friends"><i class="glyphicon glyphicon-globe"></i> Friends</a></li>
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-wrench"></i> Settings<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="index.php?page=profile_settings">Profile Settings</a></li>
						<li><a href="accountsettings">Account Settings</a></li>
					</ul>
					</li>
					<li><a href="login/logout"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
				</ul>
				<!-- search bar form -->
				<form class="navbar-form navbar-right" method="get" action="index.php?page=search_results">
					<div class="form-group">
						<input name="search" id="nav_search_bar" type="text" class="form-control search-query" placeholder="Search" data-provide="typeahead" autocomplete="off">
						<input hidden name="page" type='text' value='search_results'/>
					</div>
					<button type="submit" class="btn btn-success">Search</button>
				</form>
			</div><!--/.nav-collapse -->
		</div><!-- end container -->
	</div> <!-- end navbar -->
	<div id="main">