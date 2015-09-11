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

  <link rel="stylesheet" href="css/style.css">
	
	
</head>
<body>

<div class="container"> 
	<br>
	<div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Metadata Validation</h3> 
    </div>  
	  <div class="panel-body"> 
	  	<!-- Information Section --> 
	  	<div id="examples">
	  		<p class="example" id="info-cgspace" style="display:none"><strong>Example of URL :</strong> <code>https://cgspace.cgiar.org/handle/10568/52163</code></p>	
	  		<p class="example" id="info-agtrials" style="display:none"><strong>Example of URL :</strong> <code>oai:agtrials.org:60</code></p>
	  		<p class="example" id="info-amkn" style="display:none"><strong>Example of URL :</strong> <code>oai:amkn.org:4260</code></p>
	  	</div>
      
			<!-- Form Section --> 
			<p><strong>Select a dissemination Channel:</strong></p> 
			<div class="col-md-4">
				<select class="form-control" name="source" id="source">
					<option value="-1">Select Channel ...</option>
					<option value="cgspace">CGSpace</option>
					<option value="agtrials">Agriculture Trials</option>
					<option value="amkn">AMKN</option>
				</select>  
			</div>
			<div class="col-md-8">
				<div id="formBlock" class="input-group form-search" style="display:none">
		      <input type="text" class="form-control search-query" name="url" id="url" placeholder="URL">
		      <span class="input-group-btn">
		        <button class="btn btn-info" id="check-button" data-type="last">Check</button>
		      </span>
		    </div>
			</div>   

			<!-- Output Section -->	 
			<div class="col-md-12">
				<br><br>
				<div class=" panel panel-default">
	        <div class="panel-heading">Metadata <span id="output" class="label label-default" style="float:right"></span></div>
	        <div class="panel-body">
	        	<input class="form-control" type="text" name="" id="title" placeholder="Title">			
						<input class="form-control" type="text" name="" id="creator" placeholder="Creator(s)">				
						<input class="form-control" type="text" name="" id="subject" placeholder="Subjet">		 
						<textarea class="form-control" id="description" placeholder="Description" name="" cols="30" rows="5"></textarea>
						<input class="form-control" type="text" name="" id="publisher" placeholder="Publisher">
						<input class="form-control" type="text" name="" id="contributor" placeholder="Contributor">
						<input class="form-control" type="text" name="" id="date" placeholder="Date">
						<input class="form-control" type="text" name="" id="type" placeholder="Type">
						<input class="form-control" type="text" name="" id="format" placeholder="Format">
						<input class="form-control" type="text" name="" id="identifier" placeholder="Identifier">
						<input class="form-control" type="text" name="" id="source" placeholder="Source">
						<input class="form-control" type="text" name="" id="language" placeholder="Language">
						<input class="form-control" type="text" name="" id="relation" placeholder="Relation">
						<input class="form-control" type="text" name="" id="coverage" placeholder="Coverage">
						<input class="form-control" type="text" name="" id="rights" placeholder="Rights">
	        </div>
	        
	      </div> 
			</div>
			 
		</div>
  </div> 

</div>
	
</body>
</html>