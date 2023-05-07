<?php
$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$db_name = "couriermanagementsystem"; 

$conn = mysqli_connect($host, $user, $pass, $db_name);

// Checking the connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}