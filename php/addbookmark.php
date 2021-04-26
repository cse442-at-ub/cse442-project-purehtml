<html>
<?php
// Start the session
session_start();
?>

<?php
include "../db/connect_to_db.php";

$conn = connect('../db/db_credentials.txt');
$user = $_SESSION["username"];
$stmt = $conn->prepare("SELECT * FROM Bookmarks WHERE username = ?");
                $stmt->bind_param("s", $user);
                $stmt->execute();
    $result = $stmt->get_result();
                $qry = $result -> fetch_array(MYSQLI_NUM);

                if (is_null($qry) == True){
      $sql = "INSERT INTO Bookmarks (username, i1, i2, i3, i4, i5, i6, i7, i8, i9, i10)
      VALUES (?, '.', '.', '.', '.', '.', '.', '.', '.', '.', '.');";
             $stmt = $conn->prepare($sql);
                         $stmt->bind_param("s", $user);
                         $stmt->execute();
                }

                $arr = array_slice($qry, 1, 12);
                array_shift($arr);
                $arr[] = $_SESSION["random_title"]. " by ". $_SESSION["search"];
    $sql = "UPDATE Bookmarks SET i1 = ?, i2 = ?, i3 = ?, i4 = ?, i5 = ?, i6 = ?, i7 = ?, i8 = ?, i9 = ?, i10 = ? WHERE username = ?;";
    
    $stmt = $conn->prepare($sql);
                $arr[] = $user;
                $types = str_repeat("s", count($arr)); 
                
    $stmt->bind_param($types, ...$arr);
    $stmt->execute();

/*$path = "../data/booksmarks.json";

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


}*/



?>

<script> location.href = '../random.php'; </script>
</html>
