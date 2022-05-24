$(document).ready(function(){
	$('#button1').click(function(){
		$('#policy1').addClass("hide");
		$('#policy2').removeClass("hide");
	});

	$('#button2').click(function(){
		if($('#button2').text() == 'Next'){
			$('#policy2').addClass("hide");
			$('#policy3').removeClass("hide");
			$('#button2').text("Back");
		}else if($('#button2').text() == 'Back'){
			$('#policy2').addClass("hide");
			$('#policy1').removeClass("hide");
			$('#button2').text("Next");
		}
	});

	$('#button3').click(function(){
		if($('#button3').text() == 'Next'){
			$('#policy3').addClass("hide");
			$('#policy4').removeClass("hide");
			$('#button3').text("Back");
		}else if ($('#button3').text() == 'Back'){
			$('#policy3').addClass("hide");
			$('#policy2').removeClass("hide");
			$('#button3').text("Next");
		}
	});

	$('#button4').click(function(){
		$('#policy4').addClass("hide");
		$('#policy3').removeClass("hide");
	});

});