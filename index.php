<?php include "initiate.php";
$_SESSION["NAME"] = "";
$_SESSION["NUMBER"] = "";
$_SESSION["EMAIL"] = "";
$_SESSION["DESCRIPTION"] = "";
$_SESSION["ADDITIONALNOTES"] = "";
$_SESSION["MESSAGE"] = "";
?>
<!DOCTYPE html>
<html>
<head>
	<title>TNMOC Knowledge Booth Program</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
	<meta name="keywords" content="WebRTC getUserMedia MediaRecorder API">
	<link rel="stylesheet" href="Stylesheet.css">
</head>
<body>
<div>
	<h1>TNMOC Knowledge Booth Video Recorder</h1>
	<h2>Homepage</h2>
	<div id="about-text">
		<h3>About this program</h3>
		<p>
			Rerum et dolorum repellat. Aliquam debitis sunt error. Suscipit doloribus est sit quis quia explicabo consequatur ratione. Sed dolores voluptates placeat laborum et corrupti est.
			Veniam non numquam maiores accusamus ex id quidem officiis. Sapiente qui qui autem. Praesentium et nemo debitis nihil commodi enim.
			Voluptate est esse eos ut porro aperiam iste ullam. Occaecati in ea vero est distinctio aliquid suscipit. Rerum et earum mollitia natus cum. Sed qui corrupti dolor asperiores.
			Eum perspiciatis perspiciatis ducimus sit atque qui aut ut. Dolor ex maiores a fugiat. Nobis voluptas aut reprehenderit aut. Dolorem atque inventore quae tempora accusantium quo officiis rerum. Porro eum odit voluptas laboriosam alias. Eos repudiandae autem omnis voluptas laborum.
			Et aut blanditiis numquam omnis quo eum vero. Doloremque voluptate qui laboriosam nam voluptatem veniam doloremque nemo. Deserunt numquam voluptatem qui excepturi.
		</p>
	</div>
	<div id="begin-button">
		<button id="begin"><b><a class="link" href="PersonalDetails.php" style="color: black; font-size: 34px">Tap Here To Begin.</a></b></button>
	</div>
</div>
</body>
<footer>
	<div id="bottom-menu">
		<div id="next-button">
			<button id="next"><b><a class="link" href="PersonalDetails.php">Next</a></b></button>
		</div>
		<div id="back-button">
			<button id="back" disabled="disabled" ><b><a class="link">Back</a></b></button>
		</div>
		<div id="cancel-button">
			<button id="cancel"><b><a class="link" href="index.php">Cancel</a></b></button>
		</div>
	</div>
</footer>
</html>
<!-- Made using MediaRecorder API and BootstrapCDN /-->
<!-- Developed for The National Museum of Computing by Taliesin Turner (https://earlgreyftw.carrd.co/) /-->
