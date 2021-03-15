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

                print "<p>{$_SESSION["random_track"]}</p>";

        ?>

     </center>



<?php include "footer.php" ?>

</body>

</html>
