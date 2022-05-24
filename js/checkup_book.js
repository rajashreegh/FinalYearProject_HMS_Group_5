$(document).ready(function(){
	$('#sbmt-btn').click(function(){
		var day=$('#days').val();
		var p_name = $("#patient_name").val();
		var p_mobile= $("#number").val();
		var p_mail= $("#patient_mail").val();

		var doc_id= $("#doc_id").val();
		var dept_id= $("#dept_id").val();
		var booking_id= $("#booking_id").val();

		$.ajax({
			url:"add_checkup_booking.php?day="+day+"&p_name="+p_name+"&p_mobile="+p_mobile+"&p_mail="
				+p_mail+"&doc_id="+doc_id+"&dept_id="+dept_id+"&booking_id="+booking_id,
			success:function(data){
			
			}
		});
	});
});
