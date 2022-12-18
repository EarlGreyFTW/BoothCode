<?php
try {
	session_start();
	$connect = mysqli_connect("localhost", "root", "", "boothdata");
	global $connect;
	if ($connect) {
		# echo "Valid Connection";
	} else {
		die("No connection to DB");
	}
} catch (Exception $ex){
	echo "Error during connection, please try again later.";
	die();
}
?>

