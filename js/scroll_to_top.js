
var arrow = document.getElementById("scroll_to_top_btn")

arrow.addEventListener("click",function(){
	window.scrollTo({
		top:0,
		left:0,
		behavior:"smooth"
	});
});