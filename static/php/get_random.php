<html>
<?php
// Start the session
session_start();
?>

<?php

include '../../spotify/get_songs.php';

$artist = $_SESSION["search"] or die("Welp!");

$creds = getCredentials();
$client_id = $creds[0];
$client_secret = $creds[1];

$token = get_authenicated($client_id, $client_secret);

$top_tracks = get_top_artists($artist, $token);
$id = get_artist_id($top_tracks);
$albums = get_all_albums($id, $token);
$tracks = get_all_tracks($albums, $token);

$random_idx = array_rand($tracks);
$random_track = $tracks[$random_idx];

$_SESSION['random_track'] = $random_track['id'];
?>

<script> location.href = '../random.php'; </script>
</html>
