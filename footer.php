<?php
// Start the session
session_start();
?>

<?php

$footer = "";

$footer = $footer . '<div class="footer">
                        <p>
                        <span style = "float:left; padding-left:10px; padding-bottom: 10px; font-size: 30px";>
                            <a href="aboutus.php">About Us</a>
                        </span>';

$log_session = '<span style = "float:right; padding-right:30px; padding-bottom: 10px; font-size: 30px";>';
$username = $_SESSION["username"];
if ($_SESSION["username"] == ""){

        $log_session = $log_session . '<a href="login.php"> Log In </a>';

}
else{

        $log_session = $log_session . '<a href="userpage.php">'.$username.'</a>';
        $log_session = $log_session . "<a> | </a>";
        $log_session = $log_session . '<a href="php/logout.php"> Log Out </a>';
}

$footer = $footer . $log_session . '
                    </span>
                    </p>
                   </div>';

echo $footer;

?>
