<?php
// Start the session
session_start();
?>
<html>

<!-- The 'style' block is basically in-line CSS. -->
<!-- Look at a CSS wiki to understand what each element does.  I'm sure some are not needed. -->

<style>
 .button {
background-color: #1DB954;
border: black;
border-style: solid;
color: white;
padding-top: 20px;
margin: 5px;
text-align: center;
text-shadow: 1px 1px 0px #515151;
font-weight: bold;
position: relative;
line-height: 1;
padding-bottom: 35px;
display: inline-block;
cursor: pointer;
font-family: "Bebas Neue", cursive;
}

#submit{font-family: "Bebas Neue", cursive; width: 250px;}

  .button1 {width: 150px; height: 20px; font-size: 17px; font-family: "Bebas Neue", cursive;}
</style>
<!-- Basically all of this was explained in index.html. -->

<?php include "header.php"; include "spotify/get_songs.php"; include "php/algorithm.php"; include "db/connect_to_db.php";?>


<body style="background-color: #77d94c">
        <div class="row">

                <!-- <div> elements are stacked vertically so this will appear under the last <div>. -->
                <div class="column" style="min-width: 400px; margin: 0 auto;">


                        <!-- '<form action = "result.php">' redirects to result.html upon completion of the action.  In this case, clicking a button. -->

                        <form action = "php/get_random.php">

                                <center>

                                        <!-- Using our special .button class to make the button look a precise way, plus also text centering.  -->
                                        <button class="button button1"><b>Random Song</b></button><br>

                                </center>


                        </form>

                </div>

                <div class="column" style="min-width: 400px; margin: 0 auto;">
                        <center>
                                <?php
                                $html_tag = '';
                                $html_img = '';
                                if ($_SESSION["search"] == ""){
                                        print "<h1>No results found.</h1><br><h1>The algorithm could not find the artist.</h1>";
                                }
                                else{

                                        if ($_SESSION["username"] == ""){
                                                print "<h1>We found: </h1> <h2>{$_SESSION["search"]}</h2>";
                                        }

                                        else{
                                                print "<h1>{$_SESSION["username"]}, we found: </h1> <h2>{$_SESSION["search"]}</h2>";
                                        }
                                }
                                ?>

                                 <?php
                                        $id = get_artist_id($_SESSION['search'], $_SESSION['artist_tracks']) or print("oh no!");
                                        $url = get_artist_image($id[0], $_SESSION['token'])["url"];
                                        $_SESSION['img'] = $url;
                                        $_SESSION['artist_id'] = $id[0];

                                        $dir = "data/profile_pics/placeholder.png";

                                        if ($url != ""){
                                                print "<img src='{$url}' width = '200' height = '200' style = 'border: 5px solid black;'></img>";
                                                }
                                        else{
                                            print "<img src='{$dir}' width = '200' height = '200' style = 'border: 5px solid black;'></img>";
                                        }        
                                    ?>
                                    </center>
                </div>

                <div class="column" style="min-width: 400px; margin: 0 auto;">

                        <form action = "statistics.php">
                                <center>

                                        <!-- Using our special .button class to make the button look a precise way, plus also text centering.  -->
                                        <button class="button button1"><b>Statistics</b></button><br>

                                </center>

                        </form>
                </div>

                 </div>
                 <div id="loading">
                 
  <img id="loading-image" src="media/loading.gif" alt="Loading..." />
                
                </div>
        
                                    <?php
                                                $conn = connect('db/db_credentials.txt');

                                                $dir = "data/profile_pics/placeholder.png";

                                                $sql = "SELECT * FROM Artists WHERE name = ?;";
                                                $stmt = $conn->prepare($sql);
                                                $stmt->bind_param("s", $_SESSION['search']);
                                                $stmt->execute();
                                                $result = $stmt->get_result();
                                                $qry = $result -> fetch_array(MYSQLI_NUM);

                                                if (is_null($qry) == True or $qry[2] == "."){
                                                      
                                                  $temp_stack = get_adjacency_list($_SESSION['all_tracks'], $_SESSION['search']);
                    
                                                  $starting_stack = get_stack();
                                                  $starting_stack = array_slice($starting_stack, 0, 10);
                                                  $bfs_results = bfs($starting_stack);
                    
                                                  $artist_stack = merge_weights($_SESSION['search'], $temp_stack, $bfs_results);
                                                  arsort($artist_stack);
                                                  $artist_keys = array_keys($artist_stack);
                                                  $arr_slice = array_slice($artist_keys, 0, 10);
                                                                                

                                            
                                                                                
                                                  if (is_null($qry) == True){                              
                                                  $sql = "INSERT INTO Artists (name, img, id) VALUES (?, ?, ?);";
                                                  $stmt = $conn->prepare($sql);
                                                              
                                                  $stmt->bind_param("sss", $_SESSION['search'], $_SESSION['img'], $_SESSION['artist_id']);
                                                  $stmt->execute();
                                                  }
                                                  $sql = "UPDATE Artists SET i1 = ?, i2 = ?, i3 = ?, i4 = ?, i5 = ?, i6 = ?, i7 = ?, i8 = ?, i9 = ?, i10 = ?, id = ? WHERE name = ?;";
                                            
                                                  $stmt = $conn->prepare($sql);
                                                  while(count($arr_slice) < 10){
                                                    $arr_slice[] = "NULL";
                                                  }
						  $bad_key = $_SESSION['search'] . ":::" . $_SESSION['search'];
						  $rmv = array_search($bad_key, $arr_slice);
						  if ($rmv === False){}
						  else{
							$arr_slice[$rmv] = "NULL";
						}
					
						  $artist_keys = $arr_slice;
						  $artist_keys = array_diff($artist_keys, array("NULL"));

                                                  $arr_slice[] = $_SESSION['artist_id'];                              
                                                  $arr_slice[] = $_SESSION['search'];
                                                  
                                                  $types = str_repeat("s", count($arr_slice)); 
                                                                                
                                                  $stmt->bind_param($types, ...$arr_slice);
                                                  $stmt->execute();

						  
                                                }
                                                else{
						                                                  
                                                  $artist_keys = array_slice($qry, 2, 10);
                                                  $artist_keys = array_diff($artist_keys, array("NULL"));
                                                }
                                         
                                         if ($_SESSION["search"] != ""){
						

                                                
						if (count($artist_keys) == 0){
                                                    print "<center><h1>No recommendations possible!</h1><br><h1>The algorithm could not find collaborations.</h1></center>";

                                                }

                                                else{
                                                print "<center><h1>Most Similar Artists:</h1></center>";

                                                $i = 0;
                                                
                                                for($k = 1; $k <= 9; $k++){
                                                        
                                                        $base_string = "<form action = 'php/set_artist.php'  id = 'history' method = 'post'>";
                                                        $name = $artist_keys[$k - 1];
                                                        $split_name = explode(":::", $name);

                                                        if (count($split_name) == 2){
                                                            if ($split_name[0] != $split_name[1]){

                                                                $tracks = get_top_artists($split_name[1], $_SESSION['token']);
                                                                $id_artist = get_artist_id($split_name[1], $tracks);
                                                                $top_match = $id_artist[1];

                                                                $art_img = get_artist_image($id_artist[0], $_SESSION['token'])["url"];

                                                                if($art_img == ""){
                                                                  $art_img = $dir;
                                                                }

                                                                 $artist_string = $base_string . "<input type = 'submit' name = 'artist' id = 'submit'  value = '{$split_name[1]}'>";
                                                                 $artist_string = $artist_string . "</form>";
                                                             }
                                                            else{
                                                                
                                                                $k -= 1;
                                                            }
                                                                $html = '';
                                                                /*$totalItemPerLine = 5;
                                                                $totalItem = 9;
                                                                if($i % $totalItemPerLine == 0)
                                                                {
                                                                    $html .= '<div class="row1">'; // OPEN ROW
                                                                }*/
								    $l = $i + 1;

                                                                    $html .= '<div class="row">'.'<div class="column"'.'style="min-width: 400px; margin: 0 auto;">'.'<center>'."<h1>#{$l}</h1><img src='{$art_img}' width = '150' height = '150' style = 'border: 5px solid black;'></img>".$artist_string.'<center>'.'</div>';

                                                                /*if($i % $totalItemPerLine == ($totalItemPerLine-1  ))
                                                                {
                                                                    $html .= '</div>'; // CLOSE ROW
                                                                }*/
                                                                    
                                                                    

                                                                echo $html;
                                                                $i++;
                                                                $html = '';
                                                                
                                                                /*$html_tag .= '<div class="column">' . "<img src='{$art_img}' width = '200' height = '200' style = 'border: 5px solid black;'></img>".$artist_string.'</div>';
                                                                
                                                                echo $html_tag;
                                                                $html_tag = '';
                                                                $html_img = '';*/
                                                                

                                                            }


                                                }
                                             }
                                        }

                                 ?>
                                <script>
                                    document.getElementById("loading").style.visibility = "hidden";
                                </script>
                                    </div>
                                    <br><br><br>
                        
                <!-- <p> just creates a new paragraph or more specifically a body of text. -->

             

        <div><center><p>Wrong artist? Did you enter their name correctly?</p> </center></div>
        <br><br><br>

<?php include "footer.php"; ?>

</body>

</html>
        ?>

