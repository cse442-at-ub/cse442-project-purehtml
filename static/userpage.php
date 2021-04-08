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
          <h1>User Page Soon</h1>
          </center>

     </div>
     
     <div>
       <br>
       <?php
         if(isset($_SESSION["username"]))
         {
             $name = $_SESSION['username'];
             echo "<center><h3>Welcome, $name </h3></center>";

         }


       ?>
     </div>

     <?php
        $log_session = '<a href="history.php"> History</a>';
        $log_session = $log_session . "<a> | </a>";
        $log_session = $log_session . '<a href="php/logout.php">Log Out </a>';
        print $log_session;
      ?>

    <?php include "footer.php"; ?>
</body>
</html>
