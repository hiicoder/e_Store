<?php 
    session_start();
    if(!isset($_SESSION['name']))
    {
        header("location:index.php");
    }
    $msg="";
    if(isset($_POST['add_user']))
    {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $pass = htmlspecialchars($_POST['password']);
        $passw =md5($pass);
        $gender = htmlspecialchars($_POST['gender']);
        $dob = htmlspecialchars($_POST['dob']);
        $phone = htmlspecialchars($_POST['phone']);
        $role = $_POST['role'];
        require "connection.php";
        $query = "INSERT INTO signup VALUES('$name', '$email', '$passw', '$gender', '$dob', '$phone', '$role')";
        mysqli_query($con,$query);
        if(mysqli_affected_rows($con)>0)
        {
            $msg = "<font color='green'>New User Added!!!</font>";
        }
        else
        {
          $msg = "<font color='red'>Error while Adding new user!!!!</font>";
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
    <title>eStore</title>
  </head>
  <body>
    <header>
        <?php include"header.php"?>
        <?php include"menu.php"?>
        <div class="container">
            <nav style="border-bottom:3px solid #03cafc">
                <h4>Add User</h4>
            </nav>
        </div>
    </header>
    <section class="container mb-5">
        <div class="row">
            <div class=" col-md-6 col-sm-6 col-xs-12 mt-4"> 
                <form method="post">
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text"  name= "name"class="form-control"required>
                    </div> 
                    <div class="form-group">
                        <label for="Email">Email address</label>
                        <input type="email"  name= "email" class="form-control"required>
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                          <label for="Gender">Gender</label>
                          <div class="form-control" style="height: auto;">
                              <div class="form-check">
                                  <input class="form-check-input" type="radio" name="gender" value="male" checked>
                                  <label class="form-check-label" for="Male"> Male</label>
                              </div>
                              <div class="form-check ">
                                  <input class="form-check-input" type="radio" name="gender" value="female">
                                  <label class="form-check-label" for="Female"> Female</label>
                              </div>
                          </div>
                    </div>
                    <div class="form-group">
                        <label for="Date Of Birth">Date Of Birth</label>
                        <input type="date" name="dob" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Phone No">Phone No</label>
                        <input type="text" name="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Role">Role</label>
                        <select name='role' class="form-control">
                            <option value="client">Client</option>
                            <option value="employee">Employee</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <button type="submit" name="add_user" class="btn btn-primary">Signin</button>
                </form>
          </div>
          <div class=" col-md-6 col-sm-6 col-xs-12 mt-4 text-center"> 
              <?php if(isset($_POST['add_user'])){ ?>
              <div class='alert alert-info col-md-12' role='alert'>
                  <?php echo $msg; ?> 
              </div> <?php } ?>                  
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