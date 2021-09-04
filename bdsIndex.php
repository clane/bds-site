<?php

require('./helpers/bds_vars.php');
require('./helpers/top.php');


	
$html .= "<h2>Upcoming Shows</h2>";
require('./helpers/bds_header.php'); 

require('helpers/bds_schedule.php');
//require('helpers/bds_artists.php');


//require('./helpers/bds_footer.php');


$html .= "</body>"; 
$html .= "</html>"; 

print $html;

?>
