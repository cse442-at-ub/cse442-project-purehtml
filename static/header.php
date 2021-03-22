<?php

echo '
<!-- The headers. -->
<head>

        <meta charset = "utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- The page title.  Not to be confused with the text at the top. -->
        <title>Team PureHTML: Spotifind</title>

        <!-- Forcing our page to adjust to the aspect ratio of the device. -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="stylesheet.css" media="screen"/>

</head>

<header>

  <h1 align="center"><a href="index.php"><img src="media/logo.png" alt="SpotiFind" width="128" height="128"></a></h1>

  <div class="search" id = "search">

    <form action = "php/set_artist.php" method = "post">
      <center>
      <input type="text" placeholder="Search an artist" id = "search_entry" name = "artist" required maxlength = "20">
      <input type="submit" value = "submit">
      </center>
    </form>

  </div>

</header>
'


?>
