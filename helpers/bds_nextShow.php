<?php
  include('bds_vars.php');
  $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
  $table1 = 'gigs';
  mysqli_select_db($dbname);
  
  $query = "SELECT id FROM gigs WHERE date >= curdate() ORDER BY date ASC limit 1";

  $r = mysql_query($query);

  //no shows check
  $r1 = mysql_query($query);
  if(!mysqli_fetch_array($r1)){
    print "<p>No upcoming shows but check back soon!</p>"; 
  }
    print"<h1>Come see Chris's band!</h1>";
    #print "<h1>Big Daddy Sunshine's next show</h1>";
    print "<ul>";
    
    while($row = mysqli_fetch_array($r)){
      $id  =  "{$row['id']}";
      if($id){   
         $query = "SELECT Year(date),Month(date),Day(date),DayOfWeek(date),start_time,venue_id,description FROM $table1 WHERE id = $id";
         $result = mysqli_query($query);

         while($row = mysqli_fetch_assoc($result)) {
           $year  =  "{$row['Year(date)']}";
           $month  =  "{$row['Month(date)']}";
           $day  =  "{$row['Day(date)']}";
           $day_of_week  =  "{$row['DayOfWeek(date)']}";
           $start_time =  "{$row['start_time']}";
           $venue_id =  "{$row['venue_id']}";
           $description =  "{$row['description']}";
           
         } 
         
         $table2 = "venues";
         $query = "SELECT venue_name, street_address,city,state,zip,phone,url FROM $table2 WHERE id = $venue_id";
         $result = mysqli_query($query);

         while($row = mysqli_fetch_assoc($result)) {
           $venue_name  =  "{$row['venue_name']}";
           $street_address = "{$row['street_address']}";
           $city = "{$row['city']}";
           $state = "{$row['state']}";
           $zip = "{$row['zip']}";
           $phone = "{$row['phone']}";
           $url = "{$row['url']}";
         } 
         

         $daystrings[0] = "Sunday";
         $daystrings[1] = "Monday";
         $daystrings[2] = "Tuesday";
         $daystrings[3] = "Wednesday";
         $daystrings[4] = "Thursday";
         $daystrings[5] = "Friday";
         $daystrings[6] = "Saturday";

        if($day){
           print "<li class=\"schedule_list_item\">";
           print "<table>";
		   print "<tr>";
		   print "<td class=\"dateTime\">";
           print $daystrings[$day_of_week - 1]."&nbsp;";
           print $month."/".$day."/".$year;
           print "&nbsp;@&nbsp;";
           
           #format start time
           list($hour,$minute) = split(":", $start_time);
           $am_or_pm = "AM";
           if($hour > 12) {
             $hour -= 12;
             $am_or_pm = "PM"; 
           }
           $start_time = "$hour:$minute $am_or_pm";
           print $start_time;
		   print "</td>";
		   print "</tr>";
		   print "<tr>";
		   print "<td class=\"venuename\">";
           print $venue_name;
		   print "</td>";
		   print "</tr>";

           if($url){
			   print "<tr>";
			   print "<td class=\"venuename\">";
               print "<a href=\"". $url . "\">";
			   print $url;
               print "</a>";
			   print "</td>";
			   print "</tr>";
           }

		   print "<tr>";
		   print "<td>";
           print $street_address;
		   print "</td>";
		   print "</tr>";
		   print "<tr>";
		   print "<td>";
           print $city;
		   print "&nbsp;";
           print $state;
		   print "&nbsp;";
           print $zip;
		   print "</td>";
		   print "</tr>";
 		   print "<tr>";
		   print "<td>";
           print $phone;
		   print "</td>";
		   print "</tr>";
           print "</table>";
           print "</li>";

        }  
      }  else { print "test"; }  
  
    } 


  print "</ul>";

  
  print "<p>See bigdaddysunshine.com for more information</p>";
  mysqli_close();
?>
