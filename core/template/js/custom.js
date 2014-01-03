//NProgress.inc();
$().ready(function(){
	
	$('#umfragen a:first').tab('show');
	
	$('textarea#message').maxlength({
		threshold: 40
	});

	$('input.umfrage').prettyCheckable();
});

$("button[name^=umfrage_]").click(function(){
	
	
	$('#umfrageBody').empty();
	$('#umfrageHeader').empty();
	
	var id = $(this).attr("uid");
	
	$('#umfragePop').modal('show');
	$('#umfrageHeader').append('Daten werden geladen...');
	
	$.getJSON("api/getsurvey/" + id, function(data) {
		$('#umfrageHeader').empty();
		$('#umfrageHeader').append(data['titel']);
		$('#umfrageBody').append(data['beschreibung']);
	});
	
	$.getJSON("api/getquestions/" + id, function(data) {

		$('#umfrageBody').append("<hr> <h4>Fragen</h4>");
		
		var count = 1;
		
		$.each(data, function(i, item){
			$('#umfrageBody').append("<p>" + count + ". " + item.frage + "</p>");
			count++;
		});
		
	});
});


var fragen = 3;
$("button[name='addQuestion']").click(function() {
	fragen++;
	$("div[name='fragen']").append("<input type=\"text\" name=\"frage_"+fragen+"\" class=\"input-block-level\" placeholder=\"Frage "+fragen+"\" required>");
});


