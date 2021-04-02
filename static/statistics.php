<?php
// Start the session
session_start();
?>

<html>
<?php include "header.php"; ?>
<?php include "php/calculate_statistics.php"; ?>

<body style="background-color: #77d94c">
   <div>
  	<center>
   	 <h1>Artist Statistics</h1>

          <?php
            print "<h2>Artist Name: {$_SESSION['search']}</h2>"
          ?>

   	 <?php
                $info = get_artist_info($_SESSION['artist_id'], $_SESSION['token']);
                $followers = get_followers($info);
                $collaborations = get_collaborations($_SESSION['artist_tracks']);

                print "<h2>Total Followers: {$followers}</h2>";
                print "<h2>Popularity: {$info['popularity']}/100</h2>";
                print "<h2>Total Collaborations: {$collaborations}</h2>";
                print "<h2>Genre: {$info['genres'][0]}</h2>";

         ?>
  	</center>
   </div>
   
   <?php
     $results = get_song_length($_SESSION['artist_tracks']);
     echo var_dump($results);
   ?>
<?php include "footer.php"; ?>
</body>

</html>
