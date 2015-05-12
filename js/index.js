var timeoutID;

$( document ).ready(function() {
  $('#url').on("keyup", urlCheck);
  $('#check-button').on("click", getData);

  function urlCheck(e){
  	if(($(this).val()).length > 1) {
	    if(timeoutID) clearTimeout(timeoutID);  
	        // Start a timer that will search when finished
	        timeoutID = setTimeout(getData, 800);
	    } 
	 }


	 function getData(){
	 	$( "#output" ).html("Buscando ... "+ $('#url').val()); 
	 }
  
});