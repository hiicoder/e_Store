<?php
	$name = htmlspecialchars($_GET['name']);
	require "connection.php";
	mysqli_query($con,"DELETE FROM query WHERE name ='$name'");
	mysqli_close($con);
	header("location:query.php");
?>