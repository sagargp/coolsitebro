$(document).ready(function(){
	
	// show bottom bar on mouseMove
	$(window).mousemove(function(){
		$("div.footer").fadeIn("slow");
		$(this).unbind();
	})
	
	// konami code leetness
	$(window).konami(function(){
		alert("i am the eggman");
	});
	
	// set up scrollable
	$(".scrollable").scrollable();
	var instance = $(".scrollable").data("scrollable");
	
	// bind menus below
	$("#about").click(function(){instance.seekTo(1)})
	$("#api").click(function(){instance.seekTo(2)})
	$("#contact").click(function(){instance.seekTo(3)})
	$("#stats").click(function(){instance.seekTo(4)})

	// shortenController init (handles ajax/dom of link shortening)
	shortenController.init(); 
	
})
