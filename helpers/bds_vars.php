<?php

$band_name = "BIG DADDY SUNSHINE";
$bds_title = $band_name;

#database vars
$dbhost = 'localhost';
$dbuser = 'clane359';
$dbpass = 'FnAlt0169';
$dbname = 'clane_BDS';


$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if($mysqli->connect_errno) {
  die('Database is down, try again in a minute.');
}

$html = ""; 

?>
