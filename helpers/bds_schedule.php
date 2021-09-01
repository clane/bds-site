<?php

$table1 = "gigs";
$query1 = "SELECT * FROM $dbname.$table1 WHERE date >= curdate() ORDER BY date ASC";  
$result1 = $conn->query($query1); 
var_dump($result1->num_rows);
while ($row1 = $result1->fetch_assoc()) {

 	$gig_id =  $row1['id'];

	if($gig_id){   
    	$query2 = "SELECT Year(date),Month(date),Day(date),DayOfWeek(date),start_time,venue_id,description FROM $dbname.$table1 WHERE id = $gig_id";
		$result2 = $conn->query($query2); 
		while ($row2 = $result2->fetch_assoc()) {
        	$year  =  $row2['Year(date)'];
        	$month  =  $row2['Month(date)'];
        	$day  = $row2['Day(date)'];
        	$day_of_week  = $row2['DayOfWeek(date)'];
        	$start_time = $row2['start_time'];
        	$venue_id = $row2['venue_id'];
        	$description = $row2['description'];
		}

  		$table2 = "venues";
        $query2 = "SELECT venue_name,street_address,city,state,zip,phone,url FROM $dbname.$table2 WHERE id = $venue_id";
		$result2 = $conn->query($query2); 
		while ($row2 = $result2->fetch_assoc()) {
			$venue_name = $row2['venue_name'];
			$street_address = $row2['street_address'];
			$city = $row2['city'];
			$state = $row2['state'];
			$zip = $row2['zip'];
			$phone = $row2['phone'];
			$url = $row2['url'];
         } 
			$daystrings[0] = "Sunday";
			$daystrings[1] = "Monday";
			$daystrings[2] = "Tuesday";
			$daystrings[3] = "Wednesday";
			$daystrings[4] = "Thursday";
			$daystrings[5] = "Friday";
			$daystrings[6] = "Saturday";

			if($day){
			   $html .= "<table>";
			   $html .= "<tr>";
			   $html .= "<td class=\"dateTime\">";
			   $html .= $daystrings[$day_of_week - 1]."&nbsp;";
			   $html .= $month."/".$day."/".$year;
			   $html .= "&nbsp;@&nbsp;";

			}

			$am_or_pm = "AM";

			if($hour > 12) {
				$hour -= 12;
				$am_or_pm = "PM"; 
			}

			$start_time = "$hour:$minute $am_or_pm";
			$html .= $start_time;
			$html .= "</td>";
			$html .= "</tr>";
			$html .= "<tr>";
			$html .= "<td class=\"venuename\">";
			$html .= $venue_name;
			$html .= "</td>";
			$html .= "</tr>";
			$html .= "</table>";

		}//END if($id)


}//END while ($row1 = $result1->fetch_assoc())


?>
