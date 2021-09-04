<?php

require('./helpers/bds_vars.php');
require('./helpers/top.php');

require('./helpers/bds_header.php'); 

	
$html .= "<h2>Upcoming Shows</h2>";
require('helpers/bds_schedule.php');

$html .= "<h2>Artists We Cover</h2>";
require('helpers/bds_artists.php');




$html .= "</body>"; 
$html .= "</html>"; 

print $html;

?>
