<?php include "initiate.php"; ?>
<!DOCTYPE html>
<html lang="GB">
<head>
	<title>TNMOC Knowledge Booth Program</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
	<meta name="keywords" content="WebRTC getUserMedia MediaRecorder API">
	<link rel="stylesheet" href="STYLE.css">
</head>
<body>
<div>
	<h1>TNMOC Knowledge Booth Video Recorder</h1>
	<h2>Mode Selection</h2>
</div>
<div id="mode">
	<br>
	<h4>Select how you would like to record your story.</h4>
	<button class="mode-button"><b><a class="link" href="RecordVideo.php">Audio and Video Recording</a></b></button>
	<button class="mode-button"><b><a class="link" href="RecordAudio.php#not-recording">Audio Only Recording</a></b></button>
</div>
<div class="bottom-menu">
	<button class="next-button" disabled><a class="link"><b>Next</b></a></button>
	<button class="cancel-button"><b><a class="link" href="index.php">Start Again</a></b></button>
	<button class="back-button"><b><a href="PersonalDetails.php" class="link">Back</a></b></button>
</div>
</body>
<footer>
</footer>
</html>
<!-- Made using MediaRecorder API and BootstrapCDN /-->
<!-- Developed for The National Museum of Computing by Taliesin Turner (https://earlgreyftw.carrd.co/) /-->
