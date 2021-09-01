<?php
  include('bds_vars.php');
  $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
  $table1 = 'gigs';
  mysql_select_db($dbname);
  $query = "SELECT count(id) FROM $table1 WHERE date < curdate()";
  $result = mysql_query($query);

  $row = mysql_fetch_assoc($result);

$cnt = $row["count(id)"] - 1;

  print "<p>BDS has played <span class=\"showCount\">$cnt</span> shows.</p>";

  $query = "SELECT id FROM $table1 WHERE date < curdate() ORDER BY date ASC";
  print "<ol id=\"past_shows\">";
  if ($r = mysql_query ($query)) {
    while($row = mysql_fetch_array($r)){
      $id  =  "{$row['id']}";
      $query = "SELECT Month(date),Day(date),Year(date),venue_id FROM $table1 WHERE id = $id";
      $result = mysql_query($query);

      while($row = mysql_fetch_assoc($result)) {
        $month  =  "{$row['Month(date)']}";
        $day  =  "{$row['Day(date)']}";
        $year  =  "{$row['Year(date)']}";
        $venue_id =  "{$row['venue_id']}";
      } 
         
      $table2 = "venues";
      $query = "SELECT venue_name FROM $table2 WHERE id = $venue_id";
      $result = mysql_query($query);

      while($row = mysql_fetch_assoc($result)) {
        $venue_name  =  "{$row['venue_name']}";
      } 

      if($day){
        print "<li class=\"past_shows_item\">";
        print "<span class=\"past_shows_date\">";
        print $month."/".$day."/".$year;
        print "</span>";
        print "&nbsp;-&nbsp;";
        print $venue_name;
        print "</li>";
      }#end if day
    }
  }
  mysql_close();
  print "</ol>";
?>
