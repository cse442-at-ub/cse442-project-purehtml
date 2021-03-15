<html>
<?php
// Start the session
session_start();
?>
<?php

// Set the location of the text file.
$path = '../data/log.txt';
$test = $_SESSION["username"];

echo $test;

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

    if(strlen($user) < 6 || strlen($user) > 20){
        echo "<script>alert('Incorrect username length!\nLength should be between 6-20 characters');</script>"
        exit(0);
    }

    if(strlen($pass) < 6 || strlen($pass) > 20){
        echo "<script>alert('Incorrect password length!\nLength should be between 6-20 characters');</script>"
        exit(0);
    }
    if(str_contains($pass, "/[A-Z]/") == False){
        echo "<script>alert('Password is weak!\nShould contain at least one uppercase, one lowercase, and one numerical value');</script>"
        exit(0);
    }
    if(str_contains($pass, "/[a-z]/") == False){
        echo "<script>alert('Password is weak!\nShould contain at least one uppercase, one lowercase, and one numerical value');</script>"
        exit(0);
    }
    if(str_contains($pass, "/[0-9]/") == False){
        echo "<script>alert('Password is weak!\nShould contain at least one uppercase, one lowercase, and one numerical value');</script>"
        exit(0);
    }

    $bool_user = ($reduced_user == $user);
    $bool_pass = ($reduced_pass == $pass);
    $bool = ($bool_user and $bool_pass);
   
    if ($bool == True){    
   	 // Declare a Boolean to see if the user already exists.
   	 $exists = False;
   	 foreach($users as $line) {
       	 	$current_user = explode(":", $line)[0];
            
       	 	if (strtolower($current_user) == strtolower($user)){
            		$exists = True;
       			 }

    	}
    
    	if ($exists == False){
     
        	$data = $user . ":" . $_POST['password'] . "\n";


        	// Write to file.
        	fwrite($file, $data);
        
        	echo "<script>alert('You have been registered.');</script>"; 
        
    	}
    
    	else{
        
        	echo "<script>alert('User already exists.');</script>";
            exit(0);    
    	}
    }
    else{
	 echo "<script>alert('Username and password  must be alphanumeric.');</script>";
	}

    // Close the file.
    fclose($file);

 }

?>
<script> location.href = '../index.php'; </script>
</html>

