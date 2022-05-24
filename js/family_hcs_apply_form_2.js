$(document).ready(function(){
	$('#family_plan_apply_btn2').click(function(){

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

		var ch1_name=$('#ch1_name').val();
		var ch1_gender=$('input[name="ch1_gender"]:checked').val();
		var ch1_age=$('#ch1_age').val();

		var ch2_name=$('#ch2_name').val();
		var ch2_gender=$('input[name="ch2_gender"]:checked').val();
		var ch2_age=$('#ch2_age').val();
		
		$.ajax({
			url:"add_family_children_hcs_applicants.php?p_id="+p_id+"&s_id="+s_id+"&name="+name+
				"&gender="+gender+"&age="+age+"&city="+city+"&number="+number+"&mail="+mail+
				"&sp_name="+sp_name+"&sp_gender="+sp_gender+"&sp_age="+sp_age+"&ch1_name="+ch1_name+
				"&ch1_gender="+ch1_gender+"&ch1_age="+ch1_age+"&ch2_name="+ch2_name+"&ch2_gender="+
				ch2_gender+"&ch2_age="+ch2_age,
			success:function(data){

			}
		});
	});
});