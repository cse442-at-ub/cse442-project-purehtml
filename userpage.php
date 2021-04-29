<?php
// Start the session
session_start();
?>

<html>

<?php include "header.php"; include "db/connect_to_db.php";?>

<!-- The body.  Basically, where all of the content goes. -->
<body style="background-color: #77d94c">
     <div>
          <center>
          <h1>My Profile</h1>

          </center>

     </div>

     <div>
       <center>
       <?php
         if(isset($_SESSION["username"]))
         {
		
	     $conn = connect('db/db_credentials.txt');
             $user = $_SESSION["username"];

             $stmt = $conn->prepare("SELECT date FROM Users WHERE username = ?");
	     $stmt->bind_param("s", $user);
	     $stmt->execute();

	     $result = $stmt->get_result();
	     $qry = $result -> fetch_array(MYSQLI_NUM);		
             
             $dir = "data/profile_pics/" .$user. ".png";
             if(file_exists($dir) == false){
                $dir = "data/profile_pics/placeholder.png";
             }
             print "<img src='{$dir}' width = '150' height = '150' style = 'border: 5px solid black;'></img>";
             echo "<center><h1>Welcome, $user </h1></center>";
             echo "<center><h2>Member since $qry[0]</h2></center>";

         }


       ?>

       </center>
    </div>
    <div class="row">
     <div class="column" style="min-width: 400px; margin: 0 auto;">
                        <form action = "editpp.php">
                                <center>
                                        <button class="button button1"><b>Change Profile Picture</b></button><br>
                                </center>      
                        </form>
                </div>


     
                
     
     <div class="column" style="min-width: 400px; margin: 0 auto;">
                        <form action = "php/delaccount.php">
                                <center>
                                        <button class="button button1"><b>Delete User</b></button><br>
                                </center>      
                        </form>
                </div>

                <div class="column" style="min-width: 400px; margin: 0 auto;">
                        <form action = "bookmarks.php">
                                <center>
                                        <button class="button button1"><b>Bookmarks</b></button><br>
                                </center>
                        </form>
                </div>

<div class="column" style="min-width: 400px; margin: 0 auto;">
                        <form action = "edituser.php">
                                <center>
                                        <button class="button button1"><b>Change Password</b></button><br>
                                </center>      
                        </form>
                </div> 

     <div class="column" style="min-width: 400px; margin: 0 auto; float:right;">
                        <form action = "history.php">
                                <center>
                                        <button class="button button1"><b>History</b></button><br>
                                </center>
                        </form>
                </div><br><br><br><br><br><br>
            </div><br><br><br><br><br>

    <?php include "footer.php"; ?>
</body>
</html>
