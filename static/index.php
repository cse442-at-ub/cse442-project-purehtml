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
                    <p>We are a website dedicated to helping music lovers find new artists and new music. Team PureHTML is a group of 3 undergraduates working on Spotifind, a user friendly Spotify recommender algorithm. This project is a part of a software engineering course.</p>
            </div>
            <div class="column" style="min-width: 400px; margin: 0 auto;">
                <h1>Tutorial:</h1>
                     <video style='border: 2px solid #000;' width="410" height="230" controls>
                          <source src="media/tutorial.mp4" type="video/mp4">
                    </video>
            </div>
            <div class="column" style="min-width: 400px; margin: 0 auto;">
                <h1>Our Vision:</h1>
                    <p>The goal of Spotifind is to introduce new music to our users, while providing new information to them in the form of random songs and statistics for that particular artist.
                        The way that we do this is by creating a k-nearest neighbors recommender algorithm where the criteria of being a neighbor is whether or not two artists have collaborated on a song.
                        Artists are ranked relative to each other according to the number of songs collaborated on.  Those that collaborate most will be the first chosen by our algorithm.
                </p>

            </div>
        </div>

<?php include "footer.php"; ?>

</body>

</html>
