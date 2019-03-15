<?php 
echo file_get_contents("../nav.html");
// echo file_get_contents("../upload_success.html");

confirmed();

$servername = 'localhost';
$username = 'web';
$password = 'Capst0n3!';
$dbname = 'capstone';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Project_ID, Project_No, Title FROM Project;";
$results = $conn->query($sql);

if ($results->num_rows > 0) {
    echo "<div ><table style=\"text-align: center; margin: 0 auto;\"><tr><th>Project ID</th><th>Project Number</th><th>Title</th></tr>";
    while($row = $results->fetch_assoc()) {
        echo "<tr><td>" . $row["Project_ID"] . "</td><td>" . $row["Project_No"] . "</td><td>" . $row["Title"] . "</td></tr>";
    }
    echo "</table></div>";
} else {
    echo "Nothing to show...";
}
$conn->close();

function confirmed() {
    echo "<div class=\"main\" style=\"text-align: center;\"><h2>Your file has been submitted!</h2><br><h3>Current projects in database:<br></h3></div>";
}
 