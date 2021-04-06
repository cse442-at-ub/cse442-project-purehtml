
<?php
session_start();
?>
<?php

//include "../../spotify/get_songs.php";

       function get_stack(){

            $all_tracks = $_SESSION['all_tracks'];
            $input = $_SESSION['search'];
            $artist_stack = array($input);
            $artist_weights = array();
            foreach($all_tracks as $track){
                $lead_artist = $track['artists'][0]['name'];
                if ($lead_artist == $input){
                foreach($track['artists'] as $artist){
                        if (($artist['name'] == $input) == False){
                             if (in_array($artist['name'], $artist_stack) == False){
                                $artist_stack[] = $artist['id'];
                               }
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
                $lead_artist = $track['artists'][0]['name'];
                if ($lead_artist == $input){
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
            }
            arsort($artist_weights);
            return $artist_weights;
        }

     function bfs($stack){
        $popped = array($stack[0]);
        array_shift($stack);
        $token = $_SESSION['token'];
        $weights = array();

        while (sizeof($stack) > 0){
            $head =  $stack[0];
            $popped[] = $head;
            array_shift($stack);

            $info = get_artist_info($head, $token);
            $tracks = get_all_tracks(get_all_albums($info['id'], $token), $token);
            if (sizeof($tracks) > 0){
            $new_list = get_adjacency_list($tracks, $info['name']);

            $weights[$info['name']] = $new_list;
            }



        }

       return $weights;
    }


 ?>
