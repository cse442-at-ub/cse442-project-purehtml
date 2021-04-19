<?php

function get_db_credentials(){
	$myfile = file_get_contents("../db/db_credentials.txt");
        $contents = explode(":", $myfile);
        return $contents; 
}

function connect()
{
  $credentials = get_db_credentials();
  $username = trim($credentials[0]);
  $password = trim($credentials[1]);

  $servername = "oceanus";
  $table = $username . "_db";

  $conn = new mysqli($servername, $username, $password, $table);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  return $conn;
  
}

connect();
function create_table($conn){
	$sql = "CREATE TABLE Users (
	username VARCHAR(20) NOT NULL,
        password VARCHAR(20) NOT NULL,
        email VARCHAR(20) NOT NULL
	)";
	if ($conn->query($sql) === TRUE) {
  		echo "Users created successfully\n";
	}
 	else {
  		echo "Error creating table: " . $conn->error;
	}
}

function add_user($conn, $user, $pass, $email){
	$sql = 'INSERT INTO Users (username, password, email)
		VALUES (?, ?, ?);';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $user, $pass, $email);
	
	if ($stmt->execute() === TRUE) {
                echo "User added to Users successfully\n";
        }
	else {
              	echo "Error creating table: " . $conn->error;
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

$user = "jdkazime";
$pass = "50181732";
connect($user, $pass);
?>


