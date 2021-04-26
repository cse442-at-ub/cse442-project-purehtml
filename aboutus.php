<?php
// Start the session
session_start();
?>

<html>
<style>
* {
  box-sizing: border-box;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
<?php include "header.php"; ?>

<body style="background-color: #77d94c">

  <div>
       <center>
       <h1>About Us</h1>
       </center>

  </div>

  <div>
    <center>
      <h3>Contact Us:  <a href="mailto:marshad2@buffalo.edu">Faizaan</a> | <a href="mailto:frankbai@buffalo.edu">Frank</a> | <a href="mailto:jdkazime@buffalo.edu">Jeremy</a></h3>
    </center>
  </div>

  <div class="row">
    <div class="column">
      <h4>Faizaan</h4>
      <img src='data/profile_pics/placeholder.png' width = '150' height = '150' style = 'border: 5px solid black;'></img>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>

    <div class="column">
      <h4>Jeremy</h4>
      <img src='data/profile_pics/placeholder.png' width = '150' height = '150' style = 'border: 5px solid black;'></img>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>

    <div class="column">
      <h4>Frank</h4>
      <img src='data/profile_pics/placeholder.png' width = '150' height = '150' style = 'border: 5px solid black;'></img>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
  </div>








<?php include "footer.php"; ?>


</body>
</html>
