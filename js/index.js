var timeoutID;

$( document ).ready(function() {
  $('#url').on("keyup", urlCheck);
  $('#check-button').on("click", getData);

  $("#source").change(function(e) {
  	console.log($(e).target);
	 	$('#formBlock').show(500);
	});
 

  function urlCheck(e){
  	if(($(this).val()).length > 1) {
	    if(timeoutID) clearTimeout(timeoutID);  
	        // Start a timer that will search when finished
	        timeoutID = setTimeout(getData, 1000);
	   } 
	}


	function getData(e){
		e.preventDefault();
		var channelUrl = $('#url').val();
		if(channelUrl.length > 1) { 
			var uri = new Uri(channelUrl); 
			var uriPath = uri.path();
			var uriHost = uri.host();
			var uriId = uriPath.slice(8,uriPath.length);
			var identifier = "oai:"+uriHost+":"+ uriId;

		  $.ajax({ 
	      'url': 'ajax/recordMetadata.php',
	      'type': "GET",
	      'data': { source: "cgspace",
	               identifier : identifier },
	      'dataType': "json",
	      beforeSend: function(){
	      	$("#output").html("Searching ... "+identifier );  
	      },
	      success: function(data) {   
	      	$('#title').val(data.title);
	      	$('#creator').val(data.creator);
	      	$('#subject').val(data.subject);
	      	$('#description').val(data.description);
	      	$('#publisher').val(data.publisher);
	      	$('#contributor').val(data.contributor);
	      	$('#date').val(data.date);
	      	$('#type').val(data.type);
	      	$('#format').val(data.format);
	      	$('#identifier').val(data.identifier);
	      	$('#source').val(data.source);
	      	$('#language').val(data.language);
	      	$('#relation').val(data.relation);
	      	$('#coverage').val(data.coverage);
	      	$('#rights').val(data.rights); 


	      },
	      complete: function(){
	      	$("#output").html("Founded metadata for "+identifier );  
	      }
		  }); 
		} 
	}
  

});