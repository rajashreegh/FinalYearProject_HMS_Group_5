$(document).ready(function(){
	$('.view').click(function(){
		var b_id=$(this).data('id');
		$.ajax({
			url:"display_labtest_patient_details_modal.php?b_id="+b_id,
			success:function(data){
				$('#booking_details').html(data);
			}
		});
	});



	$('.ba_btn').click(function(){
		var b_id=$(this).data('id');
		$('#b_id').attr("value",b_id);
	});



	$('.di_btn').click(function(){
		var b_id=$(this).data('id');
		$('#b_id_di').attr("value",b_id);
	});



	$('#rep_val').change(function(){
		var value=$('#rep_val').val();
		var b_id=$('#b_id').val();
		$.ajax({
			url:"display_labtest_ba_result.php?value="+value+"&b_id="+b_id,
			success:function(data){
				$('#rep_result').attr("value",data);
			}
		});
	});


});