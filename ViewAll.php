<?php include "initiate.php";?>
<!DOCTYPE html>
<html lang="GB">
<head>
	<title>TNMOC Knowledge Booth Program</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
	<meta name="keywords" content="WebRTC getUserMedia MediaRecorder API">
	<link rel="stylesheet" href="STYLE.css">
	<link rel="icon" type="image/x-icon" href="TNMOC-Apple-Logo.png">
</head>
<body>
<div>
	<img src="TNMOC-Apple-Logo.png" class="logo" alt="logo">
	<div class="title">
		<h1>TNMOC Knowledge Booth</h1>
		<h2>Homepage</h2>
	</div>
<table id="display-all">
	<tr class="display-all">
		<td id="id"><b>#</b></td>
		<td id="date-recorded"><b>Date Recorded</b></td>
		<td id="name"><b>Name</b></td>
		<td id="phone-number"><b>Phone Number</b></td>
		<td id="email"><b>Email</b></td>
		<td id="description"><b>Summary of Recording</b></td>
		<td id="additional-notes"><b>Additional Notes</b></td>
		<td id="media"><b>Recording</b></td>
		<td id="message"><b>Anything Else</b></td>
	</tr>
	<?php
	$sql = "SELECT * FROM boothdata.details";
	$result = mysqli_query($connect, $sql);
	if(isset($result)) {
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr class='display-all'>";
			echo "<td>" . $row["ID"] . "</td>";
			echo "<td>" . $row["DATERECORDED"] . "</td>";
			echo "<td>" . $row["NAME"] . "</td>";
			echo "<td>" . $row["NUMBER"] . "</td>";
			echo "<td>" . $row["EMAIL"] . "</td>";
			echo "<td>" . $row["DESCRIPTION"] . "</td>";
			echo "<td>" . $row["ADDITIONALNOTES"] . "</td>";
			echo "<td>";
			# find media file based off name
			if($row["MODE"] == "V"){
				echo "<video width='320' height='240' controls>";
				echo "<source src='" . "BoothMedia/" . $row["NAME"] . ".webm" . "' type='video/webm'>";
				echo "</video>";
			} else {
				echo "<audio controls>";
				echo "<source src='" . "BoothMedia/" . $row["NAME"] . ".mp3" . "' type='audio/mp4'>";
				echo "</audio>";
			}
			echo"</td>";
			echo "<td>" . $row["MESSAGE"] . "</td>";
		}
	}
	?>
</table>
</body>
<footer>
</footer>
</html>
<!-- Made using MediaRecorder API and BootstrapCDN /-->
<!-- Developed for The National Museum of Computing by Taliesin Turner (https://earlgreyftw.carrd.co/) /-->