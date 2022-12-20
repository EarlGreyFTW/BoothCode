<?php include "initiate.php";
echo "Name: ".$_SESSION["NAME"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>TNMOC Knowledge Booth Program</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
	<meta name="keywords" content="WebRTC getUserMedia MediaRecorder API">
	<link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<div>
	<h1>TNMOC Knowledge Booth Video Recorder</h1>
	<h2>User Details</h2>
</div>
<form>
<table style="width: 100%">
	<tr>
		<th style="width: 46%">
			<div id="about-you">
				<h3>About You</h3>
				<label>Name*:
					<input type="text" class="text-box" name="FullName" required>
				</label>
				<br><br>
				<label>Email:
					<input type="email" class="text-box" name="Email">
				</label>
				<br><br>
				<label>Contact Phone Number:
					<input type="tel" class="text-box" name="PhoneNumber">
				</label>
				<br><br>
                <p><em>* required</em></p>
			</div>
		</th>
		<th style="width: 8%"></th>
		<th style="width: 46%">
			<div id="about-your-story">
				<h3>About Your Story</h3>
				<label>Please give one or two sentences summing up what you are going to tell us about (Optional):
					<textarea rows="5" cols="55" name="Summary" placeholder="Enter text"></textarea>
				</label>
				<br><br>
				<label>Anything else you'd like to mention? (Optional):
					<textarea rows="5" cols="55" name="AdditionalInfo" placeholder="Enter text"></textarea>
				</label>
				<br><br>
			</div>
		</th>
	</tr>
</table>
<div id="bottom-menu">
	<div id="next-button">
		<button id="next" type="submit" value="submit" ><b>Next</b></button>
	</div>
	<div id="back-button">
		<button id="back"><b><a href="index.php" class="link">Back</a></b></button>
	</div>
	<div id="cancel-button">
		<button id="cancel"><b><a class="link" href="index.php">Cancel</a></b></button>
	</div>
</div>
    <?php
    if(isset($_POST["submit"])){
        echo "<h1>done</h1>";
        $_SESSION["NAME"] = $_POST["FullName"];
        $_SESSION["NUMBER"] = $_POST["PhoneNumber"];
        $_SESSION["EMAIL"] = $_POST["Email"];
        $_SESSION["DESCRIPTION"] = $_POST["Summary"];
        $_SESSION["ADDITIONALNOTES"] = $_POST["AdditionalInfo"];
        header("location:Record.php");
    } else {
        echo mysqli_error($connect);
    } ?>
</form>
</body>
<footer>
</footer>
</html>
<!-- Made using MediaRecorder API and BootstrapCDN /-->
<!-- Developed for The National Museum of Computing by Taliesin Turner (https://earlgreyftw.carrd.co/) /-->
