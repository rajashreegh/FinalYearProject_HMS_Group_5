$(document).ready(function(){	

	$('#show_admttd').click(function(){
		if($('#show_admttd').hasClass("fa-caret-down"))
		{
			$('#admit_content').css("top","103%");
			$('#admit_content').css("display","inline-block");
			$('#show_admttd').removeClass("fa-caret-down");
			$('#show_admttd').addClass("fa-caret-up");
		}
		else
		{

			$('#admit_content').css("top","0");
			$('#admit_content').css("display","none");
			$('#show_admttd').removeClass("fa-caret-up");
			$('#show_admttd').addClass("fa-caret-down");
		}

	});


	$('#show_dschrgd').click(function(){
		if($('#show_dschrgd').hasClass("fa-caret-down"))
		{
			$('#discharge_content').css("top","103%");
			$('#discharge_content').css("display","inline-block");
			$('#show_dschrgd').removeClass("fa-caret-down");
			$('#show_dschrgd').addClass("fa-caret-up");
		}
		else
		{

			$('#discharge_content').css("top","0");
			$('#discharge_content').css("display","none");
			$('#show_dschrgd').removeClass("fa-caret-up");
			$('#show_dschrgd').addClass("fa-caret-down");
		}

	});
			
});