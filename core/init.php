<?php

/**
 * @author Kaj Bossard <kaj@edocsyl.ch>
 * @version 0.1
 * @category Init file
 * @copyright Copyright (c) 2013, gigaIT
 */

session_start();

date_default_timezone_set('Europe/Zurich');


//Include

require 'functions/config.php';
require 'functions/database.php';
require 'functions/querys.php';
require 'functions/navigation.php';

$q = new Querys($config['database']);

$n = new Navigation($config, (isset($_GET['page']) ? $_GET['page'] : null), (isset($_GET['param1']) ? $_GET['param1'] : null), (isset($_GET['param2']) ? $_GET['param2'] : null));

?>