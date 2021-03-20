<?php
// Start the session
session_start();
?>
<html>

<?php include "header.php"; ?>

<body style="background-color: #77d94c">

    <center>
        <h1>Random Song:</h1>
        <?php
                print "<iframe src='https://open.spotify.com/embed/track/{$_SESSION["random_track"]}'
                        width='300' height='380' frameborder='0' style='border: 5px solid black;'
                        allowtransparency='true' allow='encrypted-media'></iframe>";
        ?>

     </center>



<?php include "footer.php" ?>

</body>

</html>
