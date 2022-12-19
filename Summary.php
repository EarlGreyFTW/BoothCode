<?php include "initiate.php"; ?>
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
    <div id="final-message">
        <h3>Anything Else</h3>
        <label>Anything else you would like to tell us? (Optional):
            <br>
            <textarea id="final" rows="5" cols="55" name="Message" placeholder="Enter text"></textarea>
        </label>
        <br><br>
    </div>
    <?php
    if(isset($_POST["submit"])){
        $_SESSION["MESSAGE"] = $_POST["Message"];
        $name = $_SESSION["NAME"];
        $number = $_SESSION["NUMBER"];
        $email = $_SESSION["EMAIL"];
        $description = $_SESSION["DESCRIPTION"];
        $addnotes = $_SESSION["ADDITIONALNOTES"];
        $message = $_SESSION["MESSAGE"];
        $upload = mysqli_query($connect, "INSERT INTO details (NAME, NUMBER, EMAIL, DESCRIPTION, ADDITIONALNOTES, MESSAGE) VALUES ('$name', '$number', '$email', '$description', '$addnotes', '$message')");
    } ?>
    <div id="bottom-menu">
        <div id="next-button">
            <button id="next" type="submit" value="submit"><b>Done</b></button>
        </div>
        <div id="back-button">
            <button id="back"><b><a href="Record.php" class="link">Back</a></b></button>
        </div>
        <div id="cancel-button">
            <button id="cancel"><b><a class="link" href="index.php">Cancel</a></b></button>
        </div>
    </div>
</form>
</body>
<footer>
</footer>
</html>
<!-- Made using MediaRecorder API and BootstrapCDN /-->
<!-- Developed for The National Museum of Computing by Taliesin Turner (https://earlgreyftw.carrd.co/) /-->
