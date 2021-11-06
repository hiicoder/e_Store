<?php
$msg="";
if(isset($_POST['login'])){
        $email=htmlspecialchars($_POST['email']);
        $pass=htmlspecialchars($_POST['password']);
        $passw = md5($pass);
       require "admin/connection.php";
        $result = mysqli_query($con,"SELECT * FROM signup where email='$email' && password='$passw'");
        if(mysqli_affected_rows($con)>0){
          if(isset($_POST['rem'])){
            setcookie("email",$email,time()+3600);
            setcookie("password",$passw,time()+3600);
          }
          $r = mysqli_fetch_array($result);
          if($r['role']=='client'){
          session_start();
            $_SESSION['name']=$r['name'];
            $_SESSION['email']=$r['email'];
            $_SESSION['phone']=$r['phone'];
              if(isset($_GET['pid']))
              {
                $id=$_GET['pid'];
                header("location:view_cart.php?pid=$id");
              }else{
                  header("location:index.php");
                }
          }
          else{
          $msg="<font style='color:red'><strong>Wrong Username Or Password !!!!</strong></font>";
        }
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style type="text/css">
  body{
  background-color: silver;
 }
</style>
    <title>iStore</title>
  </head>
  <body>
    <header>
      <?php include "header.php" ?>
    </header>
    <section class="container mb-5">
        <div class="row">
            <div class=" col-md-4 col-sm-6 col-xs-12 mt-4">
            <h2 class="display-4 mb-3">Login Here</h2>  
                <form method="post" onsubmit="return validate()">
                    <div class="form-group">
                      <?php  echo $msg."<br>"?>
                      <label for="Email">Email address</label>
                      <input type="email"  name= "email"class="form-control" id="email" placeholder="Enter email" value="<?php if(isset($_COOKIE['email'])) echo $_COOKIE['email']?>">
              
                    </div>
                    <div class="form-group">
                      <label for="Password">Password</label>
                      <input type="password" name="password" class="form-control" id="pwd" placeholder="Password" value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password']?>">
                    
                    </div>
                     <div class="form-check">
                      <input type="checkbox" class="form-check-input" name="rem">
                      <label for="exampleCheck1">Remember Me</label>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary my-3">Login</button><br>
                    <a href="forget.php">Forgot password?</a> | New User? <a href="signin.php">Register Here</a>
                </form>
            </div>
           <div class=" col-md-8 col-sm-6 col-xs-12 mt-4 text-center">  
                 <div class="card text-center">
                    <div class="card-body">
                        <img class="img-fluid"src="image/banner2.jpg" alt="banner iamge" />
                    </div>
                  </div> 
            </div>
    </section>
    <footer style="margin-top: 125px;">
      <?php include"footer.php"?>
    </footer>

     <script type="text/javascript">
      function validate() {
        var email = document.getElementById('email').value;
        var pwd = document.getElementById('pwd').value;
        var emailcheck = email.charAt(0);

        if(email=="")
      {
        document.getElementById("email").style="border-color:#e52213";
        return false;
      }
      else{
        document.getElementById("email").style="border-color:#006400";
      }


      if(pwd=="")
      {
        document.getElementById("pwd").style="border-color:#e52213";
      return false;
      }
      else{
        document.getElementById("pwd").style="border-color:#006400";
      }
      }
    </script>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>