<?php
// Start the session
session_start();
?>

<html>
<style>
.button {
background-color: #1DB954;
border: black;
border-style: solid;
color: white;
padding: 32px 20px;
text-align: center;
text-shadow: 1px 1px 0px #515151;
font-weight: bold;
position: relative;
line-height: 0.2em;
display: inline-block;
margin: 2px 2px;
cursor: pointer;
font-family: "Helvetica", "Arial", sans-serif;
}

.wrapper {
  text-align: center;
  display: inline-block;
  position: absolute;
  top: 50%;
  left: 50%;
}

.button1 {width: 150px; height: 20px; font-size: 17px; font-family: inherit;}
</style>

<?php include "header.php"; ?>

<!-- The body.  Basically, where all of the content goes. -->
<body style="background-color: #77d94c">
   <div>


                <br><br><br>
            <form action = "existing.php">
                <center>

                        <!-- Using our special .button class to make the button look a precise way, plus also text centering.  -->
                        <button class="button button1"><b>Existing User</b></button><br>

                </center>
            </form>

            <form action = "new.php">
                <center>

                            <!-- Using our special .button class to make the button look a precise way, plus also text centering.  -->
                            <button class="button button1"><b>New User</b></button><br>

                </center>
            </form>


     </div>

    <?php include "footer.php"; ?>
</body>
</html>
