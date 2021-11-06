<?php
session_start();
    if(!isset($_SESSION['name'])){
        header("location:index.php");
    }
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
            <h4>Check OUT</h4>
        </nav>
    </div>
    </header>
<article class="container">
<?php
$id=htmlspecialchars($_GET['pid']);
include_once"admin/connection.php";
if(isset($_COOKIE['cart'])){
	$result = mysqli_query($con,"SELECT * FROM product_master WHERE pid=$id");
	if(mysqli_affected_rows($con)>0){
	echo "<table class='table table-hover' width='100%'>";
	while($row = mysqli_fetch_assoc($result)){
				echo"<tr>";
	            	echo"<th>User Name</th><td> $_SESSION[name]</td>";
	            echo"<tr>";
	            echo"<tr>";
	            	echo"<th>Email</th><td> $_SESSION[email]</td>";
	            echo"<tr>";
	             echo"<tr>";
	            	echo"<th>Phone No</th><td> $_SESSION[phone]</td>";
	            echo"<tr>";
				echo"<tr>";
	            	echo"<th>Product ID</th><td>$row[pid]</td>";
	            echo"<tr>";
	            	echo"<th>Product Name</th><td>$row[pname]</td>";
	            echo"</tr>";
	            echo"<tr>";
	                echo"<th> Total Price</th><td>$row[pprice]</td>";
	      		echo"</tr>";

		$price =$row['pprice'];
	echo"</table>";
	}
	echo"<div class='row mt-5'>";
		echo"<div class='col-sm-4 col-md-4'></div>";
		echo"<div class='col-sm-4 col-md-4 mb-5'>";
			echo"THANK YOU For Shpping.
			<a href='index.php' class='text-dark'><h5><strong>Continue Shopping</strong></h5></a>";
		echo"</div>";
		echo"<div class ='col-sm-4 col-md-4'></div>";
	echo"</div>";
	}
	else{
		echo "  <div class='alert alert-danger text-center' role='alert'>
	              no data
	            </div>";
	}
}
?>


</article>
<footrt class="fixed-bottom">
	<?php include"footer.php"?>
</footrt>
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>