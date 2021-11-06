 <?php
    session_start();
    $name=$_SESSION['name'];
        require "admin/connection.php";
        $result = mysqli_query($con,"SELECT * FROM signup where name='$name'");
        if(mysqli_affected_rows($con)>0){ 
          $r=mysqli_fetch_array($result);
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
      .carousel-indicators li {
  width: 10px;
  height: 10px;
  border-radius: 100%;
}
    </style>
  </head>
  <body>
    <header class="fixed-top">
      <?php include "header.php" ?>
    </header>
    <section class="container mb-5" style="margin-top:80px;">
    <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form method="post">
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" class="form-control" name="p_id" value="<?php  echo $r['name'] ?>"/>
                    </div>

                    <div class="form-group">
                        <label for="Email Id">Email Id</label>
                        <input type="email" class="form-control" name="p_name" value="<?php echo $r['email'] ?>" readonly/>
                    </div>

                    <div class="form-group">
                        <label for="Gender">Gender</label>
                        <input type="text" class="form-control" name="p_type" value="<?php  echo $r['gender'] ?>" />
                    </div>

                     <div class="form-group">
                        <label for="Date Of Borth">Date Of Borth</label>
                        <input type="text" class="form-control" name="p_price" value="<?php echo $r['dob'] ?>" />
                    </div> 
                  </form>
       <?php }?>
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