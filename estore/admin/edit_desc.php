<?php
session_start();
    if(!isset($_SESSION['name'])){
        header("location:index.php");
    }
     if(isset($_GET['pid'])){
        $id =htmlspecialchars($_GET['pid']);
         require "connection.php";
        $result = mysqli_query($con,"SELECT * FROM mobile_desc Where pid=$id");
        $r = mysqli_fetch_array($result);
    }
    if(isset($_POST['edit_desc'])){
        $id = htmlspecialchars($_POST["p_id"]);
        $modal_no = htmlspecialchars($_POST["model_no"]);
        $c_name = htmlspecialchars($_POST["c_name"]);
        $processor = htmlspecialchars($_POST["processor"]);
        $ram = htmlspecialchars($_POST["ram"]);
        $s_size = htmlspecialchars($_POST["s_size"]);
        $storage = htmlspecialchars($_POST["storage"]);
        $f_camera = htmlspecialchars($_POST["f_camera"]);
        $b_camera = htmlspecialchars($_POST["b_camera"]);
        $b_backup = htmlspecialchars($_POST["b_backup"]);
        $query = "UPDATE mobile_desc set model_no='$modal_no', c_name='$c_name', processor='$processor', ram='$ram', screen_size='$s_size', storage='$storage', front_cam='$f_camera', back_cam='$b_camera', battery_backup='$b_backup' where pid=$id";
        mysqli_query($con,$query);
        mysqli_close($con);
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
            <h4>Update Product Description</h4>
        </nav>
    </div>
    </header>
    <section class="container mt-5" >
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                     <div class="form-group">
                            <label for="Product Id">Product ID</label>
                            <input type="text" class="form-control" name="p_id" value="<?php if(isset($_GET['pid']))echo $_GET['pid'] ?>" readonly="">
                        </div>

                        <div class="form-group">
                            <label for="Model Number">Model Number</label>
                            <input type="text" class="form-control" name="model_no" value="<?php if(isset($_GET['pid']))echo $r[1] ?>">
                        </div>

                         <div class="form-group">
                            <label for="Company Name">Company Name</label>
                            <input type="text" class="form-control" name="c_name" value="<?php if(isset($_GET['pid']))echo $r[2] ?>">
                        </div>

                        <div class="form-group">
                            <label for="Processor">Processor</label>
                            <input type="text" class="form-control" name="processor" value="<?php if(isset($_GET['pid']))echo $r[3] ?>">
                        </div> 
                </div>
                <div class="col-md-4">
                    
                        <div class="form-group">
                            <label for="Ram">Ram</label>
                            <input type="text" class="form-control" name="ram" value="<?php if(isset($_GET['pid']))echo $r[4] ?>">
                        </div>

                        <div class="form-group">
                            <label for="Screen Size">Screen Size</label>
                            <input type="text" class="form-control" name="s_size" value="<?php if(isset($_GET['pid']))echo $r[5] ?>">
                        </div>

                        <div class="form-group">
                            <label for="Storage">Storage</label>
                            <input type="text" class="form-control" name="storage" value="<?php if(isset($_GET['pid']))echo $r[6] ?>">
                        </div>

                        <div class="form-group">
                            <label for="Front Camera">Front Camera</label>
                            <input type="text" class="form-control" name="f_camera" value="<?php if(isset($_GET['pid']))echo $r[7] ?>">
                        </div> 
                    
                </div>
                <div class="col-md-4">
                      <div class="form-group">
                            <label for="Back Camera">Back Camera</label>
                            <input type="text" class="form-control" name="b_camera" value="<?php if(isset($_GET['pid']))echo $r[8] ?>">
                        </div> 

                        <div class="form-group">
                            <label for="Battery Backup">Battery Backup</label>
                            <input type="text" class="form-control" name="b_backup" value="<?php if(isset($_GET['pid']))echo $r[9] ?>">
                        </div>
                </div>

            </div>
            <button type="submit"  name="edit_desc" class="btn btn-primary">Update Desc</button>

        </form>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>