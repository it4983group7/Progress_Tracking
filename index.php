<body>

<?php
   include 'php/dbconfig.php';
      $projectName= "SELECT Project_ID, Title FROM project";
	  $projectTitle = mysqli_query($conn, $projectName);
	  $projectStatus = "SELECT Sponsor_Update_ID, Progress FROM sponsor_update";
	  $projectProgress = mysqli_query($conn, $projectStatus);
	  
      ?>
  <!-- NAVIGATION -->
  <div id="nav-placeholder">

  </div>
  <script>
    $(function () {
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
	  <div class="thumbnailOT">
	  <?php while(($results = mysqli_fetch_array($projectTitle)) && ($status = mysqli_fetch_array($projectProgress)){?> 
                   <h4> <?php echo $results['Project_ID'];?>
					<?php echo $results['Title'];?></h4>
                    <?php echo "Status: " $status['Progress'];?><br>
					<?php echo "More Information";?>
                    <?php }?>
</div>
        <div class="thumbnailOT">
          <?php echo "<h4>Project 1 Title</h4>" ?>
          <p class="tag">Status: On Track</p>
          <p class="tag">More Information</p> <!-- add link to project page here -->
        </div>
        <div class="thumbnailIP">
          <h4>Project 2 Title</h4>
          <p class="tag">Status: In Progress</p>
          <p class="tag">More Information</p> <!-- add link to project page here -->
        </div>
        <div class="thumbnailNOT">
          <h4>Project 3 Title</h4>
          <p class="tag">Status: Not On Track</p>
          <p class="tag">More Information</p> <!-- add link to project page here -->
        </div>
        <div class="thumbnailIP">
          <h4>Project 4 Title</h4>
          <p class="tag">Status: </p>
          <p class="tag">More Information</p> <!-- add link to project page here -->
        </div>
      </div>

      <div class="gallery">
        <div class="thumbnailIP">
          <h4>Project 5 Title</h4>
          <p class="tag">Status: </p>
          <p class="tag">More Information</p> <!-- add link to project page here -->
        </div>
        <div class="thumbnailIP">
          <h4>Project 6 Title</h4>
          <p class="tag">Status: </p>
          <p class="tag">More Information</p> <!-- add link to project page here -->
        </div>
        <div class="thumbnailIP">
          <h4>Project 7 Title</h4>
          <p class="tag">Status: </p>
          <p class="tag">More Information</p> <!-- add link to project page here -->
        </div>
        <div class="thumbnailIP">
          <h4>Project 8 Title</h4>
          <p class="tag">Status: </p>
          <p class="tag">More Information</p> <!-- add link to project page here -->
        </div>
      </div>

      <div class="gallery">
        <div class="thumbnailIP">
          <h4>Project 9 Title</h4>
          <p class="tag">Status: </p>
          <p class="tag">More Information</p> <!-- add link to project page here -->
        </div>
        <div class="thumbnailIP">
          <h4>Project 10 Title</h4>
          <p class="tag">Status: </p>
          <p class="tag">More Information</p> <!-- add link to project page here -->
        </div>
        <div class="thumbnailIP">
          <h4>Project 11 Title</h4>
          <p class="tag">Status: </p>
          <p class="tag">More Information</p> <!-- add link to project page here -->
        </div>
        <div class="thumbnailIP">
          <h4>Project 12 Title</h4>
          <p class="tag">Status: </p>
          <p class="tag">More Information</p> <!-- add link to project page here -->
        </div>
      </div>

      <div class="gallery">
        <div class="thumbnailIP">
          <h4>Project 13 Title</h4>
          <p class="tag">Status: </p>
          <p class="tag">More Information</p> <!-- add link to project page here -->
        </div>
        <div class="thumbnailIP">
          <h4>Project 14 Title</h4>
          <p class="tag">Status: </p>
          <p class="tag">More Information</p> <!-- add link to project page here -->
        </div>
        <div class="thumbnailIP">
          <h4>Project 15 Title</h4>
          <p class="tag">Status: </p>
          <p class="tag">More Information</p> <!-- add link to project page here -->
        </div>
        <div class="thumbnailIP">
          <h4>Project 16 Title</h4>
          <p class="tag">Status: </p>
          <p class="tag">More Information</p> <!-- add link to project page here -->
        </div>
      </div>

      <div class="gallery">
        <div class="thumbnailIP">
          <h4>Project 17 Title</h4>
          <p class="tag">Status: </p>
          <p class="tag">More Information</p> <!-- add link to project page here -->
        </div>
        <div class="thumbnailIP">
          <h4>Project 18 Title</h4>
          <p class="tag">Status: </p>
          <p class="tag">More Information</p> <!-- add link to project page here -->
        </div>
        <div class="thumbnailIP">
          <h4>Project 19 Title</h4>
          <p class="tag">Status: </p>
          <p class="tag">More Information</p> <!-- add link to project page here -->
        </div>
        <div class="thumbnailIP">
          <h4>Project 20 Title</h4>
          <p class="tag">Status: </p>
          <p class="tag">More Information</p> <!-- add link to project page here -->
        </div>
      </div>
    </div>
  </section>

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
