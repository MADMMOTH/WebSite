var mouseX, mouseY;

$(document).mousedown(function(e) {
	var mouseX = e.pageX;
   Cookies.set("mouseX",mouseX.toString());
});

function hasGet(){
	var url = window.location.href;
	var splitted = url.split("?");
	return splitted.length !== 1;
}


function enterTransition(){
	$("#curtain").css({"display":"block"});
	$("#mainTitle").show();
	$("#logo").css({"top":"43vh"});
	$("#logo img").css({"width":"30vw","height":"30vw"});
	$("#logo div").css({"min-width":"500vw","min-height":"500vw"});

	$("#mainTitle").delay(1500).fadeOut(500);
	$("#logo img").delay(2000).animate({"width":"6vw","height":"6vw"}, 900);
	$("#logo div").delay(2000).animate({"min-width":"0vw","min-height":"0vw"},1000);
	$("#logo").delay(3200).animate({"top":"0.5vw"}, 300);
	$("#curtain").delay(3200).fadeOut(500);
}

function changePage(){
	if(Cookies.get("mouseX") - $(window).width()/2 > 0)
		$("#logo").css({"transform":"rotate(405deg)","transition":"1s"});
	else{
		$("#logo").css({"transform":"rotate(-315deg)","transition":"1s"});
	}
}




$(document).ready(function(){

	/*Disable for mobile*/
	if($(window).width() > 640){
		if(hasGet())
			changePage();
		else
			enterTransition();
	}
		

	$("#videoReader button").click(function(){
		var $url = $(this).val();
		$("#videoReader iframe").attr('src',$url);
	});
});