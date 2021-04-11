<html>
<?php
// Start the session
session_start();
?>
<?php
$path = '../data/log.txt';
$file = fopen($path, "a") or die("cant open");
$data = file_get_contents($path) or die("cant open");
$users = explode("\n", $data);

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
         foreach($users as $line) {
                $current_user = explode(":", $line)[0];

                if (strtolower($current_user) == strtolower($user)){
                 $current_pass = explode(":", $line)[1];
                 if($current_pass == $password)
                 {
                         $exists = True;
                 }

                }

        }

        if ($exists == False){

                echo "<script>alert('Incorrect username or old password.');</script>";
                echo "<script>location.href = '../edituser.php'</script>";
        		exit(0);
        }


else{
	$content=file_get_contents($path);
	$content_chunks=explode($password, $content);
	$content=implode($newpassword, $content_chunks);
	file_put_contents($path, $content);

	echo "<script>alert('Password changed successfully!');</script>";
	echo "<script>location.href = '../userpage.php'</script>";
}
}

?>

</html>