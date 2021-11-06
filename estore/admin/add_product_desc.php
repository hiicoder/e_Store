<?php
    session_start();
    if(!isset($_SESSION['name']))
    {
        header("location:index.php");
    }
    $msg="";
    if(isset($_POST["add_desc"]))
    {
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
        require "connection.php";
        $query = "INSERT INTO mobile_desc VALUES($id,'$modal_no', '$c_name', '$processor', '$ram', '$s_size', '$storage', '$f_camera', '$b_camera', '$b_backup')";
        mysqli_query($con,$query);
        if(mysqli_affected_rows($con)>0)
        {
            $msg = "<font color='green'>Data inserted sucessfully!!!!</font>";
        }
        else
        {
            $msg = "<font color='red'>Error while inserting!!!!</font>";
        }
        mysqli_close($con);
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
                <h4>Add Product Description</h4>
            </nav>
        </div>
    </header>
    <section class="container mt-5" >
        <form method="post">
            <div class="row">
               <?php if(isset($_POST['add_desc'])){ ?>
                <div class='alert alert-info col-md-12' role='alert'>
                    <?php echo $msg; ?> 
                </div> <?php } ?>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="Product Id">Product ID</label>
                        <input type="text" class="form-control" name="p_id" value="<?php if(isset($_GET['pid']))echo $_GET['pid'] ?>" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="Model Number">Model Number</label>
                        <input type="text" class="form-control" name="model_no">
                    </div>
                        <div class="form-group">
                        <label for="Company Name">Company Name</label>
                        <input type="text" class="form-control" name="c_name">
                    </div>
                    <div class="form-group">
                        <label for="Processor">Processor</label>
                        <input type="text" class="form-control" name="processor">
                    </div> 
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="Ram">Ram</label>
                        <input type="text" class="form-control" name="ram">
                    </div>
                    <div class="form-group">
                        <label for="Screen Size">Screen Size</label>
                        <input type="text" class="form-control" name="s_size">
                    </div>
                    <div class="form-group">
                        <label for="Storage">Storage</label>
                        <input type="text" class="form-control" name="storage">
                        </div>
                        <div class="form-group">
                        <label for="Front Camera">Front Camera</label>
                        <input type="text" class="form-control" name="f_camera">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="Back Camera">Back Camera</label>
                        <input type="text" class="form-control" name="b_camera">
                    </div> 
                    <div class="form-group">
                        <label for="Battery Backup">Battery Backup</label>
                        <input type="text" class="form-control" name="b_backup">
                    </div>
                </div>
            </div>
            <button type="submit"  name="add_desc" class="btn btn-primary">Add Desc</button>
        </form>
    </section>
    <footer style="margin-top: 125px;">
        <?php include"footer.php"?>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>