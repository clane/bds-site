<?php


$table = 'songlist';
$query = "SELECT DISTINCT artist FROM $dbname.$table WHERE status=\"ready_for_live\" ORDER BY artist";
$artist_array = array();
$result = $conn->query($query);

if($result->num_rows > 0) {
	while($row = mysqli_fetch_assoc($result)){ 
		$artist  =  $row['artist'];
    	array_push($artist_array, $artist);
	}
}

  
$last_artist = end($artist_array);
  
$html .=  "<p id=\"artists\">";  
  
foreach($artist_array as $artist) {
	if(strcmp($artist,$last_artist) != 0){
    	$html .=  $artist.",&nbsp;";
    } else {
       $html .=  "and $artist.";
    }
}
  
	$html .= "</p>";

?>
