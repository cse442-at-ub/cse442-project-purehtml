<html>
<?php

// Set the location of the text file.
$path = '../data/log.txt';

// A boolean check to make sure that the fields have values.
 if (isset($_POST['username']) && isset($_POST['password'])) {

    // Open the file in write mode.
    $file = fopen($path, "a") or die("cant open");

    // Get contents of the file.  Different from fopen.  Just read access.
    $data = file_get_contents($path);

    // Break into arrays based on users.
    $users = explode("\n", $data);

    // Declare a single string of both values.
    $user = $_POST['username'];
        
    // Declare a Boolean to see if the user already exists.
    $exists = False;

    // Iterate over each entry to check if the name exists.
    foreach($users as $line) {

        // Break the user apart by user, password.  0 is user, 1 is password
        $current_user = explode(":", $line)[0];
        
        // Does the username match the desired name?
        if ($current_user == $user){

            // If so, change to say that it exists.
            $exists = True;
        }

    }
    
    // Simple Boolean.
    if ($exists == False){
     
        $data = $user . ":" . $_POST['password'] . "\n";

        // Write to file.
        fwrite($file, $data);
        
        // There's probably a better way to do this.
        echo "<script>alert('You have been registered.');</script>"; 
        
    }
    
    else{
        
        echo "<script>alert('User already exists.');</script>";    
    }

    // Close the file.
    fclose($file);

 }

?>
<script> location.href = '../index.html'; </script>
</html>
