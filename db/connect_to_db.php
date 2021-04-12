<?php

function connect($username, $password)
{
  
  $servername = "oceanus";
  $table = $username . "_db";

  $conn = new mysqli($servername, $username, $password, $table);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  return $conn;
  
}
function create_table($username, $password){
	$sql = "CREATE TABLE Users (
	username VARCHAR(20) NOT NULL
	)";
	if (connect($username, $password)->query($sql) === TRUE) {
  		echo "Users created successfully";
	}
 	else {
  		echo "Error creating table: " . $conn->error;
	}
}

?>
