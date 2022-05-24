$(document).ready(function(){

	var b1 = $('#ind_block');
	var b2 = $('#fam_block');
	var b3 = $('#sen_block');
	var b4 = $('#cri_block');

	$('#fam').click(function(){
		var current = $('.active-btn');
		current.removeClass('active-btn');
		$(this).addClass('active-btn');

		b2.removeClass('hide');
		b1.addClass('hide');
		b3.addClass('hide');
		b4.addClass('hide');
	});

	$('#sen').click(function(){
		var current = $('.active-btn');
		current.removeClass('active-btn');
		$(this).addClass('active-btn');

		b3.removeClass('hide');
		b1.addClass('hide');
		b2.addClass('hide');
		b4.addClass('hide');
	});

	$('#cri').click(function(){
		var current = $('.active-btn');
		current.removeClass('active-btn');
		$(this).addClass('active-btn');

		b4.removeClass('hide');
		b1.addClass('hide');
		b3.addClass('hide');
		b2.addClass('hide');
	});

	$('#ind').click(function(){
		var current = $('.active-btn');
		current.removeClass('active-btn');
		$(this).addClass('active-btn');

		b1.removeClass('hide');
		b2.addClass('hide');
		b3.addClass('hide');
		b4.addClass('hide');
	});
});