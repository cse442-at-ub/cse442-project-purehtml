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
?>
