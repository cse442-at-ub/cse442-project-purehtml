<?php
// Start the session
session_start();
?>
<?php
include "../db/connect_to_db.php";

$conn = connect();

// A boolean check to make sure that the fields have values.
 if (isset($_POST['username']) && isset($_POST['password'])) {

    // Declare a single string of both values.
    $user = $_POST['username'];
    $reduced_user = preg_replace("/[^a-zA-Z0-9]+/", "", $user);

    $pass = $_POST['password'];
    $reduced_pass = preg_replace("/[^a-zA-Z0-9]+/", "", $pass);

    $bool_user = ($reduced_user == $user);
    $bool_pass = ($reduced_pass == $pass);
    $bool = ($bool_user and $bool_pass);

    if ($bool == True){
         // Declare a Boolean to see if the user already exists.
         $exists = False;

         $qry = query_username($conn, $user);

         if (is_null($qry) == False){
		$exists = True;
         }


        if ($exists == False){

                echo "<script>alert('Bad username or password.');</script>";

        }

        else{
		if ($qry[1] == $pass){

                	echo "<script>alert('User exists, logged in.');</script>";
               		 $_SESSION['username'] = $user;
                }

                else{
			echo "<script>alert('Wrong password!');</script>";
                }
        }
        $conn->close();
    }
    else{
         echo "<script>alert('Username and password  must be alphanumeric.');</script>";
        }

 }

?>
<html>

<script> location.href = '../index.php'; </script>

</html>
