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

// $sponsor_update_id = $_POST["sponsor-update-id"];
$sponsor_update_id = date('YmdHis');
$sponsor_id = $_POST["sponsor-id"];
$project_id = $_POST["project-id"];
// $date = $_POST["date"];
$date = date('Y-m-d H:i:s');
$progress = $_POST["progress"];
$responsiveness = $_POST["responsiveness"];
$feedback = $_POST["feedback"];

$sql = "INSERT INTO Sponsor_Update(Sponsor_Update_ID, Sponsor_ID, Project_ID, Date, Progress, Responsiveness, Feedback) VALUES ($sponsor_update_id, $sponsor_id, $project_id, \"$date\", $progress, $responsiveness, \"$feedback\")";
echo $sql.'<br>';
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    
$conn->close();
?>
