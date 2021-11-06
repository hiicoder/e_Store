
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>iStore</title>
    <style type="text/css">
  body{
  background-color: silver;
 }
</style>
  </head>
  <body>
    <header>
      <?php include "header.php" ?>
    </header>
    <section class="container mb-5">
        <div class="row">
            <div class=" col-md-6 col-sm-6 col-xs-12 mt-4">
            <h2 class="display-4 mb-5">Forgot Password</h2>  
                <form method="post">
                    <div class="form-group">
                
                      <label for="Email" class="text-primary">Enter Your registerd Email address*</label>
                      <input type="email"  name= "email"class="form-control" id="email" placeholder="Enter email">
              
                    </div>
                    <button type="submit" name="checkemail" class="btn btn-primary my-3">Submit</button><br>
                </form>
            </div>
          </div>
            <div class=" col-md-6 col-sm-6 col-xs-12 mt-4">
            <?php

            if(isset($_POST['checkemail'])){
                    $email=htmlspecialchars($_POST['email']);
                   require "admin/connection.php";
                    $result = mysqli_query($con,"SELECT * FROM signup where email='$email' and role='client'");
                    if(mysqli_affected_rows($con)>0){
                      $r = mysqli_fetch_array($result);
                       session_start();
                         $_SESSION['name']=$r['name'];
                        echo "<b>Is that your name : </b>$r[0] <br>";
                        echo "<a href='forgetpass.php?email=$r[1]'><input type='button' class='btn btn-primary btn-sm mt-4' value='Yes'></a>";
                        echo "<a href='forget.php'><input type='button' class='btn btn-primary btn-sm mt-4 ml-3' value='No'></a>";
                      }
                      else{
                  
                    }
                     
                  mysqli_close($con);
            }
          ?>
           </div>
    </section>
    <footer style="margin-top:330px;">
      <?php include"footer.php"?>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>