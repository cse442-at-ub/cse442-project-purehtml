<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>

<!-- The 'style' block is basically in-line CSS. -->
<!-- Look at a CSS wiki to understand what each element does.  I'm sure some are not needed. -->

<style>
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
margin: 100px 2px;
cursor: pointer;
font-family: "Helvetica", "Arial", sans-serif; 
}


.button1 {width: 150px; height: 20px; font-size: 17px; font-family: inherit;}
</style>
<!-- Basically all of this was explained in index.html. -->
    
    
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
 
<!-- This is the header that follows  you around page to page. -->
<header>
    
    <!-- Clicking on this redirects the user to index.html. -->
  <h1 align="center"><a href="index.php"><img src="media/logo.png" alt="SpotiFind" width="128" height="128"></a></h1>
    
  <div class="search" id = "search">
     <center>  
        <!-- The "method = 'get'" keyword posts the value to the page. -->
    <form action = "php/set_artist.php" method = "post">
            
      <input type="text" placeholder="Search an artist" id = "search_entry" name = "artist">
      <input type="submit" value = "submit">
       
    </form>
         
         </center> 
        
  </div>
    
</header>

<body style="background-color: #77d94c">
	<div>
		<center>
			<?php
		 		print "<h1>Hello User, you searched: </h1> <p>{$_SESSION["search"]}</p>"
			?>
		</center>
        </div>
        <!-- <p> just creates a new paragraph or more specifically a body of text. -->
    
  
         <!-- <div> elements are stacked vertically so this will appear under the last <div>. -->
         <div>
           
                <!-- '<form action = "result.php">' redirects to result.html upon completion of the action.  In this case, clicking a button. -->

                    <div style='float:left;  width:30%'>

                <form action = "random.php">
                  
                        <center>
                          
                                <!-- Using our special .button class to make the button look a precise way, plus also text centering.  -->
                                <button class="button button1"><b>Random Song</b></button><br>
                          
                        </center>
                  

                </form></div>
                <div style='float:right;  width:30%'>
                <form action = "statistics.php">
                    <center>
                          
                                <!-- Using our special .button class to make the button look a precise way, plus also text centering.  -->
                                <button class="button button1"><b>Statistics</b></button><br>
                          
                        </center>
                  
                </form>
             </div>
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
