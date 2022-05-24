$(document).ready(function(){
	
	$('.schedule').click(function(){
		var testid=$(this).data('id');
		$('#labtestid').val(testid);
	});

	$('.edit').click(function(){
		var testid=$(this).data('id');
		$.ajax({
			url:"display_edit_labtest_form.php?test_id="+testid,
			success:function(data){
				$('#edit_labtest_details_modal').html(data);
			}
		});
	});

});