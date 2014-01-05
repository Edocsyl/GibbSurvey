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
						
						$('#umfrageBody').append("<p class=\"lead\">" + count + ". " + item.frage + "</p>");
						$('#umfrageBody').append('<p><canvas width="600" height="250" id="chart_'+item.id+'" style="width: 600px; height: 250px;"></canvas></p>');
						
						var results = [result['Null'],result['0'],result['25'],result['75'],result['100']];
						var higestValue = Math.max.apply(Math, results) + 1;
						
						new Chart($("#chart_"+item.id).get(0).getContext("2d")).Bar({
							labels : ["Keine Angaben","0%","25%","75%","100%"],
							datasets : [
								{
									fillColor : "rgba(151,187,205,0.5)",
									strokeColor : "rgba(151,187,205,1)", 
									data : results
								}
							]
							
						},{
							
							//Boolean - If we show the scale above the chart data			
							scaleOverlay : false,
							
							//Boolean - If we want to override with a hard coded scale
							scaleOverride : true,
							
							//** Required if scaleOverride is true **
							//Number - The number of steps in a hard coded scale
							scaleSteps : higestValue,
							//Number - The value jump in the hard coded scale
							scaleStepWidth : 1,
							//Number - The centre starting value
							scaleStartValue : 0,
							
							//Boolean - Whether to show lines for each scale point
							scaleShowLine : true,
		
							//String - Colour of the scale line	
							scaleLineColor : "rgba(0,0,0,.1)",
							
							//Number - Pixel width of the scale line	
							scaleLineWidth : 1,
		
							//Boolean - Whether to show labels on the scale	
							scaleShowLabels : true,
							
							//Interpolated JS string - can access value
							scaleLabel : "<%=value%>",
							
							//String - Scale label font declaration for the scale label
							scaleFontFamily : "'Arial'",
							
							//Number - Scale label font size in pixels	
							scaleFontSize : 12,
							
							//String - Scale label font weight style	
							scaleFontStyle : "normal",
							
							//String - Scale label font colour	
							scaleFontColor : "#666",
							
							//Boolean - Show a backdrop to the scale label
							scaleShowLabelBackdrop : true,
							
							//String - The colour of the label backdrop	
							scaleBackdropColor : "rgba(255,255,255,0.75)",
							
							//Number - The backdrop padding above & below the label in pixels
							scaleBackdropPaddingY : 2,
							
							//Number - The backdrop padding to the side of the label in pixels	
							scaleBackdropPaddingX : 2,
							
							//Boolean - Whether we show the angle lines out of the radar
							angleShowLineOut : true,
							
							//String - Colour of the angle line
							angleLineColor : "rgba(0,0,0,.1)",
							
							//Number - Pixel width of the angle line
							angleLineWidth : 1,			
							
							//String - Point label font declaration
							pointLabelFontFamily : "'Arial'",
							
							//String - Point label font weight
							pointLabelFontStyle : "normal",
							
							//Number - Point label font size in pixels	
							pointLabelFontSize : 12,
							
							//String - Point label font colour	
							pointLabelFontColor : "#666",
							
							//Boolean - Whether to show a dot for each point
							pointDot : true,
							
							//Number - Radius of each point dot in pixels
							pointDotRadius : 3,
							
							//Number - Pixel width of point dot stroke
							pointDotStrokeWidth : 1,
							
							//Boolean - Whether to show a stroke for datasets
							datasetStroke : true,
							
							//Number - Pixel width of dataset stroke
							datasetStrokeWidth : 2,
							
							//Boolean - Whether to fill the dataset with a colour
							datasetFill : true,
							
							//Boolean - Whether to animate the chart
							animation : true,
		
							//Number - Number of animation steps
							animationSteps : 30,
							
							//String - Animation easing effect
							animationEasing : "easeOutQuart",
		
							//Function - Fires when the animation is complete
							onAnimationComplete : null
							
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





