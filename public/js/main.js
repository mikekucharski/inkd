$(document).ready(function(){
	$("#nav_search_bar").focus(function(){
		$(this).attr("placeholder", "Search for people by name or email");
	});
	$("#nav_search_bar").blur(function(){
		$(this).attr("placeholder", "Search");
	});
});