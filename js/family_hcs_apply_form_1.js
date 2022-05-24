$(document).ready(function(){
	$('#chck-box').click(function(){
		if($(this).is(':checked')){
			$('#form2').removeClass('hide');
			$('#family_plan_apply_btn1').addClass('hide');
		}
	});

	$('#cross').click(function(){
		$('#form2').addClass('hide');
		$('#chck-box').prop('checked', false);
		$('#family_plan_apply_btn1').removeClass('hide');
	});

	$('#family_plan_apply_btn1').click(function(){

		var p_id=$('#p_id').val();
		var s_id=$('#s_id').val();

		var name=$('#donor_name').val();
		var gender=$('input[name="gender"]:checked').val();
		var age=$('#age').val();
		var city=$('#city').val();
		var number=$('#number').val();
		var mail=$('#donor_mail').val();

		var sp_name=$('#sp_name').val();
		var sp_gender=$('input[name="sp_gender"]:checked').val();
		var sp_age=$('#sp_age').val();

		$.ajax({
			url:"add_family_hcs_applicants.php?p_id="+p_id+"&s_id="+s_id+"&name="+name+
				"&gender="+gender+"&age="+age+"&city="+city+"&number="+number+"&mail="+mail+
				"&sp_name="+sp_name+"&sp_gender="+sp_gender+"&sp_age="+sp_age,
			success:function(data){

			}
		});
	});
});