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

                             if (in_array(strtolower($artist['name']), $artist_stack) == False){
                                $artist_stack[] = strtolower($artist['name']);
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

       function merge_weights($input, $weights_1, $weights_2){
                $keys = array_keys($weights_2);
                $other_keys = array_keys($weights_1);
                $final_weights = $weights_1;
                foreach($keys as $tkey){
                     $temp_weights = $weights_2[$tkey];
                     $temp_keys = array_keys($temp_weights);

                     foreach($temp_keys as $key){
                     $split_weight = explode(":::", $key);

                     $new_weight = $input . ":::" . $split_weight[1];

                     if (in_array(strtolower($new_weight), $other_keys) == False){

                           $final_weights[$new_weight] = 0;
                     }
                     $final_weights[$new_weight] += 1;
                     }

                }

               return $final_weights;

           }



 ?>
