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

  if (array_key_exists($_SESSION['username'], $dict) == false)
  {
    $dict[$_SESSION['username']] = array();   
  }

  $bookmarks = $dict[$_SESSION['username']];
  $title = $_SESSION['random_title'] . " by " . $_SESSION['search'];
  if (in_array($title, $bookmarks) == false){
	$bookmarks[] = $title;
  }
  
  while (count($bookmarks) > 10){
	array_shift($bookmarks);
  }

  $dict[$_SESSION['username']] = $bookmarks;
  $new_json = json_encode($dict);
  
	
  file_put_contents($path, $new_json);


}



?>

<script> location.href = '../random.php'; </script>
</html>
