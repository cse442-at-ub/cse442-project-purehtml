<?php

function getCredentials()
{
  
	$path = 'credentials.txt';

	$file = file_get_contents($path, "a") or die("No permission!");

	$details = explode(":", $file);

	$id = trim($details[0]);
	$secret = trim($details[1]);

	return array($id, $secret);
  
}

?>
