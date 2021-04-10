<html>
<?php
// Start the session
session_start();
?>

<?php

$path = "../data/booksmarks.json";

if(isset($_SESSION['random_track'])&&isset($_SESSION['username']))
{
  $data = file_get_contents($path) or die("cant open");

  $dict = json_decode($data, true);

  if (array_key_exists($_SESSION['username'], $dict))
  {
    if (array_key_exists("bookmarks",$dict[$_SESSION['username']]))
    {

      array_push($dict[$_SESSION['username']],$_SESSION['random_track']);

    }
  }

  $new_json = json_encode($dict);
  file_put_contents($file, $new_json);

}



?>

<script> location.href = '../random.php'; </script>
</html>
