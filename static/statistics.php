<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>

        <meta charset = "utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- The page title.  Not to be confused with the text at the top. -->
        <title>Team PureHTML: Spotifind</title>

        <!-- Forcing our page to adjust to the aspect ratio of the device. -->
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

</head>

<style>
  h1{
    font-family: 'Bebas Neue', cursive;
  }
  h2{
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

  <h1 align="center"><a href="index.php"><img src="media/logo.png" alt="SpotiFind" width="128" height="128"></a></h1>

  <div class="search" id = "search">

    <form action = "result.php" method = "get">
      <center>
      <input type="text" placeholder="Search an artist" id = "search_entry" name = "artist">
      <input type="submit" value = "submit">
      </center>
    </form>

  </div>

</header>

<body style="background-color: #77d94c">

  <center>
    <h1>Artist Statistics</h1>
    <h2>Name:</h2>
    <h2>Monthly Listeners:</h2>
    <h2>Genre:</h2>
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
