$(document).ready(function(){
	$('#p_cnfrm_btn').click(function(){

		if(confirm("Your payment will be confirmed and designated amount deducted..")){
		var b_id=$('#b-id').text();
		var p_mode=$('#p_mode').text();

		$.ajax({
			url:"update_checkup_payment_details.php?b_id="+b_id+"&p_mode="+p_mode,
			success:function(data){

			}
		});
	}
	});
});