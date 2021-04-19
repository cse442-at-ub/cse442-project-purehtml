<?php
// Start the session
session_start();
?>

<html>

<?php include "header.php"; ?>

<body style="background-color: #77d94c">

  <div>
       <center>
       <h1>Popular Searches</h1>
       </center>

  </div>

  <?php

  $wpsData = file_get_contents("data/wps.json");
  $temp = json_decode($wpsData);
  $counted = array_count_values($temp);
  $sorted = arsort($counted);

  if (count(array_keys($counted)) == 0 && !$sorted){
      print "<h3>No searches have been made yet!</h3>";

  }

  else{
  print "<center><h3>Top 10 Most Searched Artists:</h3>";
  $artist_keys = array_keys($counted);
  for($k = 1; $k <= 10; $k++)
  {
        $base_string = "<form action = 'php/set_artist.php'  id = 'history' method = 'post'>";
        $name = $artist_keys[$k - 1];
        $artist_string = $base_string . "<input type = 'submit' name = 'artist' id = 'submit'  value = '$name'>";
        $artist_string = $artist_string . "</form>";
        print $artist_string;

  }
  print "</center>";

  }









  ?>



<?php include "footer.php"; ?>


</body>
</html>
