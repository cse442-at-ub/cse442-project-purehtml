<?php
session_start();
?>
<?php

       function get_stack(){

            $all_tracks = $_SESSION['all_tracks'];
            $input = $_SESSION['search'];
            $artist_stack = array();
            $artist_weights = array();
            foreach($all_tracks as $track){
                foreach($track['artists'] as $artist){
                        if (($artist['name'] == $input) == False){
                             if (in_array($artist['name'], $artist_stack) == False){
                                $artist_stack[] = $artist['name'];
                               }
                         }

               }

            }
            return $artist_stack;
       }

       function get_adjacency_list($all_tracks, $input){
            $artist_stack = array();
            $artist_weights = array();
            foreach($all_tracks as $track){
                foreach($track['artists'] as $artist){
                        $artist_tuple = $input .  ':::' . $artist['name'];
                        if (($artist['name'] != $input)){

                             if (in_array($artist['name'], $artist_stack) == False){
                                $artist_stack[] = $artist['name'];
                                $artist_weights[$artist_tuple] = 0;
                               }

                             $artist_weights[$artist_tuple] += 1;
                         }
               }
            }
            arsort($artist_weights);
            return $artist_weights;
        }

 ?>
