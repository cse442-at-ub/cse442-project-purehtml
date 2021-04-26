<html>
<?php
// Start the session
session_start();
?>
<?php
include "../db/connect_to_db.php";

$conn = connect('../db/db_credentials.txt');

// A boolean check to make sure that the fields have values.
 if (isset($_SESSION['username']))
 {

    $qry = "DELETE FROM Users WHERE username = ?;";
    $stmt = $conn->prepare($qry);
    $stmt->bind_param("s", $_SESSION['username']);
    $stmt->execute();

    $stmt = $conn->prepare("SELECT * FROM History WHERE username = ?");
    $stmt->bind_param("s", $_SESSION['username']);
    $stmt->execute();

    $result = $stmt->get_result();
    $qry = $result -> fetch_array(MYSQLI_NUM);
    if (is_null($qry) == False){
	$sql = "DELETE FROM History WHERE username = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $_SESSION['username']);
        $stmt->execute(); 
    }

    $stmt1 = $conn->prepare("SELECT * FROM Bookmarks WHERE username = ?");
    $stmt1->bind_param("s", $_SESSION['username']);
    $stmt1->execute();

    $result1 = $stmt1->get_result();
    $qry1 = $result1 -> fetch_array(MYSQLI_NUM);
    if (is_null($qry1) == False){
    $sql1 = "DELETE FROM Bookmarks WHERE username = ?;";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param("s", $_SESSION['username']);
        $stmt1->execute(); 
    }


    $user = $_SESSION['username'];
    $dir = '../data/profile_pics/';
    $loc = $dir . $user . '.png';
    unlink($loc);

    $_SESSION = array();
    $conn->close();

  }
  else{
	 echo "<script>alert('No Username set to delete');</script>";
   echo "<script>location.href = '../index.php'</script>";
   exit(0);
	}



?>
<script> location.href = '../index.php'; </script>
</html>
