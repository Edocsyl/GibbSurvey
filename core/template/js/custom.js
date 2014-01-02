$(function () {
	$('#umfragen a:first').tab('show');
	
})


$("button[name^=umfrage_]").click(function(){
	
	$('#umfrageBody').empty();
	$('#umfrageHeader').empty();
	
	var id = $(this).attr("uid");
	
	$('#umfragePop').modal('show');
	$('#umfrageHeader').append('Daten werden geladen...');
	
	$.getJSON("http://localhost/Survey-Tool/api/getsurvey/" + id, function(data) {
		$('#umfrageHeader').empty();
		$('#umfrageHeader').append(data['titel']);
		$('#umfrageBody').append(data['beschreibung']);
	});
	
});


var fragen = 3;

$("a[name='addQuestion']").click(function() {
	fragen++;
	$("div[name='fragen']").append("<input type=\"text\" name=\"frage_"+fragen+"\" class=\"input-block-level\" placeholder=\"Frage "+fragen+"\" required>");
});

