var $channelsSelect, $recordData;
var timeoutID;

$(document).ready(function() {
	// Variables
	$channelsSelect = $('#channelUrl');
	$recordData = $('#url');

	// Events
	$('#url').on("keyup", urlCheck);
	$('#check-button').on("click", getData);

	$channelsSelect.change(function(e) {
		e.preventDefault();
		var optionSelected = $channelsSelect.val();
		if (optionSelected == -1) {
			$('.example').hide();
			$('#formBlock').hide(500);
			return;
		}
		$recordData.val('');
		$('#formBlock').show(500);
		$('#info-' + optionSelected).fadeIn(500).siblings().fadeOut();
	});


	function urlCheck(e) {
		if (($(this).val()).length > 1) {
			if (timeoutID) clearTimeout(timeoutID);
			// Start a timer that will search when finished
			timeoutID = setTimeout(getData, 1000);
		}
	}

	function getData() {
		var optionSelected = $channelsSelect.val();
		var channelUrl = $recordData.val();
		if (channelUrl.length > 1) {
			var uri = new Uri(channelUrl);
			var uriPath = uri.path();
			var uriHost = uri.host();

			var ajaxData = {
				source: optionSelected
			};
			if (optionSelected == 'cgspace') {
				ajaxData.identifier = "oai:" + uriHost + ":" + uriPath.slice(8, uriPath.length);
			} else {
				ajaxData.identifier = channelUrl;
			}

			$.ajax({
				'url': 'ajax/recordMetadata.php',
				'type': "GET",
				'data': ajaxData,
				'dataType': "json",
				beforeSend: function() {
					$("#output").html("Searching ... " + ajaxData.identifier);
				},
				success: function(data) {
					if (data.errorMessage) {
						$("#output").html(data.errorMessage);
						console.log(data.errorMessage);
					}else{
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

						$("#output").html("Found metadata for " + ajaxData.identifier);
					}
				},
				complete: function() {
					
				}
			});
		}
	}


});