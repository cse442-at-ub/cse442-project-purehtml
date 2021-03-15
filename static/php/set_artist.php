<html>
<?php
// Start the session
session_start();
?>
 
<?php

include '../../spotify/get_songs.php';
// Set the working artist.

// A boolean check to make sure that the fields have values.
 if (isset($_POST['artist'])) {

    $current_artist = $_POST['artist'];


    $_SESSION['search'] = $current_artist;

    $credentials = getCredentials();

    $client_id = $credentials[0];
    $client_secret = $credentials[1];
    $token = get_authenicated($client_id, $client_secret);

    $tracks = get_top_artists($current_artist, $token);
    $top_match = $tracks[0]['artists'][0]['name'] or "Artist Not Found";

    $_SESSION['search'] = $top_match;
   
    $user = $_SESSION["username"];
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
        $dict[$user] = $array;

        $new_json = json_encode($dict);
        file_put_contents($file, $new_json);
    }

    $_SESSION['token'] = $token;
    $_SESSION['artist_tracks'] = $tracks;

 }

?>
<script> location.href = '../result.php'; </script>
</html>
