<?php
	$id = htmlspecialchars($_GET['pid']);
	require "connection.php";
	mysqli_query($con,"DELETE FROM product_master WHERE pid ='$id'");
	mysqli_query($con,"DELETE FROM mobile_desc WHERE pid ='$id'");
	mysqli_close($con);
	header("location:product.php");
?>