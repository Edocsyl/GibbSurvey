<?php

require 'umfrage.class.php';

$u = new umfrage('u_umfragen.dat');

echo '<pre>';
print_r($u->rUmfragen());
echo '</pre>';



//$u->wUmfrageRecord("asdasdasd");

?>