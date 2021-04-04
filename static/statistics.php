<?php
// Start the session
session_start();
?>

<html>
<?php include "header.php"; ?>
<?php include "php/calculate_statistics.php"; ?>
<?php include "../spotify/get_songs.php";?>

<body style="background-color: #77d94c">
   <div class="row">

                <!-- <div> elements are stacked vertically so this will appear under the last <div>. -->

   <div class="column" style="min-width: 400px; margin: 0 auto;">
  	<center>
   	 <h1>Artist Statistics</h1>

          <?php
            print "<h2>Artist Name: {$_SESSION['search']}</h2>"
          ?>

   	 <?php
              

                $id_artist = get_artist_id($_SESSION['search'], $_SESSION['artist_tracks']);
              
                $info = get_artist_info($id_artist[0], $_SESSION['token']);
                
                
                $followers = get_followers($info);
                $collaborations = get_collaborations($_SESSION['artist_tracks']);
                $results = get_song_length($_SESSION['artist_tracks']);
                $number = average_length($results, $_SESSION['artist_tracks']);
                

                print "<h2>Total Followers: {$followers}</h2>";
                print "<h2>Popularity: {$info['popularity']}/100</h2>";
                print "<h2>Total Collaborations: {$collaborations}</h2>";
                print "<h2>Genre: {$info['genres'][0]}</h2>";
                print "<h2>Average Song Length: {$number}</h2>";

         ?>
  	</center>
   </div>
   <div class="column" style="min-width: 400px; margin: 0 auto;">
                  <?php
                  $id = get_artist_id($_SESSION['search'], $_SESSION['artist_tracks']) or die("hi");
                  $url = get_artist_image($id[0], $_SESSION['token'])["url"];
                  if ($url != ""){
                    print "<img src='{$url}' width = '200' height = '200' style = 'border: 5px solid black;'></img>";
                      }
                  ?>
                </div>
              </div>
   <?php
     //$results = get_song_length($_SESSION['artist_tracks']);
     //echo var_dump($results);
   ?>
<?php include "footer.php"; ?>
</body>

</html>
