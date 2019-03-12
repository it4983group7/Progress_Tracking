<?php
 // Requires PhpSpreadsheet https://github.com/PHPOffice/PhpSpreadsheet
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

require $root . '/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$target_dir = $root . "/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


// Allow certain file formats
if ($imageFileType != "xlsx") {
    echo "Sorry, only XLSX files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        processData($target_file);

        // echo "<br>The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        header('Location: '.'../upload_success.html');
        die();
    } else {
        echo "<br>Sorry, there was an error uploading your file.";
    }
}
function processData($target_file)
{
    // Read spreadsheet
    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $reader->setReadDataOnly(true);
    $spreadsheet = $reader->load($target_file);

    $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
    $term_year = null;
    $year = null;
    $term = null;
    $project_id = date('YmdHis');


    foreach ($sheetData as $i => $value) {
        $subArr = $sheetData[$i];
        $check = 0;

        $pro_number = null;
        $pro_title = null;
        $pro_org = null;
        $pro_desc = null;
        $pro_skill_req = null;
        $pro_duty = null;
        $pro_ben_stu = null;
        $pro_resource = null;

        foreach ($subArr as $j => $jval) {
            $project_id = $project_id + 1;

            if ($i == 1 && $j == 'A') {
                $term_year = $subArr[$j];
                $term_year = explode(" ", $term_year);
                $term = $term_year[0];
                $year = $term_year[1];
            }
            if ($subArr[$j] != '' && preg_match('/[0-9]/', $subArr[$j]) && !preg_match('/[A-Za-z]/', $subArr[$j])) {
                $check = 1;
            }
            if ($check == 1) {
                if ($j == 'A') {
                    $pro_number = $subArr[$j];
                } elseif ($j == 'B') {
                    $pro_title = $subArr[$j];
                } elseif ($j == 'D') {
                    $pro_org = $subArr[$j];
                } elseif ($j == 'E') {
                    $pro_desc = preg_replace("\"","",$subArr[$j]);
                } elseif ($j == 'F') {
                    $pro_skill_req = $subArr[$j];
                } elseif ($j == 'G') {
                    $pro_duty = $subArr[$j];
                } elseif ($j == 'H') {
                    $pro_ben_stu = $subArr[$j];
                } elseif ($j == 'I') {
                    $pro_resource = $subArr[$j];
                }
            }
            // }
        }
        if ($pro_number != null) {
            // echo "<br>Term/Year: " . $term_year;
            // echo "<br>Project Number: " . $pro_number;
            // echo "<br>Project Title: " . $pro_title;
            // echo "<br>Organization: " . $pro_org;
            // echo "<br>Description: " . $pro_desc;
            // echo "<br>Skills Required: " . $pro_skill_req;
            // echo "<br>Duties: " . $pro_duty;
            // echo "<br>Students Benefits: " . $pro_ben_stu;
            // echo "<br>Resources: " . $pro_resource;

            $sql = "INSERT INTO Project(Project_ID, Term, Year, Project_No, Title, Description, Student_Skills, Student_Duties, Student_Benefits, Resources) VALUES (\"$project_id\", \"$term\", $year, \"$pro_number\", \"$pro_title\", \"$pro_desc\", \"$pro_skill_req\", \"$pro_duty\", \"$pro_ben_stu\", \"$pro_resource\");";
            connectDB($sql);
        }
        $check = 0;
    }
    // var_dump($sheetData);
}
function connectDB($sql)
{
    echo "<br><br>";
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

    if ($conn->query($sql) === true) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
