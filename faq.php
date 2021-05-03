<?php
// Start the session
session_start();
?>

<html>
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

<?php include "header.php"; ?>

<!-- The body.  Basically, where all of the content goes. -->
<body style="background-color: #77d94c">
   <div>
	<center>
	<h1>Frequently Asked Questions</h1>
	</center>
     </div><br>

     <div><center><h2> How do I make get a recommendation? </h2><p> At the top of the site is a search bar.  Enter your favorite artist and then click on the button.  If you are still confused, there is a tutorial for your benefit</p></h2><center></div><br>

     <div><center><h2> Why can't I get recommendations for certain artists? </h2><p> Spotify's API doesn't allow us to get artist information directly, so we have to use other means to get there.  Also, our results are based on collaborations, so if your artist doesn't feature other artists then we cannot generate recommendations.</p></center></div><br>
     
     <div><center><h2> Why does it take longer than others to get my recommendations?</h2><p> If the search has already been made, then we give you that data.  If not, you're the first to make the algorithm search, so we have to generate results using you.  Also, if an artist collaborates a lot, then it takes longer.</p></center><br>

     <div><center><h2> Do you make money from this? </h2><p> No, Spotify allows us to do this for research purposes.</p></center></div><br>

     <div><center><h2> How does this work? </h2><p> We use graph algorithms like breadth-first search in combination with k-nearest neighbors to get the best results.</p></center></div><br>

     <div><center><h2> How can I trust you with my data?</h2><p> Everything is stored discreetly on a database.  Only the server and you can access it.</p></center></div><br>

     <div><center><h2> Where do you go from here?</h2><p> We would like to improve the algorithm by including more layers and changing the starting point.</p></center></div><br>

     <div><center><h2> Who can I contact to reach out about this site? </h2> <p> In the footer, there is a link to an About Us page.  You can find our contact information there.</p></h2><br>

     <div><center><h2> Who is the best developer?</h2><p> Jeremy. </p></center></div>
    <br><br><br><br><br><br><br><br>
    <?php include "footer.php"; ?>
</body>
</html>

