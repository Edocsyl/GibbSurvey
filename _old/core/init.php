<?php

/**
* @author Kaj Bossard <kaj@edocsyl.ch>
* @version 0.1
* @category Init file
* @copyright Copyright (c) 2013, Edocsyl
*/

session_start();

date_default_timezone_set('Europe/Zurich');

//config
require 'config/cg_db.php';
require 'config/cg_global.php';

//controller
require 'controller/cr_database.php';

//model
require 'model/ml_querys.php';
require 'model/ml_html.php';
require 'model/ml_config.php';
require 'model/ml_navigation.php';


$cd = new cr_database($cg_db);

$mq = new ml_querys($cd);


$mc = new ml_config($cg_global);

$mh = new ml_html($mc);


$mn = new ml_navigation($mh, (isset($_GET['page']) ? $_GET['page'] : null), (isset($_GET['param1']) ? $_GET['param1'] : null), (isset($_GET['param2']) ? $_GET['param2'] : null)); //(isset($_GET['param1']) ? $_GET['param1'] : null)

?>