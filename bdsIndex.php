<?php

require('./helpers/bds_vars.php');
require('./helpers/top.php');

require('./helpers/bds_header.php'); 

	
$html .= "<h2>Upcoming Shows</h2>";
require('helpers/bds_schedule.php');

$html .= "<h2>Find us on Facebook</h2>";
$html .= "<a href=\"https://www.facebook.com/bigdaddysunshine\">https://www.facebook.com/bigdaddysunshine</a>";
$html .= "<h2>Artists We Cover</h2>";
require('helpers/bds_artists.php');


$html .= "<h2>Past Shows</h2>";
require('helpers/bds_past_shows.php');


require('helpers/bds_footer.php');


print $html;

?>
