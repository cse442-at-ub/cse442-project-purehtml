<?php
// Start the session
session_start();
?>

<html>
<style>
* {
  box-sizing: border-box;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
#submit{font-family: "Bebas Neue", cursive; width: 100px;}
</style>
<?php include "header.php"; ?>

<body style="background-color: #77d94c">

  <div>
       <center>
       <h1>Popular Searches</h1>
       </center>

  </div>

  <?php
  date_default_timezone_set('America/New_York');//Needed for date() to run with no errors

  //Code to get images
  include 'spotify/get_songs.php';

  $credentials = getCredentials();
  $client_id = $credentials[0];
  $client_secret = $credentials[1];
  $token = get_authenicated($client_id, $client_secret);

//Code for Stats
  $wpsData = file_get_contents("data/wps.json");
  $temp = json_decode($wpsData,true);

  if ($temp==false){
      print "<h3>No searches have been made yet!</h3>";

  }

  else{
  print "<div class='row'>";


  //*************************
  //Top Artist of the Day .. Start of Div Col
  print "<div class='column'><h2>Top Artist of the Day</h2>";
  $dateKeys = array_keys($temp);
  $allArtists=array();
  $topDayArray = array();
  foreach($dateKeys as $date)
  {
    if($date==date("m,d,y"))
    {
        foreach ($temp[$date] as $artist)
        {
          array_push($topDayArray,$artist);
        }

    }
  }
  $topCounted = array_count_values($topDayArray);
  $topSorted = arsort($topCounted);
  $topArtist = array_keys($topCounted)[0];
  $base_string = "<center><form action = 'php/set_artist.php'  id = 'history' method = 'post'>";
  $name = $topArtist;
  $tracks = get_top_artists($name, $token);
  $id_artist = get_artist_id($name, $tracks);
  $id = $id_artist[0];
  $art_img = get_artist_image($id,$token);
  $artist_string = $base_string . "<input type = 'submit' name = 'artist' id = 'submit'  value = '$topArtist'>";
  $artist_string = $artist_string. "<img src='{$art_img['url']}' width = '150' height = '150' style = 'border: 5px solid black;'></img>";
  $artist_string = $artist_string . "</form></center>";
  print $artist_string;
  //*************************
  //Artists Searched This Day
  print "<h2>Artists Searched This Day</h2>";
  print "<p>".count($topDayArray)."</p>";
  //End of Div Col
  print "</div>";


  //*************************
  //Top 10 Artists .. Start of Div Col
  print "<div class='column'><h2>Top 10 Most Searched Artists:</h2>";

  $dateKeys = array_keys($temp);
  $allArtists=array();
  foreach($dateKeys as $date)
  {
    foreach($temp[$date] as $artist)
    {
      array_push($allArtists,$artist);
    }

  }
  $allCounted = array_count_values($allArtists);
  $allSorted = arsort($allCounted);
  $artist_keys = array_keys($allCounted);

  for($k = 1; $k <= 10; $k++)
  {
        $base_string = "<center><form action = 'php/set_artist.php'  id = 'history' method = 'post'>";
        $name = $artist_keys[$k - 1];
        //$tracks = get_top_artists($name, $token);
        //$id_artist = get_artist_id($name, $tracks);
        //$id = $id_artist[0];
        //$art_img = get_artist_image($id,$token);
        $artist_string = $base_string . "<input type = 'submit' name = 'artist' id = 'submit'  value = '$name'>";
        //$artist_string = $artist_string. "<img src='{$art_img['url']}' width = '150' height = '150' style = 'border: 5px solid black;'></img>";
        $artist_string = $artist_string . "</form></center>";
        print $artist_string;

  }
  //End of Div Col
  print "</div>";



  //*************************
  //Top Artist of the Month .. Start of Div Col
  print "<div class='column'><h2>Top Artist of the Month</h2>";
  $topMonthArray = array();
  foreach($dateKeys as $date)
  {
    $today = date("m,d,y");
    $todayMonth = explode(',',$today)[0];
    if(explode(',',$date)[0]==$todayMonth)
    {
      foreach($temp[$date] as $artist)
      {
        array_push($topMonthArray,$artist);
      }

    }

  }
  $topMCounted = array_count_values($topMonthArray);
  $topMSorted = arsort($topMCounted);
  $topMArtist = array_keys($topMCounted)[0];
  $base_string = "<center><form action = 'php/set_artist.php'  id = 'history' method = 'post'>";
  $name = $topMArtist;
  $tracks = get_top_artists($name, $token);
  $id_artist = get_artist_id($name, $tracks);
  $id = $id_artist[0];
  $art_img = get_artist_image($id,$token);
  $artist_string = $base_string . "<input type = 'submit' name = 'artist' id = 'submit'  value = '$topMArtist'>";
  $artist_string = $artist_string. "<img src='{$art_img['url']}' width = '150' height = '150' style = 'border: 5px solid black;'></img>";
  $artist_string = $artist_string . "</form></center>";
  print $artist_string;

  //*************************
  //Artists Searched This Month

  print "<h2>Artists Searched This Month</h2>";
  print "<p>".count($topMonthArray)."</p>";

  //End of Div Col
  print "</div>";

  print "</div>";
  }


  ?>



<?php include "footer.php"; ?>


</body>
</html>
