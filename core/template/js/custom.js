$(function () {
	$('#umfragen a:first').tab('show');
})

var fragen = 3;

$("a[name='addQuestion']").click(function() {
	fragen++;
	$("div[name='fragen']").append("<input type=\"text\" name=\"frage_"+fragen+"\" class=\"input-block-level\" placeholder=\"Frage "+fragen+"\" required>");
});

