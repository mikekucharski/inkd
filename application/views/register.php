<div class="login_container register_container">
	<h2>Get Ink'd</h2>
	<form class='login_form' action="scripts/create_user.php" method="POST">
		<table>
			<tr>
				<td><label>First Name:</label></td>
				<td><input name='first' type="text" placeholder="First Name"/></td>
			</tr>
			<tr>
				<td><label>Last Name:</label></td>
				<td><input name='last' type="text" placeholder="Last Name"/> </td>
			</tr>
			<tr>
				<td><label>Email:</label></td>
				<td><input name='email' type="text" placeholder="Email" /> </td>
			</tr>
			<tr>
				<td><label>Password:</label></td>
				<td><input name='password' type="password" placeholder="Password"/> </td>
			</tr>
			<tr>
				<td><label>Confirm Password:</label></td>
				<td><input name='password2' type="password" placeholder="Confirm Password"/> </td>
			</tr>
			<tr>
				<td></td>
				<td><input name='submit' type="submit" value="Register"/></td>
			</tr>
		
		</table>
	</form>
</div>