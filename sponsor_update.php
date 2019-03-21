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
    $project_title = mysqli_query($conn,$sql);
    ?>

    <!-- NAVIGATION -->
    <div id="nav-placeholder">

    </div>
    <script>
        $(function () {
            $("#nav-placeholder").load("nav.html");
        });
    </script>

    <div class="main">
        <form action="php/sponsor_update_form.php" method="POST">
            <select name="project-id" id="project-list">
                <option>Select Project</option>
                <?php while($results = mysqli_fetch_array($project_title)){?>
                    <option value="<?php echo $results['Project_ID'];?>"><?php echo $results['Title'];?>
                    </option>
                    <?php }?>
            </select><br>
            <!-- Sponsor Update ID (remove): <input type="text" name="sponsor-update-id"><br> -->
            Sponsor ID: <input type="text" name="sponsor-id"><br>
            <!-- Project ID: <input type="text" name="project-id"><br> -->
            <!-- Date: <input type="date" name="date"><br> -->
            Progress int: <input type="text" name="progress"><br>
            Responsiveness int: <input type="text" name="responsiveness"><br>
            Feedback: <input type="text" name="feedback"><br>
            <input type="submit">
        </form>
    </div>

    <!-- FOOTER -->
    <div id="foot-placeholder">

    </div>
    <script>
        $(function () {
            $("#foot-placeholder").load("footer.html");
        });
    </script>
</body>

</html>