<?php
echo file_get_contents("../nav.html");

include 'dbconfig.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// $student_update_id = $_POST["sponsor-update-id"];
$student_update_id = date('YmdHis');
$student_id = $_POST["sponsor-id"];
$project_id = $_POST["project-id"];
// $date = $_POST["date"];
$date = date('Y-m-d H:i:s');
$progress = $_POST["progress"];
$summary = $_POST["summary"];

$sql = "INSERT INTO Student_Update(Student_Update_ID, Student_ID, Project_ID, Date, Progress, Summary) VALUES ($student_update_id, $student_id, $project_id, \"$date\", $progress, \"$summary\")";
echo $sql.'<br>';
if ($conn->query($sql) === TRUE) {
    // echo "New record created successfully";
    header("Location: /upload_success.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    
$conn->close();
?>
