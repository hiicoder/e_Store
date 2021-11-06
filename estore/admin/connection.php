<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$con = mysqli_connect($servername, $username, $password) or die(mysqli_error($con));
	mysqli_select_db($con,'e_store');
?>