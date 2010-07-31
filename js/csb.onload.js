$(document).ready(function(){
	$(window).mousemove(function(){
		$("div.footer").fadeIn("slow");
		$(this).unbind();
	})
	$("#url").focus();
	$(window).konami(function(){
		alert("i am the eggman");
	});
	$(".scrollable").scrollable();
	var instance = $(".scrollable").data("scrollable");
	// bind menus
	$("#about").click(function(){instance.seekTo(1)})
	$("#api").click(function(){instance.seekTo(2)})
	$("#contact").click(function(){instance.seekTo(3)})
	$("#stats").click(function(){instance.seekTo(4)})

})
