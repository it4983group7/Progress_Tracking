<!DOCTYPE HTML>

<html lang="en">

<head>

	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1" name="viewport" />

	<title>Capstone Management System - Project</title>

	<link rel="shortcut icon" type="image/ico" href="/ksu_logo.ico">
	<link href="css/reset.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>
	<?php
	include 'php/dbconfig.php';

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$projectID = $_GET['projectID'];

	$pro_sql = "SELECT * FROM Project WHERE Project_ID LIKE $projectID;";
	$spons_sql = "SELECT * FROM Sponsor_Update WHERE Project_ID LIKE $projectID ORDER BY Date DESC;";
	$stu_sql = "SELECT * FROM Student_Update WHERE Project_ID LIKE $projectID ORDER BY Date DESC;";

	$projects = mysqli_query($conn, $pro_sql);
	$spons_upd = mysqli_query($conn, $spons_sql);
	$stu_upd = mysqli_query($conn, $stu_sql);

	$pro_results = mysqli_fetch_array($projects);

	function getPHRStatus($val)
	{
		if ($val == '0') {
			return "Ahead of schedule";
		} elseif ($val == '1') {
			return "On schedule";
		} elseif ($val == '2') {
			return "Behind schedule";
		} elseif ($val == '3') {
			return "Severely behind schedule";
		}
		return "Error getting status";
	}

	function getRHRStatus($val) {
		if ($val == '0') {
			return "Lighting fast";
		} elseif ($val == '1') {
			return "Right on par";
		} elseif ($val == '2') {
			return "Needs improvement";
		}
		return "Error getting status";
	}
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

	<!-- Project Section -->
	<section class="prjmain">
		<div>
			<h2 style="text-align: center;"><?php echo $pro_results['Title']; ?></h2>
			<p><b>Sponsor Name(ID): </b><?php echo $pro_results['Sponsor_ID']; ?> </p>
			<br>
			<p><b>Description of Project:</b></p>
			<p><?php echo $pro_results['Description'] ?></p>
			<br>
			<p><b>Technical Skills &amp; Requirements:</b></p>
			<p><?php echo $pro_results['Student_Skills'] ?></p>
			<br>
			<p><b>Duties of the Students:</b></p>
			<p><?php echo $pro_results['Student_Duties'] ?></p>
			<br>
			<p><b>Benefits of Project:</b></p>
			<p><?php echo $pro_results['Student_Benefits'] ?></p>
			<br>
			<p><b>Offered Company Resources:</b></p>
			<p><?php echo $pro_results['Resources'] ?></p>
			<br>
	</section>

	<!-- Sponsor Updates Section -->
	<section class="prjmain">
		<div>
			<table class="feedback-table">
				<tr>
					<th>Sponsor Updates</th>
				</tr>
				<tr>
					<th>Sponsor</th>
					<th>Date</th>
					<th>Progress</th>
					<th>Responsiveness</th>
					<th>Feedback</th>
				</tr>
				<?php while ($spons_results = mysqli_fetch_array($spons_upd)) { ?>
												<tr>
													<td><?php echo $spons_results['Sponsor_ID'] ?></td>
												<td><?php echo $spons_results['Date'] ?></td>
												<td><?php echo getPHRStatus($spons_results['Progress']) ?></td>
												<td><?php echo getRHRStatus($spons_results['Responsiveness']) ?></td>
												<td><?php echo $spons_results['Feedback'] ?></td>
												</tr>
																			<?php
											}
											?>
			</table>
		</div>
	</section>

	<!-- Student Updates Section -->
	<section class="prjmain">
		<div>
			<table class="feedback-table">
				<tr>
					<th>Student Updates</th>
				</tr>
				<tr>
					<th>Student</th>
					<th>Date</th>
					<th>Progress</th>
					<th>Summary</th>
				</tr>
				<?php while ($stu_results = mysqli_fetch_array($stu_upd)) { ?>
												<tr>
													<td><?php echo $stu_results['Student_ID'] ?></td>
												<td><?php echo $stu_results['Date'] ?></td>
												<td><?php echo getPHRStatus($stu_results['Progress']); ?></td>
												<td><?php echo $stu_results['Summary'] ?></td>
												</tr>
																			<?php
											}
											?>
			</table>
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