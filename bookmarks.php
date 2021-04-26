<?php
// Start the session
session_start();
?>
<html>

<!-- The 'style' block is basically in-line CSS. -->
<!-- Look at a CSS wiki to understand what each element does.  I'm sure some are not needed. -->

<!-- Basically all of this was explained in index.html. -->

<?php include "header.php";include "db/connect_to_db.php";?>
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
                                $sql = "SELECT * FROM Bookmarks WHERE username = ?;";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("s", $_SESSION['username']);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $qry = $result -> fetch_array(MYSQLI_NUM);

                                


                                if(is_null($qry) == True){
                                    print "<h1>No Bookmarks Found</h1>";
                                }

                                else{
                                    
                                    $bookmarks = array_slice($qry, 2, 10);
                                    $bookmarks = array_diff($bookmarks, array("."));
                                    print "<h1>Your Bookmarks:</h1>";
                                    foreach ($bookmarks as $bookmark) {
                                        print "<h2>$bookmark</h2>";
                                    }
                                }

                                /*
                                $file = 'data/booksmarks.json';
                                $json = file_get_contents($file) or die('No Open!');
                                $dict = json_decode($json, true);


                                if (array_key_exists($_SESSION['username'], $dict) == False){
                                        print "<h1>No Bookmarks Found</h1>";
                                }

                                else{
                                        print "<h1>Your bookmarks:</h1>";
                                        $bookmarks = array_reverse($dict[$_SESSION['username']]);
                                        
					foreach($bookmarks as $bookmark){

						print "<h2>$bookmark</h2>";
					}
				}*/
                                ?><br><br><br><br>
                        </center>

                </div>


<br><br><br>
<?php include "footer.php"; ?>

</body>


</html>

