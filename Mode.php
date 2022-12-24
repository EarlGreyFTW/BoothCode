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
		<h2>Mode Selection</h2>
	</div>
</div>
<div id="mode">
	<br>
	<div class="title">
		<h4>Select how you would like to record your story.</h4>
		<button class="mode-button"><b><a class="link" href="RecordVideo.php" style="color: black">Audio and Video Recording</a></b></button>
		<button class="mode-button"><b><a class="link" href="RecordAudio.php#not-recording" style="color: black">Audio Only Recording</a></b></button>
	</div>
	</div>
<div class="bottom-menu">
	<button class="cancel-button"><b><a class="link" href="index.php">Start Again</a></b></button>
	<button class="back-button"><b><a href="PersonalDetails.php" class="link">Back</a></b></button>
</div>
</body>
<footer>
</footer>
</html>
<!-- Made using MediaRecorder API and BootstrapCDN /-->
<!-- Developed for The National Museum of Computing by Taliesin Turner (https://earlgreyftw.carrd.co/) /-->
