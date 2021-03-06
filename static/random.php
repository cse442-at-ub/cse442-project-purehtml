<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>

<!-- This is the header that follows  you around page to page. -->
<head>

        <meta charset = "utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Team PureHTML</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

</head>

<style>
  h1{
    font-family: 'Bebas Neue', cursive;
  }
  script{
    font-family: 'Bebas Neue', cursive;
  }
  p{
    font-family: 'Bebas Neue', cursive;
  }
  b{
    font-family: 'Bebas Neue', cursive;
  }

  .footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   color: black;
   text-align: left;
   background: white;
   font-family: 'Bebas Neue', cursive;
   padding-left: 10px;
   border: 2px solid black;
   border-left: 0;
   border-right: 0;
   border-bottom: 0;
  }

</style>

<header>

    <!-- Clicking on this redirects the user to index.html. -->
  <h1 align="center"><a href="index.php"><img src="media/logo.png" alt="SpotiFind" width="128" height="128"></a></h1>

  <div class="search" id = "search">
     <center>
        <!-- The "method = 'get'" keyword posts the value to the page. -->
    <form action = "result.php" method = "get">

      <input type="text" placeholder="Search an artist" id = "search_entry" name = "artist">
      <input type="submit" value = "submit">

    </form>

         </center>

  </div>

</header>

<body style="background-color: #77d94c">

    <center>
        <h1>Random Song:</h1>
        <p>This is where the song would go, if we had code!</p>
     </center>



     <div class="footer">
            <p>
                <span style = "float:left; padding-left:10px; padding-bottom: 10px; font-size: 30px";>
                    Contact Us:  <a href="mailto:marshad2@buffalo.edu">Faizaan</a> | <a href="mailto:frankbai@buffalo.edu">Frank</a> | <a href="mailto:jdkazime@buffalo.edu">Jeremy</a>
                </span>


                <span style = "float:right; padding-right:30px; padding-bottom: 10px; font-size: 30px";>
                    <a href="login.php"> Log In </a>
                </span>
            </p>
    </div>

</body>

</html>
