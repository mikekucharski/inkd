<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="home.php">Ink'd</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="home.php"><i class="glyphicon glyphicon-home"></i> Home</a></li>
			  <li><a href="profile.php?u_id=<?php print $_SESSION['u_id'];?>" ><i class="glyphicon glyphicon-user"></i> Profile</a></li>
			  <li><a data-toggle="tab" href="#"><i class="glyphicon glyphicon-globe"></i> Friends</a></li>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-wrench"></i> Settings<b class="caret"></b></a>
				<ul class="dropdown-menu">
				  <li><a href="profile_settings.php">Profile Settings</a></li>
				  <li><a href="account_settings.php">Account Settings</a></li>
				</ul>
			  </li>
			  <li><a href="scripts/logout.php"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
          </ul>
		  <form class="navbar-form navbar-right" method="get" action="search_results.php">
			 <div class="form-group">
				<input name="search" id="nav_search_bar" type="text" class="form-control search-query" placeholder="Search" data-provide="typeahead" autocomplete="off">
			</div>
			<button type="submit" class="btn btn-success">Search</button>
		  </form>
		  
        </div><!--/.nav-collapse -->
      </div>
    </div>