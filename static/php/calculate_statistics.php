<?php
session_start();
?>

<?php

   $tracks = $_SESSION['artist_tracks'];
   function get_song_length($tracks){
       $lengths = array();
       foreach($tracks as $track){
           $length = $track["duration_ms"]/1000;
           $lengths[] = floatval($length);
       }
       return $lengths;
   }

?>
