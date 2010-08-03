<!DOCTYPE html>
<html>
	<head>
		<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Reenie+Beanie' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica+SC' rel='stylesheet' type='text/css'>
		<link href="style/css/csb.main.css" rel='stylesheet' type='text/css'>
		<link href="style/css/csb.about.css" rel='stylesheet' type='text/css'>
		<link href="style/css/csb.api.css" rel='stylesheet' type='text/css'>
		<link href="style/css/csb.statistics.css" rel='stylesheet' type='text/css'>
		<link href="style/css/csb.scrollable.css" rel='stylesheet' type='text/css'>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" language="javascript"></script>
		<script src="lib/jquery.ui/jquery-ui-1.8.2.custom.min.js" language="javascript"></script>
		<script src="lib/jquery.tools.min.js" language="javascript"></script>
		<script src="lib/jquery.konami.js" language="javascript"></script>
		<script src="js/csb.shortenController.js" language="javascript"></script>

		<script src="js/csb.onload.js" language="javascript"></script>
	</head>
	<body>
		<!-- root element for scrollable --> 
		<div class="scrollable">   

		   <!-- root element for the items --> 
		   <div class="items"> 
			
		      <!-- about --> 
		      <div class="item"> 
				<div class="title">cool site bro</div>
				<div class="input_container">
					<div class="shortener_container">
						<input id="url" type="text" value="http://www.coolsitebro.com"/>
						<div class="button shorten">shorten</div>
					</div>
					<div class="results_container">
						<div class="loading">
							<img src="style/img/global.loader.triangle.gif"/>
						</div>
						<div class="results">
							results
						</div>
					</div>
				</div>
		      </div>

		      <!-- api --> 
		      <div class="item"> 
				<div class="title">about</div>
				<div class="input_container">
					<div class="results_container">
						cool site bro is teh hax0rs
					</div>
				</div>
		      </div>
		
		      <!-- api --> 
		      <div class="item"> 
				API
		      </div> 

		      <!-- contact --> 
		      <div class="item"> 
				CONTACT
		      </div> 

		      <!-- contact --> 
		      <div class="item"> 
				STATS
		      </div>
		   </div> 

		</div>

		<div style="display: none" class="footer">
				<a id="about" href="#">about</a>
				<a id="api" href="#">api</a>
				<a id="contact" href="#">contact</a>
				<a id="stats" href="#">stats</a>
		</div>
		
		<!-- "next page" action --> 
		
		
	</body>
</html>