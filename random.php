<?php
// Start the session
session_start();
?>
<html>

<?php include "header.php"; ?>

<body style="background-color: #77d94c">

    <center>
        <h1>Random Song:</h1>
              <div>
                        <form action = "php/get_random.php">

                                <center>

                                        <!-- Using our special .button class to make the button look a precise way, plus also text centering.  -->
                                        <button class="button button1"><b>Shuffle</b></button><br>

                                </center>


                        </form>

                </div>

                

                <div class="column" style="min-width: 400px; margin: 0 auto;">

                        <form action = "result.php">

                                <center>

                                        <!-- Using our special .button class to make the button look a precise way, plus also text centering.  -->
                                        <button class="button button1"><b>Back to Results</b></button><br>

                                </center>


                        </form>


                </div>
                <div class="column" style="min-width: 400px; margin: 0 auto;">
        <?php
                print "<iframe src='https://open.spotify.com/embed/track/{$_SESSION["random_track"]}'
                        width='300' height='380' frameborder='0' style='border: 5px solid black;'
                        allowtransparency='true' allow='encrypted-media'></iframe>";
        ?>
        <br><br><br><br><br>
</div>
<div class="column" style="min-width: 400px; margin: 0 auto;">
                  <form action="php/addbookmark.php">
                    <center>
                        <?php
                        if(isset($_SESSION['username']))
                        {
                          echo "<button class='button button1'>Bookmark Song</button>";
                        }

                         ?>
                    </center>
                  </form>
              </div>
     </center><br><br><br><br><br>



<?php include "footer.php" ?>

</body>

</html>
