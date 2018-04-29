$(document).ready(function() {

	//datepicker popup
	$(function() {
		$("#datepicker").datepicker({maxDate: '0',minDate: -365});
		$("#datepicker").datepicker("option", "dateFormat", 'DD, d MM, yy');
		
	});

});