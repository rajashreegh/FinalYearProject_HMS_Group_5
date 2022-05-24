$(document).ready(function(){
	$('#donor_details_sbmt_btn').click(function(){

		var name=$('#donor_name').val();
		var gender=$('input[name="gender"]:checked').val();
		var age=$('#age').val();
		var mail=$('#donor_mail').val();
		var number=$('#number').val();
		var city=$('#city').val();
		var bgroup=$('#b_groups').val();
		var disease=$('#disease').val();

		var unit=$('#unit').val();


		$.ajax({
			url:"add_emrgncy_blood_donor_details.php?name="+name+"&gender="+gender+"&age="+age+
				"&mail="+mail+"&number="+number+"&city="+city+"&bgroup="+bgroup+"&unit="+unit+
				"&disease="+disease,
			success:function(data){
				
			}
		});
	});
});