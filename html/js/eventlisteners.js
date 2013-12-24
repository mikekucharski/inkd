$(document).ready(function(){

	// Profile Settings Event Listener
	$("#ps_form").submit(function(event){
		event.preventDefault();
		
		// clear response div
		$("#response").html("");
		
		$.ajax({
			url: "../scripts/update_user_info.php",
			type: "GET",
			data: {hometown: $("#hometown").val(), location: $("#location").val(), school: $("#school").val(),
				   workplace: $("#workplace").val(),  birthday: $("#datepicker").val(),  description: $("#description").val()},
			dataType:'json',
			success: function(data){
				// json response
				if(data.success){
					$("#response").html("<div class='alert alert-success'>"+
											"<p><b>Success!</b> Your profile settings have been updated.</p>"+
									    "</div>");
				}else{
					$("#response").html("<div class='alert alert-danger'>"+
											"<p><b>OOPS!</b> Something has gone wrong. Your profile settings were not updated.</p>"+
										"</div>");
				}
			}
		});
	});
	
});