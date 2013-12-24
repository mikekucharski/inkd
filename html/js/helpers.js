$(function() {
	var currentVal =  $("#datepicker").val(); // save current date
    $("#datepicker").datepicker();
	$("#datepicker").datepicker( "option", "dateFormat", "yy-mm-dd" );
	$("#datepicker").datepicker('setDate', currentVal);  // re-assign date
});