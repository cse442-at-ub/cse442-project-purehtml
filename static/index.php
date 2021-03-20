<?php
// Start the session
session_start();
$_SESSION["test"] = "Session test!";
?>
<html>

<?php include "header.php"; ?>

<!-- The body.  Basically, where all of the content goes. -->
<body style="background-color: #77d94c">
        <!-- Creating a new header (not to be confused with head) ... <h1> means header.  Giving it an id allows us to scrape via J.S. -->

        <br>
         <div class="row">
            <div class="column" style="min-width: 400px; margin: 0 auto;">
                <h1>About Us:</h1>
                    <ul>
                        <h2>We are a website dedicated to helping music lovers find new artists and new music.</h2><br>
                        <h2>Spotifind is a Spotify recommender algorithm developed by Team PureHTML.</h2><br>
                        <h2>Team PureHTML is a group of 3 undergraduates for a software engineering course.</h2>
                    </ul>
            </div>
            <div class="column" style="min-width: 400px; margin: 0 auto;">
                <h1>Tutorial:</h1>
                     <video style='border: 2px solid #000;' width="410" height="230" controls>
                          <source src="media/tutorial.mp4" type="video/mp4">
                    </video>
            </div>
            <div class="column" style="min-width: 400px; margin: 0 auto;">
                <h1>Our Vision:</h1>
                    <ul>
                        <h2>The goal of Spotifind is to introduce new music to our users via a k-NN algorithm.</h2><br>
                        <h2>Artists are ranked according to their degree of collaboration.</h2><br>
                        <h2>Random songs and statistics are also provided for the user's curiosity.</h2>
                    </ul>

            </div>
        </div>
        <br><br>
        <div>
                <center>
                <?php
                        if ($_SESSION["username"] != ""){
                                echo "<h1>Welcome, " . $_SESSION["username"] . "!</h1>";
                        }
                 ?>
                </center>
        </div>

<?php include "footer.php"; ?>

</body>

</html>
