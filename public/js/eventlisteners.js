$(document).ready(function(){

	
	$("#loginForm").submit(function(event){
		event.preventDefault();

		// form validation on data

		$.ajax({
			url: "login/login",
			type: "POST",
			data: $(this).serialize(),
			dataType:'json',
			success: function(data){
				console.log(data);
				if(data.success) {
					window.location.replace(data.redirectLoc);
				}else{
					// show error
				}
			}
		});
	});

	$("#registerForm").submit(function(event){
		event.preventDefault();

		// form validation on data

		$.ajax({
			url: "login/registerNewUser",
			type: "POST",
			data: $(this).serialize(),
			dataType:'json',
			success: function(data){
				console.log(data);
				if(data.success) {
					//window.location.replace(data.redirectLoc);
				}else{
					// show error
				}
			}
		});
	});
	

	// Profile Settings Event Listener
	$("#ps_form").submit(function(event){
		event.preventDefault();
		$("#ps_form").find('.load-gif').show();
		
		// hide success div
		$("#ps_success").hide();
		$("#ps_failed").hide();
		
		$.ajax({
			url: "scripts/update_user_info.php",
			type: "GET",
			data: $(this).serialize(),
			dataType:'json',
			success: function(data){
				// json response
				if(data.success){
					$("#ps_success").show();
				}else{
					$("#ps_success").show();
				}
				$("#ps_form").find('.load-gif').hide();
			},
			error:function(xhr, error){
				console.log(xhr); console.log(error);
            }
		});
	});
	
	//Account Settings Event Listener 
	$("#as_form").submit(function(event){
		event.preventDefault();
		$('#as_form').find('.load-gif').show();
		
		//clear response divs
		$("#as_success").hide();
		$("#as_failed").hide();
		$.ajax({
			url:"scripts/update_user.php",
			type:"GET",
			data:$(this).serialize(),
			dataType:'json',
			success: function(data){
				//json response
				if(data.success){
					$("#as_success").show();
				}	
				else{
					$("#as_failed").show();
				}
				$('#as_form').find('.load-gif').hide();
			},
			error:function(xhr, error){
				console.log(xhr); console.log(error);
            }
		});
	});
	
	//Change Password Event Listener
	$("#ap_form").submit(function(event){
		event.preventDefault();

		$('#ap_form').find('#load-gif').show();
		//Clear Response Divs
		$("#ap_success").hide();
		$("#ap_failed").hide();
		$.ajax({
			url:"scripts/update_password.php",
			type:"POST",
			data:$(this).serialize(),
			dataType:'json',
			success:function(data){
				//json response
				console.log(data);
				if(data.success){
					$("#ap_success").show();
				}	
				else{
					$("#ap_failed").show();
				}
				$('#ap_form').find('#load-gif').hide();
			},
			error:function(xhr, error){
				console.log(xhr); console.log(error);
            }
		});
	});
	
	
	//Unfriend Event Listener
	$(".unfriend_form").submit(function(event){
		event.preventDefault();
		var unfriend_form = $(this);
		$.ajax({
			url:"scripts/unfriend.php",
			type:"GET",
			data: {u_idf: $(this).find("label").text()},
			dataType:'json',
			success:function(data){
				//json response
				if(data.success){
					unfriend_form.hide();
					unfriend_form.parent().find('#friend_form').show();
				}	
			},
			error:function(xhr, error){
				console.log(xhr); console.log(error);
            }
		});
	});	
	
	//friend Event Listener
	$(".friend_form").submit(function(event){
		event.preventDefault();
		var friend_form = $(this);
		$.ajax({
			url:"scripts/add_friend.php",
			type:"GET",
			data: {u_idf: $(this).find("label").text()},
			dataType:'json',
			success:function(data){
				//json response
				if(data.success){
					friend_form.hide();
					friend_form.parent().find('#unfriend_form').show();	
				}	
			},
			error:function(xhr, error){
				console.log(xhr); console.log(error);
            }
		});
	});	
	
	// Home page Ink Post Event Listener
	$("#create_post_form").submit(function(event){
		event.preventDefault();
		var post_form = $(this);
		$.ajax({
			url:"scripts/create_post.php",
			type:"POST",
			data: $(this).serialize(),
			dataType:'json',
			success:function(data){
				console.log(data);
				post_form.find('textarea[name=ink-msg]').val("");  // clear post text area
				
				if(data.success){
					newDiv= "<!--Ink Div--><div id='ink'><!-- Profile Image --><div class='post-img-container'><img class='post-img' src='public/img/default_profile.jpg' alt='empty'/></div> "+
							"<!-- Ink Header --><div id='ink_header'><div id='header_left'><span><a href='index.php?page=profile&u_id=" + data.u_id + "'> "+
									"<p>" + data.first_name + " " + data.last_name + "</p></a></span></div><div id='header_right'><span>" + data.post_time + "</span></div></div> "+
							"<!-- Ink Post --><div id='ink_post'><p>" + data.post_msg + "</p></div> "+
							"<!-- Ink Options --><div id='ink_options'> "+
							"<a href='#'><span class='label-danger label'><i class='glyphicon glyphicon-heart white'></i></span> Like</a> "+
							"<a href='#'><span class='label-primary label'><i class='glyphicon glyphicon-tint white'></i></span> Re-Ink</a> "+
							"<a href='#'><span class='label-success label'><i class='glyphicon glyphicon-comment white'></i></span> Comment</a> "+
							"</div></div> ";
					$('#ink_post_container').prepend(newDiv);
					$('#ink_post_container').children(":first").hide().slideDown(250);
				}	
			},
			error:function(xhr, error){
				console.log(xhr); console.log(error);
            }
		});
	});	
});

