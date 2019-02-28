<?php
$servername = "localhost";
$username = "web";
$password = 'Capst0n3!';
$dbname = 'CAPSTONE';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "";

$conn->close();
?>
