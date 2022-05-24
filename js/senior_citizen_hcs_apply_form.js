$(document).ready(function(){
	var age = $('#age').val();
	if(age<60){
		$('#donor_details_sbmt_btn').addClass('disabled');
		$('#warnning_text').html('<h3 style="font-size:4rem; ">YOU CAN NOT APPLY UNTIL YOU ARE 60+ AGE.</h3>');
		$('#donor_form_box').css("margin-top","1%");
	}

});