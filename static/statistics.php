<?php
// Start the session
session_start();
?>

<html>
<?php include "header.php"; ?>

<body style="background-color: #77d94c">
   <div class="row">

                <!-- <div> elements are stacked vertically so this will appear under the last <div>. -->
                <div class="column" style="min-width: 400px; margin: 0 auto;">


                        <!-- '<form action = "result.php">' redirects to result.html upon completion of the action.  In this case, clicking a button. -->

                        <form action = "result.php">

                                

                                        <!-- Using our special .button class to make the button look a precise way, plus also text centering.  -->
                                        <button class="button button1"><b>Back</b></button><br>

                               


                        </form>

                </div>
   <div class="column" style="min-width: 400px; margin: 0 auto;">
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
