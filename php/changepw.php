<html>
<?php
// Start the session
session_start();
?>
<?php
include "../db/connect_to_db.php";

$conn = connect();
	
$user = $_POST['username'];
$reduced_user = preg_replace("/[^a-zA-Z0-9]+/", "", $user);
$password = $_POST['password'];
$reduced_pass = preg_replace("/[^a-zA-Z0-9]+/", "", $password);
$newpassword = $_POST['newpassword'];

if(preg_match('~[A-Z]+~', $newpassword) == False){
        echo "<script>alert('Password is weak!Should contain at least one uppercase, one lowercase, and one numerical value');</script>";
        echo "<script>location.href = '../edituser.php'</script>";
        exit(0);
        
    }

    if(preg_match('~[a-z]+~', $newpassword) == False){
        echo "<script>alert('Password is weak!Should contain at least one uppercase, one lowercase, and one numerical value');</script>";
        echo "<script>location.href = '../edituser.php'</script>";
        exit(0);
        
    }
    
    
    if(preg_match('~[0-9]+~', $newpassword) == False){
        echo "<script>alert('Password is weak!Should contain at least one uppercase, one lowercase, and one numerical value');</script>";
        echo "<script>location.href = '../edituser.php'</script>";
        exit(0);
    }

$bool_user = ($reduced_user == $user);
$bool_pass = ($reduced_pass == $password);
$bool = ($bool_user and $bool_pass);

if ($bool == True){
         // Declare a Boolean to see if the user already exists.
         $exists = False;
         $qry = query_username($conn, $user);

         if (is_null($qry) == False){
		$exists = True;
         }

        if ($exists == False){

                echo "<script>alert('Incorrect username or old password.');</script>";
                echo "<script>location.href = '../edituser.php'</script>";
        		exit(0);
        }


else{
	$sql = "UPDATE Users SET password = ? WHERE username = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $newpassword, $user);
        $stmt->execute() or die('oh no');

	echo "<script>alert('Password changed successfully!');</script>";
	echo "<script>location.href = '../userpage.php'</script>";
}
}

$conn->close();
?>

</html>
