<?php
// Start the session
session_start();
?>
<?php
include "../db/connect_to_db.php";

$conn = connect();

// A boolean check to make sure that the fields have values.
 if (isset($_POST['username']) && isset($_POST['email'])) {

    // Declare a single string of both values.
    $user = $_POST['username'];
    $reduced_user = preg_replace("/[^a-zA-Z0-9]+/", "", $user);

    $email = $_POST['email'];
    $reduced_email = $email;

    $bool_user = ($reduced_user == $user);
    $bool_email = ($reduced_email == $email);
    $bool = ($bool_user and $bool_email);

    if ($bool == True){
         // Declare a Boolean to see if the user already exists.
         $exists = False;

         $qry = query_username($conn, $user);

         if (is_null($qry) == False){
		$exists = True;
         }


        if ($exists == False){

                echo "<script>alert('Username not found');</script>";

        }

        else{
		if ($qry[0] == $user && $qry[2] == $email){
                    $to = $email;
                    $subject = "Spotifind: Password Reset Request";
                    $txt = "Your Login credentials are as follows:" ."\n". "Username: " . $user . "\n" . "Password: " .$qry[1];
                    $headers = "From: teampurehtml@gmail.com" . "\r\n";

                    mail($to, $subject, $txt, $headers);
                	echo "<script>alert('Your password has been emailed to you');</script>";

                }

                else{
			echo "<script>alert('Bad username or password');</script>";
                }
        }
        $conn->close();
    }
    else{
         echo "<script>alert('Bad username or password');</script>";
        }

 }

?>
<html>

<script> location.href = '../index.php'; </script>

</html>
