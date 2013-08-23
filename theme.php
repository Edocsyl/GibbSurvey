<?php
require 'umfrage.class.php';
$u = new umfrage('u_umfragen.dat');
$umfragen = $u->rUmfragen();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Umfrage | <?php echo '#'.$umfragen[0]['id'] . ' ' . $umfragen[0]['titel'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
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
	<div class="page-header">
          <h1><?php echo '#'.$umfragen[0]['id'] . ' ' . $umfragen[0]['titel'] ?></h1>
        </div>
		<p class="lead"><?php echo $umfragen[0]['beschreibung'] ?></p>
		<hr>
		
		<?php
			$i = 1;
			foreach($umfragen[0]['fragen'] as $frage){
		?>
		
		<div class="row">
		<div class="span3">
		<strong>#<?php echo $i ?></strong> <?php echo $frage ?>
		</div>
		<div class="span3">
		 <textarea id="message" name="message" class="span5" placeholder="Ihre Antwort" rows="3" maxlength="190"></textarea>
		</div>
		</div>
		<hr>
		
		<?php
			$i++;
			}
		?>
		
		<div class="row">
		<div class="span3">
		<strong>#300</strong> Was frage..
		</div>
		<div class="span3">
		 <input type="checkbox" class="myClass" value="yes" id="answer" name="answer" data-label="Facebook"/>
		 <input type="checkbox" class="myClass" value="yes" id="answer" name="answer" data-label="Google+"/>
		 <input type="checkbox" class="myClass" value="yes" id="answer" name="answer" data-label="Netlog"/>
		 <input type="checkbox" class="myClass" value="yes" id="answer" name="answer" data-label="Lovoo"/>
			
		</div>
		</div>
		<hr>
		
		<div class="controls">
		<button href="#submitSurvey" type="submit" data-toggle="modal" class="btn btn-primary input-medium pull-right">Weiter</button>
		</div>
	</span>
    </div> <!-- /container -->
	
	
	
	<div id="submitSurvey" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&#x2716;</button>
			<h3 id="myModalLabel">Umfrage beenden</h3>
		</div>
		<div class="modal-body">
			<p>
			<input id="name" name="name" type="text" class="span3" placeholder="Ihr Name">
			<input id="email" name="email" type="email" class="span3" placeholder="Ihre E-Mail Adresse">
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Schliessen</button>
			<button class="btn btn-primary">Umfrage beenden</button>
		</div>
	</div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap-maxlength.js"></script>
    <script src="js/prettyCheckable/prettyCheckable.js"></script>
    <script>
	
	
	$().ready(function(){
		
		$('textarea#message').maxlength({
		threshold: 40
		});
	
		$('input.myClass').prettyCheckable();
		
	});
	</script>
  </body>
</html>
