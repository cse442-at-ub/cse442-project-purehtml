<?php
session_start();
?>
<?php
//include "db/connect_to_db.php";

//$conn = connect('db/db_credentials.txt');

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
            

            $conn = connect('db/db_credentials.txt');
            
	    
            $all_tracks = array_slice($all_tracks, 0, 20);
            $artist_stack = array();
            $artist_weights = array();
            $genre_weights = array();
            foreach($all_tracks as $track){
                $lead_artist = $track['artists'][0]['name'];
                $artists_genre = get_artist_info($track['artists'][0]['id'], $_SESSION['token'])['genres'];
                
                if ($lead_artist == $input){
                foreach($track['artists'] as $artist){
                        $artist_tuple = $input .  ':::' . $artist['name'];
                      
                        if (($artist['name'] != $input)){
                                   
                             if (in_array(strtolower($artist['name']), $artist_stack) == False){
                                $artist_stack[] = strtolower($artist['name']);
                                $artist_weights[$artist_tuple] = 0;
                               }
			       	       
                               $temp_info = get_artist_info($artist['id'], $_SESSION['token']);
			       $sql = "SELECT * FROM Artists WHERE name = ?;";
              			
			       $stmt = $conn -> prepare($sql);
                               
                               
                               $stmt->bind_param("s", $temp_info['name']);
                               
			
                               $stmt->execute();
                               $result = $stmt->get_result();
                               $qry = $result->fetch_array(MYSQLI_NUM);
                               
                               if (is_null($qry) == True){
			 	 $sql = "INSERT INTO Artists (name, img) VALUES (?, ?);";
				 $stmt = $conn->prepare($sql);
                                 $stmt->bind_param("ss", $temp_info['name'], $temp_info['images'][0]['url']);
                                 $stmt->execute();
                               }
			       
                               $temp_genre = $temp_info['genres'];
			       
                               foreach($temp_genre as $genre){
                                   if(in_array(strtolower($artist_tuple), $genre_weights)){
                                    $genre_weights[$artist_tuple] = 1;
                                   }

                                    if (in_array($genre, $artists_genre)){
                                        $genre_weights[$artist_tuple] += 1;
                                            }

                             $artist_weights[$artist_tuple] += 1;
                         }
               }
              }
            }
          }
          //print var_dump($genre_weights);
            foreach($artist_weights[$artist_tuple] as $key){
              $artist_weights[$key] *= $genre_weights[$key];
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
              if (empty($temp_weights) == False){
              foreach($temp_keys as $key){
              $split_weight = explode(":::", $key);

              $new_weight = $input . ":::" . $split_weight[1];

              if (in_array(strtolower($new_weight), $other_keys) == False){

                    $final_weights[$new_weight] = 0;
              }
              $final_weights[$new_weight] += 1;
              }
              }
              else{
               $rkey = $input . ":::" . $tkey;
               unset($final_weights[$rkey]);
             }

         }

        return $final_weights;

    }




 ?>
