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
    
 }
?>
<script> location.href = '../result.php'; </script>
</html>

