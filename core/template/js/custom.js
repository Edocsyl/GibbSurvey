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


$("button[name^=result_]").click(function(){
	
	$('#umfrageBody').empty();
	$('#umfrageHeader').empty();
	
	var id = $(this).attr("uid");
	
	$('#umfragePop').modal('show');
	$('#umfrageHeader').append('Daten werden geladen...');
	
	$.getJSON("api/getsurvey/" + id, function(data) {
		$('#umfrageHeader').empty();
		$('#umfrageHeader').append(data['titel']);
		$('#umfrageBody').append('Daten werden geladen...');
	});
	
	$.getJSON("api/getquestions/" + id, function(data) {
		var count = 1;
		
		$('#umfrageBody').empty();
		
		$.each(data, function(i, item){
			$.getJSON("api/getresult/" + item.id, function(result) {
						
						$('#umfrageBody').append('<div id="chart_'+item.id+'" style="width: 98%; height: 300px;"></div><hr>');
						
		
						var dataSource = [
						                  {result: "Keine Angaben", val: parseInt(result['Null'])},
						                  {result: "0%", val: parseInt(result['0'])},
						                  {result: "25%", val: parseInt(result['25'])},
						                  {result: "75%", val: parseInt(result['75'])},
						                  {result: "100%", val: parseInt(result['100'])}
						              ];
		
						
						$('#chart_'+item.id).dxPieChart({
						    dataSource: dataSource,
						    title: count + ". " + item.frage,
							tooltip: {
								enabled: true,
								percentPrecision: 2,
								customizeText: function() { 
									return this.valueText + " - " + this.percentText;
								}
							},
							legend: {
								horizontalAlignment: "right",
								verticalAlignment: "top",
								margin: 0
							},
							series: [{
								type: "doughnut",
								argumentField: "result",
								label: {
									visible: true,
									connector: {
										visible: true
									}
								}
							}]
						});

				count++;
			});

			
		});
		
	});
});



var fragen = 3;
$("button[name='addQuestion']").click(function() {
	fragen++;
	$("div[name='fragen']").append("<input type=\"text\" name=\"frage_"+fragen+"\" class=\"input-block-level\" placeholder=\"Frage "+fragen+"\" required>");
});





