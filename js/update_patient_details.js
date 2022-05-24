$(document).ready(function(){
	$('#info-sbmt-btn').click(function(){
		var dob=$('#patientDOB').val();
		var blood_grp = $("#patientBloodGroup").val();
		var gender= $("#patientGender").val();
		var height= $("#patientHeight").val();
        var weight= $("#patientWeight").val();

        var contact_num=$('#patientContactnumber').val();
		var address = $("#patientAddress").val();
		var state= $("#patientState").val();
		var country= $("#patientCountry").val();
		var city= $("#patientCity").val();
		var pincode= $("#patientPincode").val();

        var emer_name=$('#patientEmergencyName').val();
		var emer_relation = $("#patientRelation").val();
        var emer_contact= $("#patientEmergencyContact").val();
		var emer_email = $("#patientEmergencyEmail").val();
		var emer_address= $("#patientEmergencyAddress").val();
		


		$.ajax({
			url:"add_patient_details.php?dob="+dob+"&blood_grp="+blood_grp+"&gender="+gender+"&height="
				+height+"&weight="+weight+"&contact_num="+contact_num+"&address="+address+"&state="+state+"&country="
				+country+"&city="+city+"&pincode="+pincode+"&emer_name="+emer_name+"&emer_relation="+emer_relation+"&emer_contact="+emer_contact+"&emer_email="+emer_email+"&emer_address="+emer_address,
			success:function(data){
				alert(data);
			}
		});
	});
});

