<div class="container">
	<div class="row">
		<div class="col-lg-12 colCorrection">
			<div class="column">
				<div class='center col-sm-6 page-header'>
					<h1>Profile Settings</h1>
				</div>
				
				<form id='ps_form' name='ps_form'>
					<table id='form_table'>
					<tr>
						<td><label>Hometown:</label></td>
						<td><input class='form-control' type='text' name='hometown' maxlength='50' value="<?= $ps['hometown'] ?>"></input></td>
					</tr>
					<tr>
						<td><label>Location:</label></td>
						<td><input class='form-control' type='text' name='location' maxlength='50' value="<?= $ps['location'] ?>"></input></td>
					</tr>
					<tr>
						<td><label>School:</label></td>
						<td><input class='form-control' type='text' name='school' maxlength='50' value="<?= $ps['school'] ?>"></input></td>
					</tr>
					<tr>
						<td><label>Workplace:</label></td>
						<td><input class='form-control' type='text' name='workplace' maxlength='50' value="<?= $ps['workplace'] ?>"></td>
					</tr>
					<tr>
						<td><label>Birthday:</label></td>
						<td><input class='form-control' type='text' name='birthday' id='datepicker' readonly="readonly" value="<?= $ps['birthday'] ?>"></td>
					</tr>
					<tr>
						<td><label>Short Description:</label></td>
						<td><input class='form-control' type='text' name='description' maxlength='250' value="<?= $ps['description'] ?>"></td>
					</tr>
					<tr>
						<td></td>
						<td><input class='btn btn-success' type='submit' name='submit' value='Apply Changes'></input><img class="load-gif" src="public/img/load.gif" /></td>
					</tr>
					</table>
				</form>
				
				<div style='display:none;' id='ps_success'class='alert alert-success'>
					<p><b>Success!</b> Your profile settings have been updated.</p>
				</div>
				
				<div style='display:none;' id='ps_failed' class='alert alert-danger'>
					<p><b>Error!</b> An internal error has occurred.</p>
				</div>
			</div> <!-- /column -->
		</div> <!-- end col-lg-12 -->
	</div> <!-- end row -->
</div> <!-- container -->