<?php
	$email = htmlspecialchars($_GET['email']);
	require "connection.php";
	mysqli_query($con,"DELETE FROM signup WHERE email ='$email'");
	mysqli_close($con);
	header("location:user.php");
?>