<?php 
  $data =htmlspecialchars($_GET['id']);
            require "admin/connection.php";
           $result = mysqli_query($con,"SELECT * FROM product_master where ptype='mobile' and pname like '$data%'");
            if(mysqli_affected_rows($con)>0){ 
           while($r = mysqli_fetch_array($result)){ 
                  echo" <div class=' col-md-4 col-sm-6 col-xs-12 mt-4'> "; 
                     echo" <div class='card'>";
                        echo" <div class='card-body text-center'>";
                            echo"<a href='mobile_desc.php?pid=$r[0]'> <img class='img-fluid' src='$r[4]' alt='mobile'> </a>";
                          echo" <p class='card-text'><b> $r[1]</b> </br>Price: $r[3] /-</p>";
                         if(isset($_SESSION['name'])) {echo" <a href='#' class='btn btn-primary btn-block'>Add To Cart</a>";
                          }else{
                            echo" <a href='login.php' class='btn btn-primary btn-block'>Order Now!</a>";
                          }
                        echo" </div>";
                    echo" </div>";
                  echo" </div>";
                 }
        }else{
          
          echo" <div class=' col-md-4 col-sm-6 col-xs-12 mt-4'> "; 
                     echo" <div class='card'>";
                        echo" <div class='card-body text-center'>";
                          echo" <p class='card-text'><h3>No Record Found !!!!</h3>";
                        echo" </div>";
                    echo" </div>";
                  echo" </div>";
        }
    ?>