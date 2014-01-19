$(document).ready(function(){

	// Profile Settings Event Listener
	$("#ps_form").submit(function(event){
		event.preventDefault();
		
		// clear response divs
		$("#ps_success").css("display", "none");
		$("#ps_failed").css("display", "none");
		$.ajax({
			url: "../scripts/update_user_info.php",
			type: "GET",
			data:$(this).serialize(),
			dataType:'json',
			success: function(data){
				// json response
				if(data.success){
					$("#ps_success").css("display", "block");
				}else{
					$("#ps_success").css("display", "block");
				}
			}
		});
	});
	
	//Account Settings Event Listener 
	$("#as_form").submit(function(event){
		event.preventDefault();
		
		//clear response divs
		$("#as_success").css("display", "none");
		$("#as_failed").css("display", "none");
		$.ajax({
			url:"../scripts/update_user.php",
			type:"GET",
			data:$(this).serialize(),
			dataType:'json',
			success: function(data){
				//json response
				if(data.success){
					$("#as_success").css("display", "block");
				}	
				else{
					$("#as_failed").css("display", "block");
				}
			}
		});
	});
	
	//Change Password Event Listener
	$("#ap_form").submit(function(event){
		event.preventDefault();

		//Clear Response Divs
		$("#ap_success").css("display", "none");
		$("#ap_failed").css("display", "none");
		$.ajax({
			url:"../scripts/update_password.php",
			type:"POST",
			data:$(this).serialize(),
			dataType:'json',
			success:function(data){
				//json response
				if(data.success){
					$("#ap_success").css("display", "block");
				}	
				else{
					$("#ap_failed").css("display", "block");
				}
			}
		});
	});
	
	
	//Unfriend Event Listener
	$(".unfriend_form").submit(function(event){
		event.preventDefault();
		var unfriend_form = $(this);
		$.ajax({
			url:"../scripts/unfriend.php",
			type:"GET",
			data: {u_idf: $(this).find("label").text()},
			dataType:'json',
			success:function(data){
				console.log(data);
				//json response
				if(data.success){
					unfriend_form.hide();
					unfriend_form.parent().find('#friend_form').show();
				}	
			}
		});
	});	
	
	//friend Event Listener
	$(".friend_form").submit(function(event){
		event.preventDefault();
		var friend_form = $(this);
		$.ajax({
			url:"../scripts/add_friend.php",
			type:"GET",
			data: {u_idf: $(this).find("label").text()},
			dataType:'json',
			success:function(data){
				console.log(data);
				//json response
				if(data.success){
					friend_form.hide();
					friend_form.parent().find('#unfriend_form').show();	
				}	
			}
		});
	});	
});

