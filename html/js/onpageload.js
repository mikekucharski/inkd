$(document).ready(function(){
	// load account settings
	
	$("#as_form").ready(function(event){
		$.ajax({
			async: false,
			url: "../scripts/get_account_settings.php",
			type: "GET",
			dataType:'json',
			success: function(response){
				// json response
				console.log(response);
				if(response.success){
					var data = response.data;
					$("#as_form input[name='first_name']").val(data.first);
					$("#as_form input[name='last_name']").val(data.last);
					$("#as_form input[name='email']").val(data.email);
				}else{
					$("#as_failed").css("display", "block");
				}
			},
			error:function(xhr, error){
				console.log(xhr); console.log(error);
            }
		});
	});
});