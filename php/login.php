<?php
// Start the session
session_start();
?>
<?php

// Set the location of the text file.
$path = '../data/log.txt';

// A boolean check to make sure that the fields have values.
 if (isset($_POST['username']) && isset($_POST['password'])) {

    // Open the file in write mode.
    $file = fopen($path, "a") or die("cant open");
    $data = file_get_contents($path) or die("cant open");
    $users = explode("\n", $data);

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
         foreach($users as $line) {
                $current_user = explode(":", $line)[0];

                if (strtolower($current_user) == strtolower($user)){
                 $current_pass = explode(":", $line)[1];
                 if($current_pass == $pass)
                 {
                         $exists = True;
                 }

                }

        }

        if ($exists == False){

                echo "<script>alert('Bad username or password.');</script>";

        }

        else{

                echo "<script>alert('User exists, logged in.');</script>";
                 $_SESSION["username"]=$user;
        }
    }
    else{
         echo "<script>alert('Username and password  must be alphanumeric.');</script>";
        }

    // Close the file.
    fclose($file);

 }

?>
<html>

<script> location.href = '../index.php'; </script>

</html>
