<?php
session_start();
    if(!isset($_SESSION['name'])){
        header("location:index.php");
    }
    include "connection.php";
    if(isset($_GET['email'])){
        $email=htmlspecialchars($_GET['email']);
        $result=mysqli_query($con,"SELECT * FROM signup WHERE email='$email'");
        $r= mysqli_fetch_array($result);
    }
    if(isset($_POST['update']))
    {
        $name = htmlspecialchars($_POST['name']);
        $gender = htmlspecialchars($_POST['gender']);
        $dob = htmlspecialchars($_POST['dob']);
        $phone = htmlspecialchars($_POST['phone']);

        mysqli_query($con,"UPDATE signup SET name='$name', gender='$gender', dob='$dob', phone='$phone', WHERE email='$email'");
        header("location:profile.php");
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
    <title>eStore</title>
  </head>
  <body>
    <header>
        <?php include"header.php"?>
        <?php include"menu.php"?>
         <div class="container">
        <nav style="border-bottom:3px solid #03cafc">
            <h4>Profile Update</h4>
        </nav>
    </div>
    </header>
    <section class="container mb-5">
          <div class="row">
            <div class=" col-md-6 col-sm-6 col-xs-12 mt-4">
                <form method="post">

                  <div class="form-group">
                      <label for="Name">Name</label>
                      <input type="text"  name= "name" class="form-control" value="<?php if(isset($_GET['email']))echo $r[0]?>">
                    </div> 

                    <div class="form-group">
                      <label for="Email">Email address</label>
                      <input type="email"  name= "email" class="form-control" value="<?php if(isset($_GET['email']))echo $_GET['email'] ?>" readonly>
                    </div>
                     <div class="form-group">
                        <label for="Gender">Gender</label>
                        <div class="form-control" style="height: auto;">
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
                      <input type="date" name="dob" class="form-control" value="<?php if(isset($_GET['email']))echo $r[4] ?>">
                    </div>

                     <div class="form-group">
                      <label for="Phone No">Phone No</label>
                      <input type="text" name="phone" class="form-control" value="<?php if(isset($_GET['email']))echo $r[5] ?>">
                    </div>
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                </form>
            </div>
           <div class=" col-md-6 col-sm-6 col-xs-12 mt-4 text-center"> 
              
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