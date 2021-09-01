<?php

$html = "";
$query = "SELECT * FROM $dbname.gigs WHERE date >= curdate() ORDER BY date ASC";
//$query = "SELECT * FROM $dbname.gigs";

//var_dump($query); 

$result = $conn->query($query);

var_dump($result);

if ($result->num_rows > 0) {
  while($row = mysqli_fetch_assoc($result)){ 
	//var_dump($row);
	$html .= "<dl>";

	$html .= "<dt>";
	$html .= "Event Name";
	$html .= "</dt>";
	$html .= "<dd>";
	$html .= $row['event_name']; 
	$html .= "</dd>";

	$html .= "<dt>";
	$html .= "Date";
	$html .= "</dt>";
	$html .= "<dd>";
	$html .= $row['date']; 
	$html .= "</dd>";

	$html .= "<dt>";
	$html .= "</dt>";
	$html .= "<dd>";
	$html .= "</dd>";


	$html .= "</dl>";
	
  } 
} 

print $html;



?>
