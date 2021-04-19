<?php
// Start the session
session_start();
?>
<html>

<?php include "header.php"; ?>

<!-- The body.  Basically, where all of the content goes. -->
<body style="background-color: #77d94c">
    <br><br><br>
    <center>
    <form action = "php/resetpass.php" method = "post">



                <!-- <center> horizontally centers the element, but not vertically.  Probably because elements scroll up/down, not left/right -->
                

                      <!-- This is the username/password field.  The type determines whether or not the passwords are shown or not. -->

                      <label for="username"><a style = "color:black;">Username:</a></label><br>
                      <input type = "text" name = "username" id = "username" value="" minlength = 6 maxlength = 12><br>
                      <label for="email"><a style = "color:black;">Email:</a></label><br>
                      <input type = "text" name = "email" id = "email" value="" minlength = 6 maxlength = 30><br>

                      
                      <!-- 'onclick' does something once the button has been clicked.  In this case, it shows a pop up saying that you have been logged in. -->
                      <!-- Separating with a semicolon allows for another command to be executed on the same click.  It goes in sequential order. -->
                      <!-- This one basically refreshes the page and empties the text boxes.  It would be cool to destruct the fields as well for the symbolism. -->
                      <!-- 'location.href' is the current page so you're just reassigning it to itself.  You could also do 'location.href = result.html' -->

                        <input type="submit" value="Submit" id = "login">
                      </form>
        </center>

    

<?php include "footer.php"; ?>

</body>
</html>
