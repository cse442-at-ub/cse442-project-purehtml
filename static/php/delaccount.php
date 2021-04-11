<html>
<?php
// Start the session
session_start();
?>
<?php

// Set the location of the text file.
$path = '../data/log.txt';

// A boolean check to make sure that the fields have values.
 if (isset($_SESSION['username']))
 {

    $data = file_get_contents($path) or die("cant open");
    $users = explode("\n", $data);
    $output = array();
   	foreach($users as $line)
    {
      $current_user = explode(":", $line)[0];

      if (strtolower($current_user) != strtolower($_SESSION['username']))
      {
            		$output[] = $line;
                echo "FOUND";
      }

    }
    $file = fopen($path, "w+");
    flock($file, LOCK_EX);
    foreach($output as $line) {
      fwrite($file, $line."\n");

    }
    flock($file, LOCK_UN);
    fclose($file);

    $_SESSION = array();

  }
  else{
	 echo "<script>alert('No Username set to delete');</script>";
   echo "<script>location.href = '../index.php'</script>";
   exit(0);
	}



?>
<script> location.href = '../index.php'; </script>
</html>
