<?php
$id=htmlspecialchars($_GET['pid']);
if(isset($_COOKIE['cart'])){
	$data=htmlspecialchars($_COOKIE['cart']).",".$id;
	setcookie("cart",$data);
}else {
	setcookie("cart",$id,time()+3600); 
}
header("location:mobile.php?pid=$id");
?>