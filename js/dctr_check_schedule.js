$(document).ready(function(){
	
	$('.mark_as_done_btn').click(function(){
		var b_id=$(this).data('id');

		$.ajax({
			url:"mark_as_done_by_dctr.php?b_id="+b_id+"&event=1",
			success:function(data){

			}
		});

		$(this).closest("tr").remove();
	});

	$('.cancel_appointment_btn').click(function(){
		var b_id=$(this).data('id');

		$.ajax({
			url:"mark_as_done_by_dctr.php?b_id="+b_id+"&event=2",
			success:function(data){

			}
		});

		$(this).closest("tr").remove();
	})
	 
});