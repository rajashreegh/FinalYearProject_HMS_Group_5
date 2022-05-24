$(document).ready(function(){
	$('#test-confirmation-btn').click(function(){
		var name=$('#bkng-name').text();
		var mob=$('#mobile-nmbr').text();
		var mail_id=$('#mail-id').text();
		var bkng_id=$('#bkng-id').text();
		var gender=$('#gender').val();
		var payment_mode=$('#payment_mode').val();
		console.log(payment_mode);
		$.ajax({
			url:"add_test_confirmation_details.php?name="+name+"&mob="+mob+"&mail_id="+mail_id+"&bkng_id="+bkng_id+"&gender="+gender+"&payment_mode="+payment_mode,
			success:function(data){
				
			}
		});
	});
});