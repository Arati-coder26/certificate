<?php
$dbHostname = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "icfhe_certificate";

$db = new mysqli($dbHostname, $dbUsername, $dbPassword, $dbName); 
 

if($db){
	echo "Connection Sucessfully!";
}
else
  {
  echo "Connection fail";
}
?>