$(document).ready(function(){
	$('.view').click(function(){
		$(this).parent().next().removeClass('hidden');
		$(this).parent().next().addClass('show');
	});

	$('.cross').click(function(){
		$(this).parent().removeClass('show');
		$(this).parent().addClass('hidden');
	});
});