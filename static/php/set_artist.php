<html>
<?php
// Start the session
session_start();
?>
 
<?php

// Set the working artist.

// A boolean check to make sure that the fields have values.
 if (isset($_POST['artist'])) {

    $current_artist = $_POST['artist'];

    $_SESSION['search'] = $current_artist;

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
        $array[] = $current_artist;
        $dict[$user] = $array;

        $new_json = json_encode($dict);
        file_put_contents($file, $new_json);
    }

 }
?>
<script> location.href = '../result.php'; </script>
</html>
