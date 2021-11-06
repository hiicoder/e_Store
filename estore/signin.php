
<?php 
$msg="";
if(isset($_POST['signin'])){

  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $pass = htmlspecialchars($_POST['password']);
  $passw = md5($pass);
  $gender = htmlspecialchars($_POST['gender']);
  $dob = htmlspecialchars($_POST['dob']);
  $phone = htmlspecialchars($_POST['phone']);
  
    require "admin/connection.php";
    $query = "INSERT INTO signup(name,email,password,gender,dob,phone,role)VALUES('$name', '$email', '$passw', '$gender', '$dob', '$phone', 'client')";
    mysqli_query($con,$query);
    if(mysqli_affected_rows($con)>0){
        $msg = "<font color='green'>signup sucessfully!!!!</font>";
    }else {
         $msg = "<font color='red'>Error while signup!!!!</font>";
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
            <div class=" col-md-4 col-sm-6 col-xs-12 mt-4">
            <h2 class="display-4">Sign Here</h2>  
                <form id='form' method="post" onsubmit=" return validate()">

                  <div class="form-group">
                      <label for="Name">Name</label>
                      <input type="text"  name= "name"class="form-control" id="name" autocomplete="off" >
                      <span class="text-danger"id="name1"></span>
                    </div> 

                    <div class="form-group">
                      <label for="Email">Email address</label>
                      <input type="email"  name= "email" class="form-control" id="email" autocomplete="off">
                       <span class="text-danger" id="email1"></span>
                    </div>
                    <div class="form-group">
                      <label for="Email">Password</label>
                      <input type="password"  name ="password" class="form-control" id="pwd">
                       <span class="text-danger" id="pass"></span>
                    </div>
                     <div class="form-group">
                      <label for="Confirm Email">Confirm Password</label>
                      <input type="password"  name ="conpass" class="form-control" id="cpwd">
                       <span class="text-danger" id="pass1"></span>
                    </div>

                     <div class="form-group">
                        <label for="Gender">Gender</label>
                        <div class="form-control">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="gender" value="male" checked>
                              <label class="form-check-label" for="Male"> Male</label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="gender" value="female">
                              <label class="form-check-label" for="Female"> Female</label>
                            </div>
                        </div>
                    </div>

                     <div class="form-group">
                      <label for="Date Of Birth">Date Of Birth</label>
                      <input type="date" name="dob" class="form-control" id="dob">
                       <span class="text-danger" id="dob1"></span>
                    </div>

                     <div class="form-group">
                      <label for="Phone No">Phone No</label>
                      <input type="text" name="phone" class="form-control" id="phone" autocomplete="off">
                       <span class="text-danger" id="phone1"></span>
                    </div>

                    <button type="submit" name="signin" class="btn btn-primary">Signin</button>
                </form>
            </div>
           <div class=" col-md-8 col-sm-6 col-xs-12 mt-4 text-center"> 
                <?php if(isset($_POST['signin'])){ ?>
                   <div class='alert alert-info col-md-12' role='alert'>
                      <?php echo $msg; ?> 
                </div> <?php } ?>
                 <div class="card text-center">
                    <div class="card-body">
                        <img class="img-fluid"src="image/banner2.jpg" alt="banner iamge" />
                    </div>
                  </div> 
                   
            </div>
           
    </section>
    <footer>
      <?php include"footer.php"?>
    </footer>
<script type="text/javascript" src="js/formvalidate.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

