<div id="column" class="container">
	<div class='center col-sm-6 page-header'>
		<h1>Account Settings</h1>
	</div>
	
	<?php include('../scripts/get_account_settings.php'); ?>

	<form id="as_form" >
		<table id='form_table'>
		<tr>
			<td><label>First Name:</label></td>
			<td><input class='form-control' type='text' name='first_name' value='<?=$first?>'></input></td>
		</tr>
		<tr>
			<td><label>Last Name:</label></td>
			<td><input class='form-control' type='text' name='last_name' value='<?=$last?>'></input></td>
		</tr>
		<tr>
			<td><label>Email Address:</label></td>
			<td><input class='form-control' type='text' name='email' value='<?=$email?>'></input></td>
		</tr>
		<tr>
			<td></td>
			<td><input class='btn btn-success' type='submit' name='submit' value='Apply Changes'></input></td>
		</tr>
		</table>
	</form>
	
	<div style='display:none;' id='as_success'class='alert alert-success'>
		<p><b>Success!</b> Your account settings have been updated.</p>
	</div>
	
	<div style='display:none;' id='as_failed' class='alert alert-danger'>
		<p><b>Error!</b> An internal error has occurred.</p>
	</div>
	
	<div class='no-marg center col-sm-6 page-header'><h1>Change Password</h1></div>
	<form id="ap_form">
		<table id='form_table'>
		<tr>
			<td><label>Current Password:</label></td>
			<td><input class='form-control' type='password' name='current_password'></td>
		</tr>
		<tr>
			<td><label>New Password:</label></td>
			<td><input class='form-control' type='password' name='password1'></td>
		</tr>
		<tr>
			<td><label>Confirm Password:</label></td>
			<td><input class='form-control' type='password' name='password2'></td>
		</tr>
		<tr>
			<td></td>
			<td><input class='btn btn-success' type='submit' name='submit' value='Change Password'></input></td>
		</tr>
		</table>
	</form>
	
	<div style='display:none;' id='ap_success'class='alert alert-success'>
		<p><b>Success!</b> Your password has been updated.</p>
	</div>
	
	<div style='display:none;' id='ap_failed' class='alert alert-danger'>
		<p><b>Error!</b> An internal error has occurred.</p>
	</div>
	
</div><!-- /column -->