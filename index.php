<?php 

require_once('includes/helpers.php');

//determine which page to render
if( isset($_GET['page']))
	$page = $_GET['page'];
else
	$page = 'home';
	
// show page
switch($page)
{		
	case 'home':
		render('templates/header', array('title' => 'Home'));
		render('home');
		render('templates/footer');
		break;
		
	case 'profile':
		if(isset($_GET['u_id']))
		{
			render('templates/header', array('title' => 'Profile'));
			render('profile', array('u_id' => $_GET['u_id']));
			render('templates/footer');
		}
		break;
		
	case 'profile_settings':
		render('templates/header', array('title' => 'Profile Settings'));
		render('profile_settings');
		render('templates/footer');
		break;
		
	case 'account_settings':
		include("scripts/get_account_settings.php");
		render('templates/header', array('title' => 'Account Settings'));
		render('account_settings', array('last_name' => $last_name))
		render('templates/footer');
		break;
		
	case 'friends':
		render('templates/header', array('title' => 'Your Friends'));
		render('friends');
		render('templates/footer');
		break;
		
	case 'search_results':
		if(isset($_GET['search']))
		{
			render('templates/header', array('title' => 'Find Friends'));
			render('search_results', array('search' => $_GET['search']));
			render('templates/footer');
		}
		break;
		
	case '404':
		render('templates/header', array('title' => '404'));
		render('404');
		render('templates/footer');
		break;
		
	default:
		render('templates/header', array('title' => '404'));
		render('404');
		render('templates/footer');
		break;
}

?>