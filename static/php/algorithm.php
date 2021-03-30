<?php
session_start();
?>
<?php

function get_stack(){

    $all_tracks = $_SESSION['all_tracks'];
    $input = $_SESSION['search'];
    $artist_stack = array();
    foreach($all_tracks as $track){
        foreach($track['artists'] as $artist){
                if (in_array($artist['name'], $artist_stack) == False and ($artist['name'] == $input) == False){
                        $artist_stack[] = $artist['name'];
                 }
       }

    }
  
    return $artist_stack;
  
}

?>



