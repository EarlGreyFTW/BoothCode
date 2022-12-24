<?php include "initiate.php";
$_SESSION["NAME"] = "";
$_SESSION["NUMBER"] = "";
$_SESSION["EMAIL"] = "";
$_SESSION["DESCRIPTION"] = "";
$_SESSION["ADDITIONALNOTES"] = "";
$_SESSION["MESSAGE"] = "";
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
	<h1>TNMOC Knowledge Booth Video Recorder</h1>
	<h2>Homepage</h2>
	<div id="about-text">
		<h3>About this program</h3>
		<p>
			Welcome to the National Museum of Computing's Knowledge transfer booth. This system is to allow stories and memories of the history of computing to be conserved. We welcome stories and memories of anything computing, from your first expereince with computers to the highlight of your work with or on computers!
			By pressing the button below you agree to the following terms:
		</p>
		<ol>
			<li>This booth will store the personal information that you decide to share, for the purpose of adding to the collective knowledge available to museum users. It will not be shared in the public domain and the information will be securely stored within the TNMOC organisation. </li>
			<li>You have the right to erase this information should you decide to do so in future. Please contact example@tnmoc.org should you wish to exercise that right.</li>
			<li>The information that you consent to share by using this booth will otherwise be retained indefinitely.</li>
			<li>You have the right to access the information that is stored at any time, please contact example@tnmoc.org</li>
			<p>
				You are free to cancel your session at any point by pressing the cancel button at the bottom of the screen. This will delete all of your data stored so far.
			</p>
	</div>
	<div id="begin-button">
		<button id="begin"><b><a class="link" href="PersonalDetails.php" style="color: black; font-size: 50px">Tap Here To Begin</a></b></button>
	</div>
</div>
</body>
<footer>
</footer>
</html>
<!-- Made using MediaRecorder API and BootstrapCDN /-->
<!-- Developed for The National Museum of Computing by Taliesin Turner (https://earlgreyftw.carrd.co/) /-->
