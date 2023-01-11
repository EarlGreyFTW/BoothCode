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
        <h2>Review Your Story</h2>
    </div>
</div>
<div id="review">
    <div id="video">
        <?php
        if($_SESSION["MODE"] == "V"){
            echo "<video width='640' height='480' controls>";
            echo "<source src='" . "BoothMedia/" . $_SESSION["HASH"] . ".webm" . "' type='video/webm'>";
            echo "</video>";
        } else {
            echo "<audio controls>";
            echo "<source src='" . "BoothMedia/" . $_SESSION["HASH"] . ".mp4" . "' type='audio/mp4'>";
            echo "</audio>";
        }
        ?>
    </div>
    <div id="try-again">
        <button id="stop-button" style="background-color: dodgerblue"><b><a class="link" href="Mode.php">Record your Story Again</a></b></button>
    </div>
</div>
<div class="bottom-menu">
    <button class="next-button"><b><a href="Summary.php" class="link">Next</a></b></button>
    <button class="cancel-button"><b><a class="link" href="index.php">Start Again</a></b></button>
    <button class="back-button"><b><a href="PersonalDetails.php" class="link">Back to Details</a></b></button>
</div>
</body>
<footer>
</footer>
</html>
<!-- Made using MediaRecorder API and BootstrapCDN /-->
<!-- Developed for The National Museum of Computing by Taliesin Turner (https://earlgreyftw.carrd.co/) /-->
