<?php
// Start the session
session_start();
?>
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

<?php include "header.php"; ?>

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

                <form action = "php/get_random.php">

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

<?php include "footer.php"; ?>

</body>

</html>
