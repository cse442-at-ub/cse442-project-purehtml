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
    $credentials = getCredentials();

    $client_id = $credentials[0];
    $client_secret = $credentials[1];
    $token = get_authenicated($client_id, $client_secret);

    $tracks = get_top_artists($current_artist, $token);
    $top_match = get_artist_id($current_artist, $tracks)[1];

    $_SESSION['search'] = $top_match;
 
    $_SESSION['token'] = $token;
    $_SESSION['artist_tracks'] = $tracks;
 }

?>
<script> location.href = '../result.php'; </script>
</html>

