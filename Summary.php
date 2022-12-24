<?php include "initiate.php"; ?>
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
		<h2>Summary</h2>
	</div>
</div>
<form method="POST" onSubmit="return confirm('Are you sure you want to submit your story?');">
    <div id="final-message">
        <h3>Anything Else</h3>
        <label>Anything else you would like to tell us? (Optional):
            <br>
            <textarea id="final" rows="5" cols="55" name="Message" placeholder="Enter text"></textarea>
        </label>
        <br><br>
    </div>
    <?php
    if(isset($_POST["Next"])){
        $name = mysqli_real_escape_string($connect, $_SESSION["NAME"]);
        $number = mysqli_real_escape_string($connect, $_SESSION["NUMBER"]);
        $email = mysqli_real_escape_string($connect, $_SESSION["EMAIL"]);
        $description = mysqli_real_escape_string($connect, $_SESSION["DESCRIPTION"]);
        $addnotes = mysqli_real_escape_string($connect, $_SESSION["ADDITIONALNOTES"]);
        $message = mysqli_real_escape_string($connect, $_POST["Message"]);
        $upload = mysqli_query($connect, "INSERT INTO details (NAME, NUMBER, EMAIL, DESCRIPTION, ADDITIONALNOTES, MESSAGE) VALUES ('$name', '$number', '$email', '$description', '$addnotes', '$message')");
        header("Location: index.php");
	} ?>
    <div class="bottom-menu">
	    <button class="next-button" type="submit" value="Next" name="Next"><a class="link"><b>Finish</b></a></button>
	    <button class="cancel-button" type="button"><b><a class="link" href="index.php">Start Again</a></b></button>
	    <button class="back-button" type="button"><b><a href="Mode.php" class="link">Back</a></b></button>
    </div>
</form>
</body>
<footer>
</footer>
</html>
<!-- Made using MediaRecorder API and BootstrapCDN /-->
<!-- Developed for The National Museum of Computing by Taliesin Turner (https://earlgreyftw.carrd.co/) /-->
