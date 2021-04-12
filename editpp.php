<?php
// Start the session
session_start();
?>

<html>

<?php include "header.php"; ?>
<body style="background-color: #77d94c">
     <div>
          <center>
          <h1>Change Profile Picture</h1>

          </center>

     </div>
     
     <div>
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
</body>
</html>