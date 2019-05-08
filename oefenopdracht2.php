<?php
$servername = "localhost";
$databasename = "db_level2_opdr1";
$username = "DC";
$password = "DC2";

$conn = new mysqli($servername, $username, $password, $databasename);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>