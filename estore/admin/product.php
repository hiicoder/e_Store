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
    <title>eStore</title>
    <style type="text/css">
        .btn{
            width:80px;
        }
    </style>
  </head>
  <body>
    <header>
        <?php include"header.php"?>
        <?php include"menu.php"?>
         <div class="container">
        <nav style="border-bottom:3px solid #03cafc">
            <h4>Product</h4>
        </nav>
    </div>
    </header>
    <section class="container mt-5 ">
              <div class="col-md-6">
                <a href="add_product.php" style="text-decoration:none; font-size: 18px;">
                    <div class="alert alert-info text-center" role="alert">
                       Add Product
                    </div>
                </a>
            </div>
    </section>
    <section class="container">
    <div class="col-sm-12 col-md-12">
        <?php
        require "connection.php";
        $result = mysqli_query($con,"SELECT * FROM product_master");
        if(mysqli_affected_rows($con)>0){
            echo"<table class='table table-striped table-responsive-sm table-responsive-md text-center' width='100%'>";
            echo"<tr>";
            echo"<th>Product ID</th>
                <th>NAME</th>
                <th>Type</th>
                <th>Price</th>
                <th>Image</th>
                <th>Update</th>
                <th>Delete</th>
                <th>Add Desc</th>
                <th>View Desc</th>";
            echo"</tr>";
            while($r = mysqli_fetch_array($result)){
                echo "<tr>";
                echo"<td>$r[0]</td>";
                echo"<td>$r[1]</td>";
                echo"<td>$r[2]</td>";
                echo"<td>$r[3]</td>";
                //$link=md5($r[0]);
                echo"<td><img src='../$r[4]' width='50' height='50' /></td>";
                echo "<td><a href='edit.php?pid=$r[0]'><input type='button' class='btn btn-success' value='Update'></td>";
                echo "<td><a href='delete.php?pid=$r[0]'><input type='button' class='btn btn-danger' value='Delete'></td>";
                echo "<td><a href='add_product_desc.php?pid=$r[0]'><input type='button' class='btn btn-primary' value='Add'></td>";
                echo "<td><a href='view_desc.php?pid=$r[0]'><input type='button' class='btn btn-dark' value='View'></td>";
                echo "</tr>";
            }
            echo "</table>";
        }else{
            echo  "<h3>No Record Found !!!!</h3>";
        }

        ?>
    </div>
    </section>
    <footer>
        <?php include"footer.php"?>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>