<?php
// Start the session
session_start();
?>
<html>

<!-- The 'style' block is basically in-line CSS. -->
<!-- Look at a CSS wiki to understand what each element does.  I'm sure some are not needed. -->

<!-- Basically all of this was explained in index.html. -->

<?php include "header.php"; include "db/connect_to_db.php";?>

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
				
            			$conn = connect('db/db_credentials.txt');
                                $sql = "SELECT * FROM History WHERE username = ?;";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("s", $_SESSION['username']);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $qry = $result -> fetch_array(MYSQLI_NUM);

				


                                if(is_null($qry) == True){
                                    print "<h1>No Search History Found</h1>";
                                }

                                else{
                                        $history = array_diff($qry, array("."));
					array_shift($history);
                                        if(sizeof($history) == 0){
                                                print("<h1>No Search History Found</h1>");
                                        }


                                        else{
                                                print("<h1>Recent searches</h1>");


                                                for($k = 1; $k <= sizeof($history); $k++){
                                                        $base_string = "<form action = 'php/set_artist.php'  id = 'history' method = 'post'>";
                                                        $artist_string = $base_string . "<input type = 'submit' name = 'artist' id = 'submit'  value = '{$history[$k - 1]}'>";
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
