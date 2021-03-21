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
padding-top: 20px;
margin: 5px;
text-align: center;
text-shadow: 1px 1px 0px #515151;
font-weight: bold;
position: relative;
line-height: 1;
padding-bottom: 35px;
display: inline-block;
cursor: pointer;
font-family: "Helvetica", "Arial", sans-serif;
}


.button1 {width: 150px; height: 20px; font-size: 17px; font-family: inherit;}
</style>
<!-- Basically all of this was explained in index.html. -->

<?php include "header.php";?>

<body style="background-color: #77d94c">
        <div class="row">
                
               

                <div class="column" style="min-width: 400px; margin: 0 auto;">
                        <center>
                                <?php
                                
                                $file = 'data/history.json';
                                $json = file_get_contents($file) or die('No Open!');
                                $dict = json_decode($json, true);
                                
                                
                                if (array_key_exists($_SESSION['username'], $dict) == False){
                                        print("<h1>No Search History Found</h1>");
                                }

                                else{
                                        $history = $dict[$_SESSION['username']];
                                        
                                        if(sizeof($history) == 0){
                                                print("<h1>No Search History Found</h1>");
                                        }
                                        
                                        
                                        else{
                                                print("<h1>Recent searches</h1>");
                                                for($k = 1; $k <= sizeof($history); $k++){
                                                        print("<h2>{$k}: {$history[$k - 1]} </h2>");

                                                }
                                        }
                                }

                                

                                
                                ?><br><br><br><br>
                        </center>

                </div>
                <!-- <p> just creates a new paragraph or more specifically a body of text. -->
</div>
                

<?php include "footer.php"; ?>

</body>


</html>