var $channelsSelect;
var timeoutID;

$( document ).ready(function() {
	// Variables
	$channelsSelect = $('#source');

	// Events
  $('#url').on("keyup", urlCheck);
  $('#check-button').on("click", getData);

  $("#source").change(function(e) {
  	var optionSelected = $channelsSelect.val();
  	if (optionSelected == -1){
  		$('.example').hide();
  		$('#formBlock').hide(500);
  		return;
  	}
 		$('#formBlock').show(500);
		$('#info-'+optionSelected).fadeIn(500).siblings().fadeOut(); 
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
		var optionSelected = $channelsSelect.val();
		var channelUrl = $('#url').val();
		if(channelUrl.length > 1) { 
			var uri = new Uri(channelUrl); 
			var uriPath = uri.path();
			var uriHost = uri.host();

			var data = {
				source : optionSelected
			};
			if(optionSelected == 'cgspace'){
				data.identifier = "oai:"+uriHost+":"+ uriPath.slice(8,uriPath.length);
			}else{
				data.identifier = channelUrl;
			}
			
		  $.ajax({ 
	      'url': 'ajax/recordMetadata.php',
	      'type': "GET",
	      'data': data,
	      'dataType': "json",
	      beforeSend: function(){
	      	$("#output").html("Searching ... "+data.identifier );  
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
	      	$("#output").html("Found metadata for "+data.identifier );  
	      }
		  }); 
		} 
	}
  

});