<?php
// Start the session
session_start();
?>
<html>

<!-- The 'style' block is basically in-line CSS. -->
<!-- Look at a CSS wiki to understand what each element does.  I'm sure some are not needed. -->

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
margin: 100px 2px;
cursor: pointer;
font-family: "Helvetica", "Arial", sans-serif;
}


.button1 {width: 150px; height: 20px; font-size: 17px; font-family: inherit;}
</style>
<!-- Basically all of this was explained in index.html. -->

<?php include "header.php"; include "../spotify/get_songs.php";?>

<body style="background-color: #77d94c">
            <div class="row">

                    <!-- <div> elements are stacked vertically so this will appear under the last <div>. -->
                    <div class="column" style="min-width: 400px; margin: 0 auto;">


                            <!-- '<form action = "result.php">' redirects to result.html upon completion of the action.  In this case, clicking a button. -->

                            <form action = "php/get_random.php">

                                    <center>

                                            <!-- Using our special .button class to make the button look a precise way, plus also text centering.  -->
                                            <button class="button button1"><b>Random Song</b></button><br>

                                    </center>


                            </form>

                    </div>

                    <div class="column" style="min-width: 400px; margin: 0 auto;">
                            <center>
                                    <?php

                                            if ($_SESSION["username"] == ""){
                                                    print "<h1>You searched: </h1> <p>{$_SESSION["search"]}</p>";
                                            }

                                            else{
                                                    print "<h1>{$_SESSION["username"]}, you searched: </h1> <h2>{$_SESSION["search"]}</h2>";
                                            }
                                    ?>

                                    <?php
                                            $id = get_artist_id($_SESSION['search'], $_SESSION['artist_tracks']) or die("hi");
                                            $url = get_artist_image($id[0], $_SESSION['token'])["url"];
                                            if ($url != ""){
                                                    print "<img src='{$url}' width = '200' height = '200' style = 'border: 5px solid black;'></img>";
                                                    }
                                    ?>

                                    <h1>Most Similar Artists:</h1>
                                    <?php
                                            for ($k = 1; $k <= 10; $k++){
                                                print "<h2>{$k}: result goes here Sprint #3!</h2>";
                                            }
                                    ?>

                            </center>
                    </div>
                    <!-- <p> just creates a new paragraph or more specifically a body of text. -->

                    <div class="column" style="min-width: 400px; margin: 0 auto;">

                            <form action = "statistics.php">
                                    <center>

                                            <!-- Using our special .button class to make the button look a precise way, plus also text centering.  -->
                                            <button class="button button1"><b>Statistics</b></button><br>

                                    </center>

                            </form>
                    </div>
            </div>

            <div><center><p>Wrong artist? Did you enter their name correctly?</p> </center></div>
                <br><br><br>

<?php include "footer.php"; ?>

</body>

</html>
