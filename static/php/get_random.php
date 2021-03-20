<html>
<?php
// Start the session
session_start();
?>

<?php

include '../../spotify/get_songs.php';

$artist = $_SESSION["search"] or die("Welp!");

$token = $_SESSION["token"];
$tracks = $_SESSION["artist_tracks"];

$id = get_artist_id($artist, $tracks)[0] or "Invalid search.";
$albums = get_all_albums($id, $token);
$tracks = get_all_tracks($albums, $token);

$random_idx = array_rand($tracks);
$random_track = $tracks[$random_idx];

$_SESSION['random_track'] = $random_track['id'];
?>

<script> location.href = '../random.php'; </script>
</html>

