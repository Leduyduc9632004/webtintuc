<?php
$host = DB_HOST;
$port = DB_PORT;
$username = DB_USERNAME;
$password = DB_PASSWORD;
$db_name = DB_NAME;

// Create connection
try {
  $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch(PDOException $e) {
  debug("Connection failed: " . $e->getMessage());
}
?>