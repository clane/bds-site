<?php

require('./helpers/bds_vars.php');
require('./helpers/top.php');

require('./helpers/bds_header.php'); 

$html .= "<h2>About Us</h2>";
$html .= "<p>We've been performing songs by our favorite artists since 2006 and each member has been vaccinated. This makes us a great choice for your next event. For booking, contact John at jkane49@hotmail.com or (650) 333-8014.</p>";
	
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
