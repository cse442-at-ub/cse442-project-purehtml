<?php
// Start the session
session_start();
?>

<html>

<?php include "header.php"; ?>
<body style="background-color: #77d94c">

    <div class="row">

     <div class="column" style="min-width: 400px; margin: 0 auto;">

                        <form action = "userpage.php">

                                <center>

                                        <!-- Using our special .button class to make the button look a precise way, plus also text centering.  -->
                                        <button class="button button1"><b>Back</b></button><br>

                                </center>


                        </form>


                </div>

     <div class="column" style="min-width: 400px; margin: 0 auto;">
          <center>
          <h1>Change Profile Picture</h1>

          </center>

    
     
     
       <center>
       <?php
         if(isset($_SESSION["username"]))
         {
             $name = $_SESSION['username'];
             $dir = "data/profile_pics/" .$name. ".png";
             if(file_exists($dir) == false){
                $dir = "data/profile_pics/placeholder.png";
             }
             print "<img src='{$dir}' width = '150' height = '150' style = 'border: 5px solid black;'></img>";
             echo "<center><h2>Welcome, $name </h2></center>";

         }
       ?>
       	
       	<center>

       	<form action="php/uploadimage.php" method= "POST" enctype="multipart/form-data">
  				<p>Select image to upload:</p>
  		<input type="file" name="fileToUpload" id="fileToUpload">
  		<input type="submit" value="upload image" name="submit">
		</form>
		</center>
       </center>
   </div>
 </div>
</body>
</html>