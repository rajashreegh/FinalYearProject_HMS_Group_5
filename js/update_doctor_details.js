$(document).ready(function(){
	$('#submit-button').click(function(){
		
		var gender= $('input[name="gender"]:checked').val();
        var contact= $('#inputcontact').val();
        var dob= $('#inputdob').val();
        var city= $('#inputcity').val();
        var pin= $('#inputpin').val();
        var state= $('#inputstate').val();
		var country= $('#inputcountry').val();
        var inst= $('#institutes').val();
        var exp= $('#Experience').val();
        var prac= $('#practice').val();
        var cert= $('#certificate').val();
        var research= $('#research').val();
         
        

        $.ajax({
			url:"add_doctor_details.php?gender="+gender+"&contact="+contact+"&dob="+dob+"&city="
				+city+"&pincode="+pin+"&state="+state+"&country="+country+"&institute="+inst+"&Experience="
				+exp+"&practice="+prac+"&certificate="+cert+"&research="+research,
			success:function(data){
               alert(data);
			}
		});
        
	});
});

