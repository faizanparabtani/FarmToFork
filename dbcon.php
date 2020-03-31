<?php

$servername = "remotemysql.com";
$username = "R6vLKAaC04";
$password = "5RkA8NFFSU";
$dbname = "R6vLKAaC04";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}

?>