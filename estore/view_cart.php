<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>iStore</title>
    <style type="text/css">
  		body{
  				background-color: silver;
 			}
        .btn{
            width:80px;
        }
    </style>
  </head>
  <body>
    <header>
        <?php include"header.php"?>
         <div class="container mt-5">
        <nav style="border-bottom:3px solid #03cafc">
            <h4>Your Cart</h4>
        </nav>
    </div>
    </header>
<article class="container">
<?php
include_once"admin/connection.php";
if(isset($_COOKIE['cart'])){
	$result = mysqli_query($con,"SELECT * FROM product_master WHERE pid in ($_COOKIE[cart])");
	if(mysqli_affected_rows($con)>0){
	echo "<table class='table table-hover table-responsive-sm text-center' width='100%'>";
	echo"  <thead class='thead-dark'>";
	echo"<tr>";
	            echo"<th>Product ID</th>
	                <th>NAME</th>
	                <th>Image</th>
	                <th>Price</th>
	                <th>Delete</th";
	            echo"</tr>";
	            $amount=0;
	while($row = mysqli_fetch_assoc($result)){
		echo"<tr>";
			echo"
			<td>$row[pid]</td>
			<td>$row[pname]</td>
			<td><img src='$row[pimage]' alt='image' width='20' height='30'/></td>
			<td>$row[pprice]</td>
			<td><a href='del_cart_product.php?pid=$row[pid]'><button type='button' class='btn btn-danger btn-sm'>X</button></a></td>";
		echo"</tr>";
		$amount=$amount+$row['pprice'];
	
	}
	echo"</table>";
	echo"<hr>";
	echo"<div class='row mt-5'>";
	echo"<div class ='col-sm-6 col-md-6'>";
	echo"</div>";
	echo"<div class ='col-sm-6 col-md-6 form-group'>";
		echo"<div class='row'>";
			echo"<div class='col-md-3 col-sm-3'><strong>Total Price:</strong></div>";
			echo"<div class='col-md-9 col-sm-9'><strong>$amount /-</strong></div>";
		echo"</div>";
	echo"</div>";
	echo"<div class ='col-sm-6 col-md-6'>";
	echo"</div>";
	echo"<div class='col-sm-6 col-md-6 form-group btn btn-success mb-5'>";
			if(isset($_SESSION['name'])){
			echo"<a href='checkout.php?pid=$_COOKIE[cart]' class='text-light'><h5><strong>Check out Now</strong></h5></a>";
		}else{
			echo"<a href='login.php?pid=$_COOKIE[cart]' class='text-light'><h5><strong>Check out Now</strong></h5></a>";
		}
	echo"</div>";
echo"</div>";
	}
	else{
		echo "  <div class='alert alert-danger text-center' role='alert'>
	               No product added in your cart !!!
	            </div>";
	}

}else{
	echo "  <div class='alert alert-danger text-center' role='alert'>
	               No product added in your cart !!!
	            </div>";
}
?>


</article>
 <footer style="margin-top:512px;">
      <?php include"footer.php"?>
    </footer>
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>