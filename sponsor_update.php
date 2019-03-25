<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Capstone Management System</title>

    <link rel="shortcut icon" type="image/ico" href="/ksu_logo.ico">
    <link href="css/reset.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>
    <?php
    include 'php/dbconfig.php';
    $sql = "SELECT Project_ID, Title FROM Project;";
    $project_title = mysqli_query($conn, $sql);
    ?>

    <!-- NAVIGATION -->
    <div id="nav-placeholder">

    </div>
    <script>
        $(function() {
            $("#nav-placeholder").load("nav.html");
        });
    </script>

    <!-- Update Form -->
    <div class="main">
        <h2>Sponsor Update Form</h2>
        <p class="required">* required field</p><br>
        <form action="php/sponsor_update_form.php" method="POST">
            <div class="dropdown">
                <select name="project-id" id="project-list" class="dropbtn" required>
                    <div class="dropdown-content">
                        <option>Select Project</option>
                        <?php while ($results = mysqli_fetch_array($project_title)) { ?>
                            <option value="<?php echo $results['Project_ID']; ?>"><?php echo $results['Title']; ?>
                        </option>
                        <?php 
                    } ?>
                    </div>
                </select>
                <span class="required">*</span>
            </div>
            <br>
            Sponsor ID: <input type="text" name="sponsor-id" required>
            <span class="required">*</span><br>

            <h3>What do you think of the project progress?</h3>
            <span class="required">*</span><br>
            <input type="radio" name="progress" value="0" required>Ahead of schedule<br>
            <input type="radio" name="progress" value="1">On schedule<br>
            <input type="radio" name="progress" value="2">Behind schedule<br>
            <input type="radio" name="progress" value="3">Severely behind schedule<br>

            <h3>What do you think of the student team's responsiveness?</h3><br>
            <span class="required">*</span><br>
            <input type="radio" name="responsiveness" value="0" required>Lightning fast <br>
            <input type="radio" name="responsiveness" value="1">Right on par <br>
            <input type="radio" name="responsiveness" value="2">Needs improvement <br>

            <h3>General feedback such as details on the questions above, comments on a specific student or event, suggestions on improving the process, etc. Basically, anything that you think can improve your experience on this capstone project.</h3>
            <input type="text" name="feedback"><br>
            <input type="submit">
        </form>
    </div>

    <!-- FOOTER -->
    <div id="foot-placeholder">

    </div>
    <script>
        $(function() {
            $("#foot-placeholder").load("footer.html");
        });
    </script>
</body>

</html> 