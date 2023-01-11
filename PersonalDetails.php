<?php include "initiate.php";
$name = mysqli_real_escape_string($connect, $_SESSION["NAME"]);
$number = mysqli_real_escape_string($connect, $_SESSION["NUMBER"]);
$email = mysqli_real_escape_string($connect, $_SESSION["EMAIL"]);
$description = mysqli_real_escape_string($connect, $_SESSION["DESCRIPTION"]);
$addnotes = mysqli_real_escape_string($connect, $_SESSION["ADDITIONALNOTES"]);
?>
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
		<h2>Personal Details</h2>
	</div>
</div>
<form method="POST">
<table style="width: 100%">
	<tr>
		<th style="width: 46%">
			<div id="about-you">
				<h3>About You</h3>
				<label>Name*:
					<input type="text" class="input-text-box" name="FullName" value="<?php echo $name; ?>" required>
				</label>
				<br><br>
				<label>Email:
					<input type="email" class="input-text-box" name="Email" value="<?php echo $email; ?>">
				</label>
				<br><br>
				<label>Contact Phone Number:
					<input type="tel" class="input-text-box" name="PhoneNumber" value="<?php echo $number; ?>">
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
					<textarea rows="5" cols="55" name="Summary" placeholder="Enter text" ><?php echo $description; ?></textarea>
				</label>
				<br><br>
				<br><br>
			</div>
		</th>
	</tr>
</table>
<div class="bottom-menu">
	<button class="next-button" type="submit" value="Next" name="Next"><a class="link"><b>Next</b></a></button>
	<button class="cancel-button"><b><a class="link" href="index.php">Start Again</a></b></button>
	<button class="back-button"><b><a href="index.php" class="link">Back</a></b></button>
</div>
</form>
<?php
if(isset($_POST["Next"])){
    $_SESSION["NAME"] = $_POST["FullName"];
    $_SESSION["NUMBER"] = $_POST["PhoneNumber"];
    $_SESSION["EMAIL"] = $_POST["Email"];
    $_SESSION["DESCRIPTION"] = $_POST["Summary"];
	header("location:Mode.php");
} else {
    echo mysqli_error($connect);
} ?>
</body>
<footer>
</footer>
</html>
<!-- Made using MediaRecorder API and BootstrapCDN /-->
<!-- Developed for The National Museum of Computing by Taliesin Turner (https://earlgreyftw.carrd.co/) /-->
