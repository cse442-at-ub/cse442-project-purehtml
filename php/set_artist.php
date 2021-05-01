<html>
<?php
// Start the session
session_start();
?>

<?php


include '../spotify/get_songs.php';
// Set the working artist.


include "../db/connect_to_db.php";

$conn = connect('../db/db_credentials.txt');
// A boolean check to make sure that the fields have values.


// Check if the artist is set.
 if (isset($_POST['artist'])) {
    // The int 0 messes up some things, so this fixes that.
    if ($_POST['artist'] == "0"){
       $current_artist = "0";
    }

    // We have a die statement in case somehow the artist has not been set.
    else{
         $current_artist = $_POST['artist'] or die("I tried:(");
    }

    // We do this for cases like A$AP Rocky.  We'll need to do a more complete
    // regexing in the future.
    $current_artist = str_replace('$', 'S', $current_artist);

    // only alphanumeric characters and non-leading whitespaces.
    $current_artist = preg_replace("/[^a-z0-9 ]/i", "", $current_artist);
    $current_artist = trim($current_artist, $characters = " \n\r\t\v\0");

    // check to make sure that it isn't empty after trimming whitespace.
    $len = strlen($current_artist);

    // Basically, if the search is not alphanumeric we reject the user.
    if ($len == 0){
        echo "<script>alert('You must have a valid search!');</script>";
        echo "<script> location.href = '../index.php'; </script>";
    }
    else{
	
	
                $sql = "SELECT name, id FROM Artists";
                $result = mysqli_query($conn,$sql);
	$similarity = array();
	$sim_ids = array();
	while(null !== ($qry = mysqli_fetch_assoc($result))){
		
     		$artist = $qry['name'];
	

  		 
       		 foreach($qry as $artist){
			
            // Returns similarity as an integer (sim) and percentage (perc)
            $sim = similar_text(strtolower($current_artist), strtolower($artist), $perc);
            $similarity[$artist] = $perc;
	    
	    $sim_ids[$artist] = $qry['id'];
         
         }
    
    # Returns the id of the maximum similarity.
    $max_perc = max($similarity);
    $most_similar = array_search(max($similarity), $similarity);
    $best_id = $sim_ids[$most_similar];
     }
    
     
     // This is just Spotify stuff.
     $credentials = getCredentials();
     $client_id = $credentials[0];
     $client_secret = $credentials[1];
     $token = get_authenicated($client_id, $client_secret);
     $tracks = get_top_artists($current_artist, $token);
     $id_artist = get_artist_id($current_artist, $tracks);
     $id_perc = $id_artist[2];
     if ($id_perc >= $max_perc){
     	$top_match = $id_artist[1];
	$id = $id_artist[0];
     }
     else{
	$top_match = $most_similar;
	$id = $best_id;
     }
     // If there's a result for that search.
     if ($top_match != ""){
       $_SESSION['search'] = $top_match;
       $user = $_SESSION["username"];

       // Is the user logged in?
       if ($user != ""){
  		$stmt = $conn->prepare("SELECT * FROM History WHERE username = ?");
                $stmt->bind_param("s", $user);
                $stmt->execute();
		$result = $stmt->get_result();
                $qry = $result -> fetch_array(MYSQLI_NUM);

                if (is_null($qry) == True){
			$sql = "INSERT INTO History (username, i1, i2, i3, i4, i5, i6, i7, i8, i9, i10)
			VALUES (?, '.', '.', '.', '.', '.', '.', '.', '.', '.', '.');";
       			 $stmt = $conn->prepare($sql);
                         $stmt->bind_param("s", $user);
                         $stmt->execute();
                }

		$stmt = $conn->prepare("SELECT * FROM History WHERE username = ?");
                $stmt->bind_param("s", $user);
                $stmt->execute();
                $result = $stmt->get_result();
                $qry = $result -> fetch_array(MYSQLI_NUM);

                $arr = array_slice($qry, 1, 12);
                array_shift($arr);
                $arr[] = $top_match;
		$sql = "UPDATE History SET i1 = ?, i2 = ?, i3 = ?, i4 = ?, i5 = ?, i6 = ?, i7 = ?, i8 = ?, i9 = ?, i10 = ? WHERE username = ?;";
 		
		$stmt = $conn->prepare($sql);
               	$arr[] = $user;
                $types = str_repeat("s", count($arr)); 
                
		$stmt->bind_param($types, ...$arr);
		$stmt->execute();
                
       }

       // Get the stuff to make random better.
       //$id = $id_artist[0];
       $albums = get_all_albums($id, $token);
       $all_tracks = get_all_tracks($albums, $token);
       // Set variables for later.
       $_SESSION['all_tracks'] = $all_tracks;
       $_SESSION['token'] = $token;
       $_SESSION['artist_tracks'] = $tracks;
       echo "<script> location.href = '../result.php'; </script>";
     }
     else{
       // The search isn't valid, so we empty this.
       $_SESSION['all_tracks'] = array();
       $_SESSION['artist_tracks'] = array();
       $_SESSION['search'] = "";
       echo "<script> location.href = '../result.php'; </script>";
    }
 }
}
?>
