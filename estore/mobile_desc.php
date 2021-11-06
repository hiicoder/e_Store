<?php    
 session_start();

$id=htmlspecialchars($_GET['pid']);
if(isset($_COOKIE['recent']))
{
  $data=$_COOKIE['recent'].",".$id;
  setcookie('recent',$data);

}
else{
  setcookie('recent',$id);
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
  body{
  background-color: silver;
 }
</style>
  </head>
  <body>
    <header class="fixed-top">
        <?php include"header.php"?>
         <div class="container">
    </div>
    </header>
    <section class="container" style="margin-top:80px;" >
        <div class="row">
          <div class="col-md-12 col-sm-12">
   <?php  if(isset($_GET['pid'])){
        $id =htmlspecialchars($_GET['pid']);
         require "admin/connection.php";
        mysqli_select_db($con,'e_store');
          $result = mysqli_query($con,"SELECT * FROM product_master Where pid='$id'");
        if(mysqli_affected_rows($con)>0){

           $r = mysqli_fetch_array($result); ?>
                <div class='col-md-12'> 
                    <div class="row">
                        <div class='col-md-6 text-center m-auto'>
                               <img class='img-fluid' src='<?php echo$r[4] ?>' alt='mobile'> 
                        </div>
                        <div class='col-md-6 col-sm-12'>
                            <div class='row'>
                                <div class='col-md-4 col-sm-4 mt-3'><b>Name:</b></div>
                                <div class='col-md-8 col-sm-8 mt-3'><?php echo "$r[1]" ?></div>
                                <div class='col-md-4 col-sm-4 mt-3'><b>Price:</b></div>
                                <div class='col-md-8 col-sm-8 mt-3'><?php echo" $r[3] /-" ?></div>
                                <div class='col-md-12 col-sm-12 mt-3'><b>Rating </b></div>    
                                <div class='col-md-4 col-sm-4 mt-3'><b>Check Delivery</b></div>
                                <div class='col-md-6 col-sm-6 mt-3'><input type='text' class='form-control' name='check'></div>
                                <div class='col-md-12 col-sm-12 mt-3'><a href="cart.php?pid=<?php echo $r[0]?>"><input type='button' class='btn btn-success' name='addtocart' value="Add To Cart "></a></div>
                                 <div class='col-md-10 col-sm-10 mt-3'>
                                    <div class="alert alert-success">
                                        <b>Avaiable Offers</b>
                                        <ul>
                                            <li>10% off with HDFC Credit Card</li>
                                            <li>5% off with eShop Card</li>
                                            <li>5% off with Kotak Credit Card</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
       <?php }else{
            echo  "<h3>No Record Found !!!!</h3>";
        }
    ?>     
          </div>  
        <div class="col-md-12">
            <?php

             echo "<table class='table table-hover'>";
             $result = mysqli_query($con,"SELECT * FROM mobile_desc Where pid=$id");
                $r = mysqli_fetch_array($result);
                if(mysqli_affected_rows($con)>0){
                       
                            echo" <div class='text-center my-4'><h3> Product Specifications</h3></div>";
                        
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
        <?php }
        else{
            echo "  <div class='alert alert-danger text-center' role='alert'>
               No description given to this product!!!
            </div>";
        } }
        else{
            header('location:mobile.php');
        }
        ?>
    </div>
    </section>
    <footer class="">
      <?php include "footer.php"?>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>