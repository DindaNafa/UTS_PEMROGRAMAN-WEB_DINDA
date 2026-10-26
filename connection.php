<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db5e";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// Definisikan juga nama tabel default jika belum ada
if (!defined('DB_TABLE_NAME')) {
    define('DB_TABLE_NAME', 'nilaimhsw');
}
?>