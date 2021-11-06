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
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>iStore</title>
 
    <style type="text/css">
      body{
        background-color:silver;
      }
      .carousel-indicators li {
  width: 10px;
  height: 10px;
  border-radius: 100%;
}
    </style>
  </head>
  <body>
    <header class="fixed-top">
      <?php include "header.php"?>
    </header>
    <section class="container mb-5" style="margin-top:70px;">
     <?php include "slider.php" ?>
   </section>
   <section  class="container mb-5">
        <center><h1 class="mt-4">Our Product</h1></center>
          <div class="row">
                    <div class=" col-md-3 col-sm-6 col-xs-12 mt-4">  
                         <div class="card">
                            <div class="card-body text-center">
                              <picture>
                              <a href="mobile.php"><img class="img-fluid" src="image\mobile.jpg" alt="mobile"></a>
                              </picture>
                              <p class="card-text"><b>Mobile</b></p>
                              <a href="login.php" class="btn btn-primary btn-block">Order Now!</a>
                            </div>
                        </div>
                    </div>
                    <div class=" col-md-3 col-sm-6 col-xs-12 mt-4">  
                         <div class="card">
                            <div class="card-body text-center">
                              <picture>
                              <a href="#"><img class="img-fluid" src="image\iPads.jpg" alt="mobile"></a>
                              </picture>
                              <p class="card-text"><b>Ipad</b></p>
                              <a href="login.php" class="btn btn-primary btn-block">Order Now!</a>
                            </div>
                        </div>
                    </div>
                 
                    <div class=" col-md-3 col-sm-6 col-xs-12 mt-4">  
                         <div class="card">
                            <div class="card-body text-center">
                             <picture>
                              <a href="#"><img class="img-fluid" src="image\MacBook.jpg" alt="mobile"></a>
                              </picture>
                              <p class="card-text"><b>Laptop</b></p>
                              <a href="login.php" class="btn btn-primary btn-block">Order Now!</a>
                            </div>
                        </div>
                    </div>
                     <div class=" col-md-3 col-sm-6 col-xs-12 mt-4">  
                         <div class="card">
                            <div class="card-body text-center">
                             <picture>
                              <a href="#"><img class="img-fluid" src="image\accessories.jpg" alt="mobile"></a>
                              </picture>
                              <p class="card-text"><b>Accessories</b></p>
                              <a href="login.php" class="btn btn-primary btn-block">Order Now!</a>
                            </div>
                        </div>
                    </div>
            </div>
           <center><h1 class="mt-4">Latest Products</h1></center>
               <div class="row">
                 <?php 
                 include "admin/connection.php";
        $result = mysqli_query($con,"SELECT * FROM product_master");
        if(mysqli_affected_rows($con)>0){ 
           while($r = mysqli_fetch_array($result)){
                echo" <div class='col-md-4 col-sm-6 col-xs-12 mt-4'> "; 
                   echo" <div class='card'>";
                      echo" <div class='card-body text-center'>";
                      echo"<a href='mobile_desc.php?pid=$r[0]'> <img class='img-fluid' src='$r[4]' alt='mobile'></a>";
                        echo" <p class='card-text'><b> $r[1]</b></p>";
                         if(isset($_SESSION['name'])) {echo" <a href='#' class='btn btn-primary btn-block'>Add To Cart</a>";
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
             <center><h1 class="mt-4">Recent Views</h1></center>
             <div class="row">
          <?php 
                        
             if(isset($_COOKIE['recent']))
             {
              $id =htmlspecialchars($_COOKIE['recent']);   
              $id = explode(',', $id);
              $id=array_unique($id);
              $id= array_reverse($id);           
               foreach($id as $val)
               {                                 
                $result=mysqli_query($con,"select * from product_master where pid=$val");
                $r=mysqli_fetch_array($result);
                  echo" <div class=' col-md-4 col-sm-6 col-xs-12 mt-4'>
                          <div class='card'>
                            <div class='card-body text-center'>
                              <img class='img-fluid' src='$r[4]' alt='mobile'>
                              <p class='card-text'><b> $r[1]</b></p>
                            </div>
                          </div>
                        </div>";
                      }}
                   ?>
          </div>
    </section>
    <footer>
      <?php include"footer.php"?>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>