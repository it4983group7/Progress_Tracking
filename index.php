<?php
echo file_get_contents("../nav.html");

$servername = 'localhost';
$username = 'web';
$password = 'Capst0n3!';
$dbname = 'capstone';

$conn = new mysqli($servername, $username, $password, $dbname);

// Create connection
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
