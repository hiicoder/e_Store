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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style type="text/css">
 body{
  background-color: silver;
 }
      .hint{
  background-color:#fff;
  width:305px;
  border-bottom-right-radius:5px;
  border-bottom-left-radius:5px;
 z-index: 1;
}
    </style>
    <title>iStore</title>
  </head>
  <body>
    <header class="fixed-top">
      <?php include "header.php" ?>
    </header>
    <section class="container mb-5"  style="margin-top:80px;">
       <div class="row">
           <div class="col-md-4"></div><div class="col-md-4"></div>
            <div class="col-md-4">
              <div class="form-inline my-2 my-lg-0">
              
                <input class="form-control mr-sm-2 btn-sm" type="search" size='40' placeholder="Search" id="search" onkeyup="getProductName()">
                <button class="btn btn-outline-dark btn-sm"><i class="fa fa-search" aria-hidden="true" onclick="getProduct()"></i></button>
                 
              </div>
              <div id="hint" class="hint" style="position:absolute;"></div>
            </div>
        </div>
        <div class="row" id="t2"></div>
        <div class="row" id="t1">
           <?php 
            require "admin/connection.php";
           $result = mysqli_query($con,"SELECT * FROM product_master");
            if(mysqli_affected_rows($con)>0){ 
           while($r = mysqli_fetch_array($result)){ 
                  echo" <div class=' col-md-4 col-sm-6 col-xs-12 mt-4'> "; 
                     echo" <div class='card'>";
                        echo" <div class='card-body text-center'>";
                            echo"<a href='mobile_desc.php?pid=$r[0]'> <img class='img-fluid' src='$r[4]' alt='mobile'> </a>";
                          echo" <p class='card-text'><b> $r[1]</b> </br>Price: $r[3] /-</p>";
                         if(isset($_SESSION['name'])) {echo" <a href='cart.php?pid=$r[0]' class='btn btn-primary btn-block'>Add To Cart</a>";
                          }else{
                            echo" <a href='login.php' class='btn btn-primary btn-block'>Order Now!</a>";
                          }
                        echo" </div>";
                    echo" </div>";
                  echo" </div>";
                 }
        }else{
            echo  "<h3>No Record Found !!!!</h3>";
        }
    ?>
         </div>
    </section>
    <footer>
      <?php include"footer.php"?>
    </footer>
    <script type="text/javascript" src="js/script1.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script type="text/javascript">
        
      </script>
  </body>
</html>