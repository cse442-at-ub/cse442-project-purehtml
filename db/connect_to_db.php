<?php

function get_db_credentials($path){
	$myfile = file_get_contents($path);
        $contents = explode(":", $myfile);
        return $contents; 
}

function connect($path)
{
  $credentials = get_db_credentials($path);
  $username = trim($credentials[0]);
  $password = trim($credentials[1]);

  $servername = "oceanus";
  $table = $username . "_db";

  $conn = new mysqli($servername, $username, $password, $table);

  return $conn;
  
}

function create_table($conn){
	$sql = "CREATE TABLE Users (
	username VARCHAR(20) NOT NULL,
        password VARCHAR(20) NOT NULL,
        email VARCHAR(50) NOT NULL,
	date VARCHAR(20) NOT NULL)";
	if ($conn->query($sql) === TRUE) {
  		//echo "Users created successfully\n";
	}
 	else {
  		//echo "Error creating table: " . $conn->error;
	}
}

function add_user($conn, $user, $pass, $email, $date){
	$sql = 'INSERT INTO Users (username, password, email, date)
		VALUES (?, ?, ?, ?);';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $user, $pass, $email, $date);
	
	if ($stmt->execute() === TRUE) {
                //echo "User added to Users successfully\n";
        }
	else {
              	//echo "Error creating table: " . $conn->error;
        }

}
function query_username($conn, $username)
{
	$prepared = $conn->prepare("SELECT * FROM Users WHERE username = ?");
	$prepared->bind_param("s",$username);
	$prepared->execute();
	$result = $prepared->get_result();
	return $result->fetch_array(MYSQLI_NUM);
}

function query_email($conn, $email)
{
  $prepared = $conn->prepare("SELECT * FROM Users WHERE email = ?");
  $prepared->bind_param("s",$email);
  $prepared->execute();
  $result = $prepared->get_result();
  return $result->fetch_array(MYSQLI_NUM);
}

?>


