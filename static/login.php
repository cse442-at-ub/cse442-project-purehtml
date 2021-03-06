<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<!-- The headers. -->
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
  p{
    font-family: 'Bebas Neue', cursive;
  }
  label{
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

  .column {
  float: left;
  text-align: center;
  width: 33.333%;
  }

  .row:after {
  content: "";
  display: table;
  clear: both;
  }


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
margin: 2px 2px;
cursor: pointer;
font-family: "Helvetica", "Arial", sans-serif;
}

.wrapper {
  text-align: center;
  display: inline-block;
  position: absolute;
  top: 50%;
  left: 50%;
}

.button1 {width: 150px; height: 20px; font-size: 17px; font-family: inherit;}
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

<!-- The body.  Basically, where all of the content goes. -->
<body style="background-color: #77d94c">
   <div>


                <br><br><br>
            <form action = "existing.php">
                <center>

                        <!-- Using our special .button class to make the button look a precise way, plus also text centering.  -->
                        <button class="button button1"><b>Existing User</b></button><br>

                </center>
            </form>

            <form action = "new.php">
                <center>

                            <!-- Using our special .button class to make the button look a precise way, plus also text centering.  -->
                            <button class="button button1"><b>New User</b></button><br>

                </center>
            </form>


     </div>


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
