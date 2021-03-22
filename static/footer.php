<?php
// Start the session
session_start();
?>

<?php

$footer = "<style>.footer{height: 80px; z-index: 0; position: fixed;} </style>";

$footer = $footer . '<div class="footer">
                        <p>
                        <span style = "float:left; padding-left:10px; padding-bottom: 10px; font-size: 30px";>
                            Contact Us:  <a href="mailto:marshad2@buffalo.edu">Faizaan</a> | <a href="mailto:frankbai@buffalo.edu">Frank</a> | <a href="mailto:jdkazime@buffalo.edu">Jeremy</a>
                        </span>';

$log_session = '<span style = "float:right; padding-right:30px; padding-bottom: 10px; font-size: 30px";>';

if ($_SESSION["username"] == ""){

        $log_session = $log_session . '<a href="login.php"> Log In </a>';

}
else{

        $log_session = $log_session . '<a href="history.php"> History</a>';
        $log_session = $log_session . "<a> | </a>";
        $log_session = $log_session . '<a href="php/logout.php">Log Out </a>';

}

$footer = $footer . $log_session . '
                    </span>
                    </p>
                   </div>';

echo $footer;

?>
