<?php 

//print_r($_POST);

?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Umfrage | $NAME </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Le styles -->
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 450px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      
      
      
      .form-signin select,
      .form-signin input[type="text"],
      .form-signin input[type="email"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
	select {
		width: 147px;
	}
    </style>


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

      <form class="form-signin"  method="post">
        <h2 class="form-signin-heading">Willkommen bei GibbSurvey</h2><p class="lead">Um die Umfrage zu starten, bitten wir Sie sich zu registrieren.</p>
        <input type="text" name="name" class="input-block-level" placeholder="Max Muster">
        <input type="email" name="email" id="email" class="input-block-level" placeholder="info.von.mail@domain.ch" required>
        <input type="password" name="password" class="input-block-level" placeholder="Passwort" required>
        <input type="password" name="password2" class="input-block-level" placeholder="Passwort wiederholen" required>
        <div class="control-group">
        
        <select name="tag">
		<option>1</option>
		<option>2</option>
		<option>3</option>
		<option>4</option>
		<option>5</option>
		<option>6</option>
		<option>7</option>
		<option>8</option>
		<option>9</option>
		<option>10</option>
		<option>11</option>
		<option>12</option>
		<option>13</option>
		<option>14</option>
		<option>15</option>
		<option>16</option>
		<option>17</option>
		<option>18</option>
		<option>19</option>
		<option>20</option>
		<option>21</option>
		<option>22</option>
		<option>23</option>
		<option>24</option>
		<option>25</option>
		<option>26</option>
		<option>27</option>
		<option>28</option>
		<option>29</option>
		<option>30</option>
		<option>31</option>
		</select>
		<select name="monat">
		<option>Januar</option>
		<option>Februar</option>
		<option>M&auml;rz</option>
		<option>April</option>
		<option>Mail</option>
		<option>Juni</option>
		<option>Juli</option>
		<option>August</option>
		<option>September</option>
		<option>Oktober</option>
		<option>November</option>
		<option>Dezember</option>
		</select>
		<select name="jahr">
		<option>1965</option><option>1966</option><option>1967</option><option>1968</option><option>1969</option><option>1970</option><option>1971</option><option>1972</option><option>1973</option><option>1974</option><option>1975</option><option>1976</option><option>1977</option><option>1978</option><option>1979</option><option>1980</option><option>1981</option><option>1982</option><option>1983</option><option>1984</option><option>1985</option><option>1986</option><option>1987</option><option>1988</option><option>1989</option><option>1990</option><option>1991</option><option>1992</option><option>1993</option><option>1994</option><option>1995</option><option>1996</option><option>1997</option><option>1998</option><option>1999</option><option>2000</option><option>2001</option><option>2002</option><option>2003</option><option>2004</option><option>2005</option><option>2006</option><option>2007</option><option>2008</option><option>2009</option><option>2010</option><option>2011</option><option>2012</option><option>2013</option>
		</select>
		
		</div>
		<div class="control-group">
        <select name="geschlecht">
		<option>Geschlecht</option>
		<option>Weiblich</option>
		<option>M&auml;nnlich</option>
		</select>
		</div>
        
        <button class="btn btn-large btn-primary" type="submit">Registrieren</button>
        <div class="control-group">
        <br />
         <p>Falls Sie bereits bei GibbSurvey angemeldet sind, <a href="/login">hier</a> klicken.</p>
         </div>
      </form>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap-maxlength.js"></script>
    <script src="js/nprogress.js"></script>
    <script src="js/prettyCheckable/prettyCheckable.js"></script>

  </body>
</html>
