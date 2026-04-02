<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db ="icfhe_certificate";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
if(!$conn){
	die("Database connection error");
}
?>