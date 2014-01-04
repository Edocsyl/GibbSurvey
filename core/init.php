<?php

/**
 * @author Kaj Bossard <kaj@edocsyl.ch>
 * @version 1.0
 * @category Init file
 * @copyright Copyright (c) 2014, gigaIT.net
 */

session_start();
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set('Europe/Zurich');

/**
 * Include Application files
 */
require 'functions/config.php';
require 'functions/database.php';
require 'functions/functions.php';
require 'functions/querys.php';
require 'functions/navigation.php';


/**
 * Create instance of the application
 */
$n = new Navigation($config, (isset($_GET['page']) ? $_GET['page'] : null), (isset($_GET['param1']) ? $_GET['param1'] : null), (isset($_GET['param2']) ? $_GET['param2'] : null), (isset($_GET['param3']) ? $_GET['param3'] : null), $_POST);

?>