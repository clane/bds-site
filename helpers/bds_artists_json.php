<?php

#database vars
$dbhost = 'localhost';
$dbuser = 'clane359';
$dbpass = 'FnAlt0169';
$dbname = 'clane_BDS';

//Create database connection
  $dblink = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

//Check connection was successful
  if ($dblink->connect_errno) {
     printf("Failed to connect to database");
     exit();
  }

 $table = 'songlist';
  $result = $dblink->query("SELECT DISTINCT artist FROM $table WHERE status=\"ready_for_live\"  ORDER BY artist");

//Initialize array variable
  $dbdata = array();

//Fetch into associative array
  while ( $row = $result->fetch_assoc())  {
	$dbdata[]=$row;
  }

//Print array in JSON format
 echo json_encode($dbdata);
 
?>


