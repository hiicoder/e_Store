
<?php
session_start();
if(isset($_SESSION['name']))
{
     require "admin/connection.php";
        if(isset($_POST['update']))
        {
        $email = htmlspecialchars($_GET['email']);
        $pass= htmlspecialchars($_POST['pass']);
        $passw = md5($pass);
        $result = mysqli_query($con,"UPDATE signup SET password='$passw' Where email='$email' and role='client'");
        header("location:forgetsession.php");
        }                
        mysqli_close($con);
}
else{
   header("location:forget.php");
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
                <form method="post" onsubmit=" return validate()">
                    <div class="form-group">
                      <label for="Password" class="text-primary">Enter your new password*</label>
                      <input type="password" name= "pass" class="form-control" id="pwd" placeholder="New password">
                      <span class="text-danger" id="pass"></span>
                    </div>
                     <div class="form-group">
                      <label for="Password" class="text-primary">Re-enter password*</label>
                      <input type="password" name= "pass" class="form-control" id="cpwd" placeholder="Re-password">
                      <span class="text-danger" id="pass1"></span>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary my-3">Submit</button><br>
                </form>
            </div>
          </div>
    </section>
    <footer style="margin-top: 125px;">
      <?php include"footer.php"?>
    </footer>

    <script type="text/javascript">
      function validate() {

      var pwd = document.getElementById('pwd').value;
      var cpwd = document.getElementById('cpwd').value;
       
       if(pwd=="")
      {
        document.getElementById("pwd").style="border-color:#e52213";
      return false;
      }
       if((pwd.length <= 5)||(pwd.length > 20))
      {
        document.getElementById("pwd").style="border-color:#e52213";
        document.getElementById("pass").innerHTML="*Password must be between 3-20 character.";
      return false;
      }
      else{
        document.getElementById("pwd").style="border-color:#006400";
        document.getElementById("pass").innerHTML="";
      }


      if(pwd!=cpwd){
        document.getElementById("pass1").innerHTML="*Password and Re Password not Match.";
        return false;
      }

      if(cpwd=="")
      {
        document.getElementById("cpwd").style="border-color:#e52213";
        return false;
      }else{
        document.getElementById("cpwd").style="border-color:#006400";
         document.getElementById("pass1").innerHTML="";
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