<?php
require 'umfrage.class.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Umfrage | $NAME </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/nprogress.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="js/prettyCheckable/prettyCheckable.css" rel="stylesheet">

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="ico/favicon.png">
  </head>

  <body>

    <div class="container">
	<span class="span8">
	
	<form action="" method="POST">
	
	<div class="page-header">
          <h1>$UMFRAGE_NAME</h1>
        </div>
		<p class="lead">$UMFRAGE_BESCHREIBUNG</p>
		<hr>
		
		<div class="row">
		<div class="span4">
		<h3>$FRAGE_KATEGORIE</h3>
		</div>
		</div>
		
		<div class="row">
		<div class="span3">
		<strong># $FRAGE_NUMMER</strong> $FRAGE
		</div>
		<div class="span4">
			<input type="radio" class="umfrage" value="yes" id="1" name="1" data-label="0%"/>
			<input type="radio" class="umfrage" value="yes" id="1" name="1" data-label="25%"/>
			<input type="radio" class="umfrage" value="yes" id="1" name="1" data-label="75%"/>
			<input type="radio" class="umfrage" value="yes" id="1" name="1" data-label="100%"/>
		</div>
		</div>
		<hr>
		
		<div class="row">
		<div class="span3">
		<strong># $FRAGE_NUMMER</strong> $FRAGE
		</div>
		<div class="span4">
			<input type="radio" class="umfrage" value="yes" id="2" name="2" data-label="0%"/>
			<input type="radio" class="umfrage" value="yes" id="2" name="2" data-label="25%"/>
			<input type="radio" class="umfrage" value="yes" id="2" name="2" data-label="75%"/>
			<input type="radio" class="umfrage" value="yes" id="2" name="2" data-label="100%"/>
		</div>
		</div>
		<hr>

		
		<div class="controls">
		<button href="#submitSurvey" type="submit" data-toggle="modal" class="btn btn-primary input-medium pull-right">Umfrage beenden</button>
		</div>
		
		
		<div id="submitSurvey" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&#x2716;</button>
				<h3 id="myModalLabel">Umfrage beenden</h3>
			</div>
			<div class="modal-body">
				<input type="email" name="email" placeholder="E-Mail Adresse">
				<input type="text" name="name" placeholder="Name">

			</div>
			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Schliessen</button>
				<button class="btn btn-primary" type="submit">Umfrage beenden</button>
			</div>
		</div>
	</form>
	</span>
    </div> <!-- /container -->
	
	
	
	
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap-maxlength.js"></script>
    <script src="js/nprogress.js"></script>
    <script src="js/prettyCheckable/prettyCheckable.js"></script>
    <script>
	$().ready(function(){
		
		$('textarea#message').maxlength({
			threshold: 40
		});
	
		$('input.umfrage').prettyCheckable();
	});
	
    //NProgress.start();
	</script>
  </body>
</html>
