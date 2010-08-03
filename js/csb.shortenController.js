var shortenController = {
	init : function(){
		$("div.button.shorten").click(shortenController.shortenURL);
	},
	showLoader : function(){
		$("div.results_container div.loading").show();
	},
	hideLoader : function(){
		$("div.results_container div.loading").hide();
	},
	showResult : function(url){
		$("div.results_container div.results")
			.html("csb: http://coolsitebro.com/" + url)
			.show();
	},
	hideResult : function(url){
		$("div.results_container div.results").hide();
	},
	shortenURL : function(){
		shortenController.showLoader();
		shortenController.hideResult();
		var url = $("input#url").val();
		var opts = {
			func : "shorten",
			url : url
		};
		$.ajax({
			type: 'POST',
			url: "functions.php",
			data: opts,
			success: function(response){
				if (response.status == "success")
				{
					shortenController.hideLoader();
					shortenController.showResult(response.data) // still need to show errors
				}
			},
			dataType: "json"
		});

	}
}