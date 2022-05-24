$(document).ready(function(){
	$('#right-btn').click(function(){
		$('.info-box').toggleClass("show");
		$('.success-box').toggleClass("shift-left");

		if ($('#right-btn').hasClass("fa-chevron-circle-right")) {
			$('#right-btn').removeClass("fa-chevron-circle-right");
			$('#right-btn').addClass("fa-chevron-circle-left");
		}else{
			$('#right-btn').removeClass("fa-chevron-circle-left");
			$('#right-btn').addClass("fa-chevron-circle-right");
		}
		

	});
});