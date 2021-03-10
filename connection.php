<?php

$dbhost = "dijkstra.ug.bcc.bilkent.edu.tr:3306";
$dbuser = "bora.cun";
$dbpass = "DPZ3a7Km";
$dbname = "bora_cun";

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
{
    die("Failed to connect.");
}

?>