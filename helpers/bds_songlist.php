<?php
  include('bds_vars.php');
  $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
  $table = 'songlist';
  mysql_select_db($dbname);
  #$query = "SELECT artist, title FROM $table ORDER BY artist";
  $query = "SELECT artist, title, audio_file FROM $table WHERE status = 'ready_for_live' ORDER BY artist";
  print "<ol id=\"songlist\">";    
  if ($r = mysql_query ($query)) {
    while($row = mysql_fetch_array($r)){
      $artist  =  "{$row['artist']}";
      $title  =  "{$row['title']}";
      $audio_file  =  "{$row['audio_file']}";
	  $audio_dir = "./liveRecordings/";
	  $audio_url = $audio_dir . $audio_file;
      print "<li class=\"songlist_item\">";
      print "<span class=\"artist_name\">$artist</span>";
      print "<span> - $title</span>";
	  if($audio_file){
		  print "&nbsp;";
		  print "<audio controls preload=\"auto\">";
		  print "<source src=\"$audio_url\">";
		  print "</audio>";
      }
      print "</li>";
    }
  }
  mysql_close();
  print "</ol>";
?>
