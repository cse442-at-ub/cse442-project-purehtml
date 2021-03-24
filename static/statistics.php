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

   	 <h2>Monthly Listeners:</h2>
   	 <h2>Genre:</h2>
  	</center>
   </div>
   
   <?php
     $results = get_song_length($_SESSION['artist_tracks']);
     echo var_dump($results);
   ?>
<?php include "footer.php"; ?>
</body>

</html>
