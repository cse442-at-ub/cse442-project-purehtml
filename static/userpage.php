<?php
// Start the session
session_start();
?>

<html>

<?php include "header.php"; ?>

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
             $dir = "data/profile_pics/placeholder.png";
             $name = $_SESSION['username'];
             print "<img src='{$dir}' width = '150' height = '150' style = 'border: 5px solid black;'></img>";
             echo "<center><h2>Welcome, $name </h2></center>";

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
                        <form action = "history.php">
                                <center>
                                        <button class="button button1"><b>History</b></button><br>
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
                        <form action = "edituser.php">
                                <center>
                                        <button class="button button1"><b>Change Password</b></button><br>
                                </center>      
                        </form>
                </div><br><br><br><br><br><br>
            </div><br><br><br><br><br>


     <?php
        //$log_session = '<a href="history.php"> History</a>';
        //$log_session = $log_session . "<a> | </a>";
        //$log_session = $log_session . '<a href="php/logout.php">Log Out </a>';
        //print $log_session;
      ?>

    <?php include "footer.php"; ?>
</body>
</html>
