<html>
<?php
// Start the session
session_start();
?>
<?php
include "../db/connect_to_db.php";

$conn = connect('../db/db_credentials.txt');

// A boolean check to make sure that the fields have values.
 if (isset($_POST['username']) && isset($_POST['password'])) {

    // Declare a single string of both values.
    $user = $_POST['username'];
    $reduced_user = preg_replace("/[^a-zA-Z0-9]+/", "", $user);

    $pass = $_POST['password'];
    $reduced_pass = preg_replace("/[^a-zA-Z0-9]+/", "", $pass);

    $email = $_POST['email'];
    $reduced_email = preg_replace("/[^a-zA-Z0-9]+/", "", $email);

    if(strlen($user) < 6 || strlen($user) > 20){
        echo "<script>alert('Incorrect username length!Length should be between 6-20 characters');</script>";
        echo "<script>location.href = '../new.php'</script>";
        exit(0);
        
        
    }

    if(strlen($pass) < 6 || strlen($pass) > 20){
        echo "<script>alert('Incorrect password length!Length should be between 6-20 characters');</script>";
       echo "<script>location.href = '../new.php'</script>";
        exit(0);
        
    }

    if(preg_match('~[A-Z]+~', $pass) == False){
        echo "<script>alert('Password is weak!Should contain at least one uppercase, one lowercase, and one numerical value');</script>";
        echo "<script>location.href = '../new.php'</script>";
        exit(0);
        
    }

    if(preg_match('~[a-z]+~', $pass) == False){
        echo "<script>alert('Password is weak!Should contain at least one uppercase, one lowercase, and one numerical value');</script>";
        echo "<script>location.href = '../new.php'</script>";
        exit(0);
        
    }
    
    
    if(preg_match('~[0-9]+~', $pass) == False){
        echo "<script>alert('Password is weak!Should contain at least one uppercase, one lowercase, and one numerical value');</script>";
        echo "<script>location.href = '../new.php'</script>";
        exit(0);
    }
    
    $bool_user = ($reduced_user == $user);
    $bool_pass = ($reduced_pass == $pass);
    $bool = ($bool_user and $bool_pass);
    
    if ($bool == True){    
   	 // Declare a Boolean to see if the user already exists.
   	 $exists = False;
   	 $qry = query_username($conn, $user);
     $qry_e = query_email($conn, $email);
         //print is_null($qry_e);
         if (is_null($qry) == False || is_null($qry_e) == False){
	           $exists = True;
         }

    	
    
    	if ($exists == False){
                add_user($conn, $user, $pass, $email, date("F j, Y"));
        
        	echo "<script>alert('You have been registered.');</script>";
            echo "<script>location.href = '../existing.php'</script>";
            exit(0);
        
    	}
    
    	else{
        
        	echo "<script>alert('User already exists.');</script>";
            echo "<script>location.href = '../new.php'</script>";
            exit(0);
              
    	}
    }
    else{
	 echo "<script>alert('Username and password  must be alphanumeric.');</script>";
     echo "<script>location.href = '../new.php'</script>";
        exit(0);
	}
   $conn->close();

 }

?>
<script> location.href = '../index.php'; </script>
</html>

