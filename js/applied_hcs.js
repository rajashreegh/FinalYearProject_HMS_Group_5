$(document).ready(function(){

	$('.dlt_btn').click(function(){

		if(confirm("Are you sure you want do unsubscribe this? \nYou will not be benefits of this scheme from now onwards..")){
			var p_id=$('#p_id').val();
			var s_id=$('#s_id').val();
			$('.dlt_btn').attr("href","unsubscribe_hcs.php?p_id="+p_id+"&s_id="+s_id);
		}

	});

});