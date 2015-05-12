<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>OAI-PMH Harvester - Data & Tools</title>
	<!-- Loadind JQuery lib -->
	<script src="libs/js/jquery/dist/jquery.min.js"></script>

	<!-- Load jsurl Lib-->
	<script src="libs/js/jsuri/Uri.js"></script>

	<!-- Load index.js -->
	<script src="js/index.js"></script>
	
	<!-- Load Bootflat -->
	<link rel="stylesheet" href="libs/js/Bootflat/css/bootstrap.min.css">
  <link rel="stylesheet" href="libs/js/Bootflat/bootflat/css/bootflat.css">
	
	
</head>
<body>

<div class="container">

	<div class="row">
		<p><strong>Example of URL :</strong> https://cgspace.cgiar.org/handle/10568/52163</p>
		<form action="">
			<select class="form-control" name="source" id="source">
				<option value="-1">Select Channel ...</option>
				<option value="cgspace">CGSpace</option>
			</select> 
			<input type="text" class="form-control" name="url" id="url" placeholder="URL">
			<input type="button" class="btn btn-info" id="check-button" value="Check">
		</form>
	</div>
	<div class="row">
		<p id="output">
			
		</p>
	</div>
</div>
	
</body>
</html>