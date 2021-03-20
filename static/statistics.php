<?php
// Start the session
session_start();
?>

<html>
<?php include "header.php"; ?>

<body style="background-color: #77d94c">
   <div>
  	<center>
   	 <h1>Artist Statistics</h1>

          <?php
            print "<h2>Artist Name: {$_SESSION['search']}</h2>"
          ?>

   	 <h2>Monthly Listeners:</h2>
   	 <h2>Genre:</h2>
  	</center>
   </div>
<?php include "footer.php"; ?>
</body>

</html>
