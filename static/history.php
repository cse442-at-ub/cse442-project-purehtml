<?php
// Start the session
session_start();
?>
<html>

<!-- The 'style' block is basically in-line CSS. -->
<!-- Look at a CSS wiki to understand what each element does.  I'm sure some are not needed. -->

<!-- Basically all of this was explained in index.html. -->

<?php include "header.php";?>

<style>
#submit{
   width: 500px;
   font-family: "Bebas Neue", cursive;
}
</style>

<body style="background-color: #77d94c">

                <div>
                        <center>
                                <?php

                                $file = 'data/history.json';
                                $json = file_get_contents($file) or die('No Open!');
                                $dict = json_decode($json, true);


                                if (array_key_exists($_SESSION['username'], $dict) == False){
                                        print("<h1>No Search History Found</h1>");
                                }

                                else{
                                        $history = array_reverse($dict[$_SESSION['username']]);

                                        if(sizeof($history) == 0){
                                                print("<h1>No Search History Found</h1>");
                                        }


                                        else{
                                                print("<h1>Recent searches</h1>");


                                                for($k = 1; $k <= sizeof($history); $k++){
                                                        $base_string = "<form action = 'php/set_artist.php'  id = 'history' method = 'post'>";
                                                        $artist_string = $base_string . "<input type = 'submit' name = 'artist' id = 'submit'  value = '{$k}: {$history[$k - 1]}'>";
                                                        $artist_string = $artist_string . "</form>";

                                                        print $artist_string;

                                                }
                                        }
                                }




                                ?><br><br><br><br>
                        </center>

                </div>


<br><br><br>
<?php include "footer.php"; ?>

</body>


</html>
