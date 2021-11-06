 <?php
    session_start();
    $name=$_SESSION['name'];
           ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>eStore</title>
    <style type="text/css">
      .carousel-indicators li {
  width: 10px;
  height: 10px;
  border-radius: 100%;
}
    </style>
  </head>
  <body>
    <header>
        <?php include"header.php"?>
        <?php include"menu.php"?>
         <div class="container">
        <nav style="border-bottom:3px solid #03cafc">
            <h4>Profile</h4>
        </nav>
    </div>
    </header>
    <section class="container mb-5" style="margin-top:80px;">
    <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
         <?php
          require "connection.php";
          $result = mysqli_query($con,"SELECT * FROM signup where name='$name'");
          $r=mysqli_fetch_array($result);
            echo"<table class='table table-hover table-responsive-sm table-responsive-md' width='100%'>
                <tr><th>NAME</th><td>$r[0]</td><tr>";    
            echo"<tr><th>Email</th><td>$r[1]</td></tr>";
            echo"<tr><th>Gender</th><td>$r[3]</td></tr>";
            echo"<tr><th>Date of birth</th><td>$r[4]</td></tr>";
            echo"<tr><th>Phone</th><td>$r[5]</td></tr>";
            echo "</table>";
             echo "<a href='profile_edit.php?email=$r[1]'><input type='button' class='btn btn-success btn-sm' value='Update'></a>";
   ?>
    </div>
    <div class="col-md-4"></div>

</div>
   
    </section>
    <footer class="fixed-bottom">
      <?php include"footer.php"?>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>