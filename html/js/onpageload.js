$(document).ready(function(){
	// load account settings

	$("#as_form").ready(function(event){
		$.ajax({
			async: false,
			url: "../scripts/get_account_settings.php",
			type: "GET",
			dataType:'json',
			success: function(data){
				// json response
				console.log(data);
				$("#as_form input[name='first_name']").val(data.first);
				$("#as_form input[name='last_name']").val(data.last);
				$("#as_form input[name='email']").val(data.email);
				$('#as_form').find('#load-gif').hide();
			},
			error:function(xhr, error){
				console.log(xhr); console.log(error);
            }
		});
	});
	
	// load profile settings

	$("#ps_form").ready(function(event){
		$.ajax({
			async: false,
			url: "../scripts/get_profile_settings.php",
			type: "GET",
			dataType:'json',
			success: function(response){
				// json response
				console.log(response);
				if(response.success){
					var data = response.data;
					$("#ps_form input[name='hometown']").val(data.hometown);
					$("#ps_form input[name='location']").val(data.location);
					$("#ps_form input[name='school']").val(data.school);
					$("#ps_form input[name='workplace']").val(data.workplace);
					$("#ps_form input[name='birthday']").val(data.birthday);
					$("#ps_form input[name='description']").val(data.description);
					$('#ps_form').find('#load-gif').hide();
				}	
			},
			error:function(xhr, error){
				console.log(xhr); console.log(error);
            }
		});
	});
});