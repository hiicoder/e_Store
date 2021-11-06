<?php
    session_start();
    if(!isset($_SESSION['name']))
    {
        header("location:index.php");
    }
    require "connection.php";
    if(isset($_GET['pid']))
    {
        $id=htmlspecialchars($_GET['pid']);
        $result=mysqli_query($con,"SELECT * FROM product_master WHERE pid='$id'");
        $r= mysqli_fetch_array($result);
    }
    if(isset($_POST['updateproduct']))
    {
        $id = htmlspecialchars($_POST["p_id"]);
        $name = htmlspecialchars($_POST["p_name"]);
        $type = htmlspecialchars($_POST["p_type"]);
        $price = htmlspecialchars($_POST["p_price"]);
        $query ="";
        if($_FILES['p_image']['tmp_name']!="")
        {
            $source = $_FILES['p_image']['tmp_name'];
            $destination = $_SERVER['DOCUMENT_ROOT']."/estore/m_image/".$_FILES['p_image']['name'];
            move_uploaded_file($source, $destination);
            $path = "m_image/".$_FILES['p_image']['name'];
            $query = "UPDATE product_master set pname='$name',ptype='$type', pprice=$price, pimage='$path' where pid=$id";
        }
        else
        {
              $query = "UPDATE product_master set pname='$name',ptype='$type', pprice=$price where pid=$id";
        }
        mysqli_query($con,$query);
        header("location:product.php");
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
    </head>
    <body>
        <header>
            <?php include"header.php"?>
            <?php include"menu.php"?>
            <div class="container">
                <nav style="border-bottom:3px solid #03cafc">
                    <h4>Update Product</h4>
                </nav>
            </div>
        </header>
        <section class="container mt-5" >
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="ProductId">Product ID</label>
                            <input type="text" class="form-control" name="p_id" value="<?php if(isset($_GET['pid']))echo $_GET['pid'] ?>" readonly/>
                        </div>
                        <div class="form-group">
                            <label for="Product Name">Product Name</label>
                            <input type="text" class="form-control" name="p_name" value="<?php if(isset($_GET['pid']))echo $r[1] ?>" />
                        </div>
                        <div class="form-group">
                            <label for="Product Type">Product Type</label>
                            <input type="text" class="form-control" name="p_type" value="<?php if(isset($_GET['pid']))echo $r[2] ?>" />
                        </div>
                         <div class="form-group">
                            <label for="Product Price">Product Price</label>
                            <input type="text" class="form-control" name="p_price" value="<?php if(isset($_GET['pid']))echo $r[3] ?>" />
                        </div> 
                        <div class="form-group">
                            <label for="Product Image">Product Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="p_image">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                        <button type="submit" name ="updateproduct" class="btn btn-primary">Update Product</button>
                    </form>
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </section>
        <footer style="margin-top:38px;">
            <?php include"footer.php"?>
        </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>