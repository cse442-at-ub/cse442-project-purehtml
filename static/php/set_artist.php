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

    if ($_POST['artist'] == "0"){
       $current_artist = "0";
    }
    else{
         $current_artist = $_POST['artist'] or die("I tried:(");
    }

    $current_artist = str_replace('$', 'S', $current_artist);
    $current_artist = str_replace(':', '', $current_artist);

    $current_artist = preg_replace("/[^a-z0-9 ]/i", "", $current_artist);

    //$current_artist = preg_replace("/[0-9]+/", "", $temp_string) . substr($current_artist, -strlen($current_artist) + 1);

    $len = strlen(trim($current_artist));

    if ($len == 0){
        echo "<script>alert('You must have a valid search!');</script>";
        echo "<script> location.href = '../index.php'; </script>";
    }

    else{

    $credentials = getCredentials();

    $client_id = $credentials[0];
    $client_secret = $credentials[1];

    $token = get_authenicated($client_id, $client_secret);

    $tracks = get_top_artists($current_artist, $token);

    $top_match = get_artist_id($current_artist, $tracks)[1];

    if ($top_match != ""){
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

        while (count($array) > 10){
                array_shift($array);
        }

        $dict[$user] = $array;

        $new_json = json_encode($dict);
        file_put_contents($file, $new_json);

    }

    $_SESSION['token'] = $token;
    $_SESSION['artist_tracks'] = $tracks;
    echo "<script> location.href = '../result.php'; </script>";
    }
    }
 }

?>
