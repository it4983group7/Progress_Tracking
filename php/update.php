<?php
$servername = 'localhost';
$username = 'web';
$password = 'Capst0n3!';
$dbname = 'CAPSTONE';

try {
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Create connection
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sponsor_update_id = $_POST["sponsor-update-id"];
    $sponsor_id = $_POST["sponsor-id"];
    $date = $_POST["date"];
    $progress = $_POST["progress"];
    $responsiveness = $_POST["responsiveness"];
    $feedback = $_POST["feedback"];
    
    $sql = "INSERT INTO Sponsor_Update(Sponsor_Update_ID, Sponsor_ID, Date, Progress, Responsiveness, Feedback) VALUES ($sponsor_update_id, $sponsor_id, $date, $progress, $responsiveness, $feedback)";
    
    $conn->exec($sql);
    echo "New record created successfully";
}
catch(Exception $e) {
    echo $e->getMessage();
}

$conn->close();
?>
