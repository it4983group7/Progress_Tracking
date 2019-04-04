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

  $sql = "SELECT Project.Year, Project.Project_No, Project.Project_ID, Project.Title, Sponsor_Update.Progress, Sponsor_Update.Feedback FROM Project LEFT JOIN Sponsor_Update ON Project.Project_ID=Sponsor_Update.Project_ID AND Sponsor_Update.Sponsor_Update_ID IN (SELECT MAX(Sponsor_Update_ID) FROM Sponsor_Update GROUP BY Sponsor_Update_ID AND Project.Project_ID=Sponsor_Update.Project_ID);";

  $projects = mysqli_query($conn, $sql);

  ?>
  
  <!-- NAVIGATION -->
  <div id="nav-placeholder">

  </div>
  <script>
    $(function() {
      $("#nav-placeholder").load("nav.html");
    });
  </script>

  <!-- HEADER -->
  <section class="header">
    <h1 id="cms">Capstone Management System</h1>
    <h3 id="dept">Kennesaw State University Department of Information
      Technology </h3>
  </section>

  <!-- MAIN -->
  <section class="main">
    <div style="text-align: center;">

      <div class="gallery">
        <?php while (($results = mysqli_fetch_array($projects))) { ?>
          <?php if ($results['Progress'] == '0' || $results['Progress'] == '1') : ?>
            <div class="thumbnailOT">
                <?php elseif ($results['Progress'] == '2') : ?>
            <div class="thumbnailIP">
              <?php elseif ($results['Progress'] == '3') : ?>
            <div class="thumbnailNOT">
              <?php else : ?>
              <div class="thumbnailND">
                <?php endif ?>
                <div>
                  <a href="project.php?projectID=<?php echo $results['Project_ID'];?>" class="project_link">

                    <h4><?php echo $results['Title'] ?></h4>
                        <?php echo '<br><strong>Project Number:</strong> ' . $results['Project_No'] ?>
                        <?php echo '<br><strong>Project Year:</strong> ' . $results['Year'] ?>
                        <?php echo '<br><strong>Progress Status:</strong>(demo) ' . $results['Progress'] ?>
                        <?php echo '<br><strong>Last Feedback:</strong><br>' . $results['Feedback'] ?>
                        </a>
                      </div>
                    </div>
                        <?php
                      } ?>
            </div>
          </div>
  </section>

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