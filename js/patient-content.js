
$(document).ready(function(){

	

	$('#personal').click(function(){
		var current = $('.active');
		current.removeClass('active');
		$(this).addClass('active');

		$('#content1').removeClass('hide');
		$('#content2').addClass('hide');
		$('#content3').addClass('hide');
		$('#content4').addClass('hide');
		$('#content5').addClass('hide');
		$('#content6').addClass('hide');
		$('#content7').addClass('hide');
	});

    $('#appointment').click(function(){
		var current = $('.active');
		current.removeClass('active');
		$(this).addClass('active');

		
		$('#content1').addClass('hide');
        $('#content2').removeClass('hide');
		$('#content3').addClass('hide');
		$('#content4').addClass('hide');
		$('#content5').addClass('hide');
		$('#content6').addClass('hide');
		$('#content7').addClass('hide');
	});
	$('#previous').click(function(){
		
        $('#content2').addClass('hide');
		$('#content5').removeClass('hide');
		
	});

	$('#upcoming').click(function(){
		
        $('#content2').addClass('hide');
		$('#content6').removeClass('hide');
		
	});
	$('#back-btn1').click(function(){
		
       
		$('#content5').addClass('hide');
		$('#content2').removeClass('hide');
		
	});
	$('#back-btn2').click(function(){
		
       
		$('#content6').addClass('hide');
		$('#content2').removeClass('hide');
		
	});
	

	$('#labtest').click(function(){
		var current = $('.active');
		current.removeClass('active');
		$(this).addClass('active');

		$('#content1').addClass('hide');
		$('#content2').addClass('hide');
		$('#content3').removeClass('hide');
		$('#content4').addClass('hide');
		$('#content5').addClass('hide');
		$('#content6').addClass('hide');
		$('#content7').addClass('hide');
	});

    $('#admission').click(function(){
		var current = $('.active');
		current.removeClass('active');
		$(this).addClass('active');

		$('#content1').addClass('hide');
		$('#content2').addClass('hide');
		$('#content3').addClass('hide');
		$('#content4').removeClass('hide');
		$('#content5').addClass('hide');
		$('#content6').addClass('hide');
		$('#content7').addClass('hide');
	});
	$('#discharge').click(function(){
		var current = $('.active');
		current.removeClass('active');
		$(this).addClass('active');

		$('#content1').addClass('hide');
		$('#content2').addClass('hide');
		$('#content3').addClass('hide');
		$('#content4').addClass('hide');
		$('#content5').addClass('hide');
		$('#content6').addClass('hide');
		$('#content7').removeClass('hide');
	});


});