
<?php
  $msg="";
  if(isset($_POST['login']))
    {
      $email=htmlspecialchars($_POST['email']);
      $pass=htmlspecialchars($_POST['password']);
      $passw =md5($pass);
      require "connection.php"; 
      $result = mysqli_query($con,"SELECT * FROM signup where email='$email' && password='$passw'");
      if(mysqli_affected_rows($con)>0)
        {
          $r = mysqli_fetch_array($result);
          if($r['role']=='admin' ||$r['role']=='employee')
           {
              session_start();
              $_SESSION['name']=$r['name'];
              $_SESSION['role']=$r['role'];
              header("location:dashboard.php");
            }
            else
            {
                 header("location:index.php");
            }
        }
        else
        {
          $msg="<font style='color:red'><strong>Wrong Username Or Password !!!!</strong></font>";
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
    <title>eshop</title>
  </head>
  <body>
    <header>
      <?php include "header.php"?>
      <div class="container mt-5">
        <nav style="border-bottom:3px solid #03cafc">
          <div class="navbar-brand">PLEASE LOGIN TO ENTER</div>
        </nav>
      </div>
    </header>
    <section class="container">
      <div class="row">
        <div class="col-md-6">
          <form id="myForm" method="post" onsubmit="return validate()">
            <div class="form-group my-5">Login To <b>eShop Panel:</b></div>
            <div class="form-group">
              <?php  echo $msg."<br>"?>
              <label for="exampleInputEmail1">Email address</label><span class="text-danger"style=" font-size:20px;">*</span>
              <input type="email" class="form-control" name="email" id="emailid">
              <span id="em" class="text-danger"style=" font-size:20px;"></span>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label><span class="text-danger"style="font-size:20px;">*</span>
              <input type="password" class="form-control" name="password" id="pass">
              <span id="pas"class="text-danger"style=" font-size:20px;"></span>
            </div>
            <button type="submit" name="login" class="btn btn-primary">Log Me In</button>
          </form>
        </div>
        <div class="col-md-6 my-5">
          <div class="alert alert-info" role="alert">
            <b>Instructions to use:</b>
              <ul>
                <li>Please enter your Email in Email column.</li>
                <li>Please enter your Password in Password column.</li>
                <li>Click Log Me In to visit eStore Panel.</li>
              </ul>
          </div>
        </div>
      </div>
    </section>
    <footer style="margin-top:213px;">
      <?php include"footer.php"?>
    </footer>
    <!--validation-->
    <script type="text/javascript">
      function validate() {
        var email = document.getElementById('emailid').value;
        var pass = document.getElementById('pass').value;

        if(email == "")
        {
          document.getElementById('emailid').style.borderColor="red";
          return false;
        }
        else{
             document.getElementById('emailid').style.borderColor="green";
        }
        if(pass == "")
        {
          document.getElementById('pass').style.borderColor="red";
          return false;
        }
        else{
           document.getElementById('pass').style.borderColor="green";
        }
      }
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>