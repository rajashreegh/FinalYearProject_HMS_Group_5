
$(document).ready(function(){

	

	$('#previous').click(function(){
		var current = $('.active');
		current.removeClass('active');
		$(this).addClass('active');

		$('#content1').removeClass('hide');
		$('#content2').addClass('hide');
		$('#content3').addClass('hide');
		$('#content4').addClass('hide');
		$('#content5').addClass('hide');
		
	});

    $('#upcoming').click(function(){
		var current = $('.active');
		current.removeClass('active');
		$(this).addClass('active');

		
		$('#content1').addClass('hide');
        $('#content2').removeClass('hide');
		$('#content3').addClass('hide');
		$('#content4').addClass('hide');
		$('#content5').addClass('hide');
		
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
	
	});
	$('#discharge').click(function(){
		var current = $('.active');
		current.removeClass('active');
		$(this).addClass('active');

		$('#content1').addClass('hide');
		$('#content2').addClass('hide');
		$('#content3').addClass('hide');
		$('#content4').addClass('hide');
		$('#content5').removeClass('hide');
	
	});

    


});