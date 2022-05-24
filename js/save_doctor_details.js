$(document).ready(function(){
	$('#save-doctor-btn').click(function(){
        var doc_id = $('#doc_id').val();
		var doc_name = $('#doc_name').val();
		var doc_mail =  $('#doc_mail').val();
		var doc_pwd = $('#doc_pswrd').val();

		var qualification=$('#doc_quali').val();
		var visit = $("#doc_visit").val();
		var floor= $("#doc_floor").val();

        var day_1=$('#day_1').val();
		var time_1 = $("#time_1").val();
		var day_2= $("#day_2").val();
		var time_2= $("#time_2").val();
		var day_3= $("#day_3").val();
		var time_3= $("#time_3").val();
		


		$.ajax({
			url:"update_doc_details.php?doc_id="+doc_id+"&qualification="+qualification+"&visit="+visit+"&floor="+floor+"&day_1="+day_1
                +"&time_1="+time_1+"&day_2="+day_2+"&time_2="+time_2+"&day_3="+day_3+"&time_3="+time_3+"&doc_name="+doc_name+"&doc_mail="+doc_mail+"&doc_pwd="+doc_pwd,
			success:function(data){
			}
		});
	});
});