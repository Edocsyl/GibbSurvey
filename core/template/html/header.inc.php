<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $this->_config['title']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $this->_config['description']; ?>">
    <meta name="author" content="<?php echo $this->_config['author']; ?>">

    <!-- Le styles -->
    <link href="<?php echo $this->_config['css']; ?>/bootstrap.css" rel="stylesheet">

    <!-- Le styles -->
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }
      
	  .container-narrow {
	    margin: 0 auto;
	    max-width: 800px;
	    margin-bottom: 50px;
	    padding: 10px 10px 10px;
	    background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
	}
	
	.jumbotron {
	    margin: 60px 0;
	    text-align: center;
	}

    </style>


    <link href="<?php echo $this->_config['css']; ?>/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo $this->_config['css']; ?>/nprogress.css" rel="stylesheet">
    <link href="<?php echo $this->_config['css']; ?>/style.css" rel="stylesheet">
	<link href="<?php echo $this->_config['js']; ?>/prettyCheckable/prettyCheckable.css" rel="stylesheet">

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="ico/favicon.png">
  </head>
    <body>
	<div class="container-narrow">
	<div class="masthead">
	        <ul class="nav nav-pills pull-right">
	        <?php if($this->isLoggedIn() == false) { ?>
	        	
	          <li class=""><a href="<?php echo $this->_config['basepath']; ?>/">Home</a></li>
	          <li class=""><a href="<?php echo $this->_config['basepath']; ?>/about">&Uuml;ber uns</a></li>
	          <li class=""><a href="<?php echo $this->_config['basepath']; ?>/register">Registrieren</a></li>
	          <li class=""><a href="<?php echo $this->_config['basepath']; ?>/login">Login</a></li>
	          
	          
	          <?php } else {?>
	          
	          <li class=""><a href="<?php echo $this->_config['basepath']; ?>/surveys">Umfragen</a></li>
	          <li class=""><a href="<?php echo $this->_config['basepath']; ?>/profile">Profil</a></li>
	          <li class=""><a href="<?php echo $this->_config['basepath']; ?>/logout">Logout</a></li>
	          
	          <?php }?>
	        </ul>
	        <h3 class="muted"><?php echo $this->_config['title']; ?></h3>
	      </div>
	      <hr>