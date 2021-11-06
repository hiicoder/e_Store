<!-- to delete cart product-->
<?php
/*$id = $_GET['pid'];
$data=$_COOKIE['cart'];
$d1=str_replace($id,0,$data);
setcookie('cart',$d1,time()+3600);
header("location:view_cart.php?pid=$id");*/
?>

<!-- to cartproduct and no of  cart notification-->
<?php
$id=htmlspecialchars($_GET['pid']);
$data= $_COOKIE['cart'];
$arr = explode(",",$data);
$x=0;
for($i=0;$i<count($arr);$i++){
	if($arr[$i]!=$id)
	{
		$a[$x]=$arr[$i];
		$x++;
	}
}
$str = implode(",", $a);
  	setcookie('cart',$str,time()+3600);
	header("location:view_cart.php?pid=$id");
?>