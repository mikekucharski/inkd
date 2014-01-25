$(document).ready(function(){
	// load account settings

	$("#as_form").ready(function(event){
		$.ajax({
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
});