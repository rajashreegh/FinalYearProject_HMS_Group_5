$(document).ready(function(){
			$('.test-booking-btn').click(function(){
				here_id = $(this).data('id');
				$.ajax({
					url:"add_test_booking.php?id="+here_id,
					success:function(data){
						
					}
				});
			});
		});