<html>
<?php
// Start the session
session_start();
?>

<?php

date_default_timezone_set('America/New_York');
include '../spotify/get_songs.php';
// Set the working artist.

// A boolean check to make sure that the fields have values.


// Check if the artist is set.
 if (isset($_POST['artist'])) {
    // The int 0 messes up some things, so this fixes that.
    if ($_POST['artist'] == "0"){
       $current_artist = "0";
    }

    // We have a die statement in case somehow the artist has not been set.
    else{
         $current_artist = $_POST['artist'] or die("I tried:(");
    }

    // We do this for cases like A$AP Rocky.  We'll need to do a more complete
    // regexing in the future.
    $current_artist = str_replace('$', 'S', $current_artist);

    // only alphanumeric characters and non-leading whitespaces.
    $current_artist = preg_replace("/[^a-z0-9 ]/i", "", $current_artist);
    $current_artist = trim($current_artist, $characters = " \n\r\t\v\0");

    // check to make sure that it isn't empty after trimming whitespace.
    $len = strlen($current_artist);

    // Basically, if the search is not alphanumeric we reject the user.
    if ($len == 0){
        echo "<script>alert('You must have a valid search!');</script>";
        echo "<script> location.href = '../index.php'; </script>";
    }
    else{

     // This is just Spotify stuff.
     $credentials = getCredentials();
     $client_id = $credentials[0];
     $client_secret = $credentials[1];
     $token = get_authenicated($client_id, $client_secret);
     $tracks = get_top_artists($current_artist, $token);
     $id_artist = get_artist_id($current_artist, $tracks);
     $top_match = $id_artist[1];

     //Code for Saving matches for "what people are searching"
     if($top_match != "")
     {
       $wpsData = file_get_contents("../data/wps.json");
       $temp = json_decode($wpsData,true);
       //Check if date key has been made already
       //If made already just push to the array
       //If no key is made make key and array and add to array
       if(array_key_exists(date("m,d,y"),$temp))
       {
         array_push($temp[date("m,d,y")],$top_match);
       }else {
         $temp[date("m,d,y")]=array();
         array_push($temp[date("m,d,y")],$top_match);

       }


       $jsonforfile = json_encode($temp);
       file_put_contents("../data/wps.json",$jsonforfile);

     }


     // If there's a result for that search.
     if ($top_match != ""){
       $_SESSION['search'] = $top_match;
       $user = $_SESSION["username"];

       // Is the user logged in?
       if ($user != ""){
           // MAKE SURE THAT THE FILE HAS {} IN IT IF EMPTY, + CHMOD 777
           $file = '../data/history.json';
           $json = file_get_contents($file) or die('No Open!');
           $dict = json_decode($json, true);
           // Does the user exists?
           if (array_key_exists($user, $dict) == False){
                   $dict[$user] = array();
           }
           $array = $dict[$user];
           $array[] = $top_match;
           // Get rid of results more than 10 for space constraints.
           while (count($array) > 10){
                   array_shift($array);
           }
           $dict[$user] = $array;
           $new_json = json_encode($dict);
           file_put_contents($file, $new_json);
       }

       // Get the stuff to make random better.
       $id = $id_artist[0];
       $albums = get_all_albums($id, $token);
       $all_tracks = get_all_tracks($albums, $token);
       // Set variables for later.
       $_SESSION['all_tracks'] = $all_tracks;
       $_SESSION['token'] = $token;
       $_SESSION['artist_tracks'] = $tracks;
       echo "<script> location.href = '../result.php'; </script>";
     }
     else{
       // The search isn't valid, so we empty this.
       $_SESSION['all_tracks'] = array();
       $_SESSION['artist_tracks'] = array();
       $_SESSION['search'] = "";
       echo "<script> location.href = '../result.php'; </script>";
    }
 }
}
?>
