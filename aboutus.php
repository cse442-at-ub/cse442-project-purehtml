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



  <div class="row">
    <div class="column">
      <h2>Faizaan</h2>
      <p><a href="mailto:marshad2@buffalo.edu">marshad2@buffalo.edu</a></p>
      <img src='data/profile_pics/faizaan.jpg' width = '150' height = '150' style = 'border: 5px solid black;'></img>
      <p>Faizaan is an undergraduate senior in his final semester of Computer Science. Some of his interests include music theory and the fundamentals of music production, which is one of the reasons why he was so intrigued by this project. In his spare time, he prefers to wind down with some indie rock music or gun down his enemies in a game of Rainbow Six Siege.</p>
      <h2>Favorite Song: BLEACH, by BROCKHAMPTON</h2>
      <iframe src='https://open.spotify.com/embed/track/0dWOFwdXrbBUYqD9DLsoyK'
              width='300' height='380' frameborder='0' style='border: 5px solid black;'
              allowtransparency='true' allow='encrypted-media'></iframe>


    </div>

    <div class="column">
      <h2>Jeremy</h2>
      <p><a href="mailto:jdkazime@buffalo.edu">jdkazime@buffalo.edu</a></p>
      <img src='data/profile_pics/jeremy.jpg' width = '150' height = '150' style = 'border: 5px solid black;'></img>
      <p>Jeremy is an undergraduate computational physics major in his final semester.  He likes network and entropy theory, as well as Monte Carlo simulations.  In his free time, he explores data science to convey sociological data, Spotifind being one such example.  Currently, he plans to continue his education into a Master's degree.</p>
      <h2>Favorite Song: Go Down Together, by Foxing</h2>
      <iframe src='https://open.spotify.com/embed/track/4tkpi79JqjPCMGmBOtEJI9'
              width='300' height='380' frameborder='0' style='border: 5px solid black;'
              allowtransparency='true' allow='encrypted-media'></iframe>
    </div>

    <div class="column">
      <h2>Frank</h2>
      <p><a href="mailto:frankbai@buffalo.edu">frankbai@buffalo.edu</a></p>
      <img src='data/profile_pics/frank.JPG' width = '150' height = '150' style = 'border: 5px solid black;'></img>
      <p>As an undergraduate in Computing and Applied Mathematics, Frank enjoys getting the most out of computer hardware. Hobbies include tinkering with all kinds of compute hardware, like graphics programming and embedded microcontrollers. Always looking to optimize and find clever ways to run code.</p>
      <h2>Favorite Song: Planet Caravan, by Black Sabbath</h2>
      <iframe src='https://open.spotify.com/embed/track/2VDg6h3Qr3F8UuFVInQxE6'
              width='300' height='380' frameborder='0' style='border: 5px solid black;'
              allowtransparency='true' allow='encrypted-media'></iframe>
    </div>
  </div>








<?php include "footer.php"; ?>


</body>
</html>
