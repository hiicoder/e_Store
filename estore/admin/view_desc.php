<?php
session_start();
    if(!isset($_SESSION['name'])){
        header("location:index.php");
}
    if(isset($_GET['pid'])){
        $id =htmlspecialchars($_GET['pid']);
         require "connection.php";
        $result = mysqli_query($con,"SELECT * FROM mobile_desc Where pid=$id");
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
            <h4>View Product Description</h4>
        </nav>
    </div>
    </header>
    <section class="container mt-5" >
        <div class="row">
        <div class="col-md-6 col-sm-12">
            <?php
           
                echo" <h2 class='text-primary'>Specifications</h2>";
                
             echo "<table class='table table-hover'>";
                 
                $r = mysqli_fetch_array($result);
                if(mysqli_affected_rows($con)>0){
                      
                        echo"<tr>";
                            echo"<th>Product ID:</th>";
                            echo"<td>$r[0]</td>";
                        echo"</tr>";
                        echo"<tr>";
                            echo"<th>Modal Number:</th>";
                            echo"<td>$r[1]</td>";
                        echo"</tr>";
                        echo"<tr>";
                            echo"<th>Company Name:</th>";
                            echo"<td>$r[2]</td>";
                        echo"</tr>";
                        echo"<tr>";
                            echo"<th>Processor:</th>";
                            echo"<td>$r[3]</td>";
                        echo"</tr>";
                        echo"<tr>";
                            echo"<th>Ram:</th>";
                            echo"<td>$r[4]</td>";
                        echo"</tr>";
                        echo"<tr>";
                            echo"<th>Screen Size:</th>";
                            echo"<td>$r[5]</td>";
                        echo"</tr>";
                        echo"<tr>";
                            echo"<th>Storage:</th>";
                            echo"<td>$r[6]</td>";
                        echo"</tr>";
                        echo"<tr>";
                            echo"<th>Front Camera:</th>";
                            echo"<td>$r[7]</td>";
                        echo"</tr>";
                        echo"<tr>";
                            echo"<th>Back Camera:</th>";
                            echo"<td>$r[8]</td>";
                        echo"</tr>";
                        echo"<tr>";
                            echo"<th>Battery Backup:</th>";
                            echo"<td>$r[9]</td>";
                        echo"</tr>";
                echo"</table>"?>
            </div>
                 <div class="col-md-3">
            <?php echo"<a href='edit_desc.php?pid=$id'style='text-decoration:none; font-size:16px;'>"?>
                    <div class='alert alert-info text-center' role='alert'>Update Product Description</div>
                    </a>
                </div> 
            <div class="col-md-3">
                <?php echo"<a href='delete_desc.php?pid=$id'style='text-decoration:none; font-size:16px;'>" ?>
                <div class='alert alert-danger text-center' role='alert'>Delete Product Description</div>
                </a>
            </div>
        <?php }
        else{
            echo "  <div class='alert alert-danger text-center' role='alert'>
               No description given to this product!!!
            </div>";
        } }?>
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