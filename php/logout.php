<?php
// Start the session
session_start();
?>

<?php

$_SESSION["username"] = "";

session_destroy();

?>
<html>

<script> location.href = '../index.php'; </script>

</html>
