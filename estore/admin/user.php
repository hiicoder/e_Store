<?php 
session_start();
    if(!isset($_SESSION['name'])){
        header("location:index.php");
    }?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>eStore</title>
    <style type="text/css">
        .btn{
            width:80px;
        }
    </style>
  </head>
  <body>
    <header>
        <?php include"header.php"?>
        <?php include"menu.php"?>
         <div class="container">
        <nav style="border-bottom:3px solid #03cafc">
            <h4>User</h4>
        </nav>
    </div>
    </header>
    <section class="container my-5 ">
        <div class="row my-3">
        <div class="col-md-4"></div>
      <div class="col-md-4">
        <a href="add_user.php" style="text-decoration:none; font-size: 18px;">
            <div class="alert alert-info text-center" role="alert">
               Add User
            </div>
        </a>
    </div>
</div>
    <div class="col-sm-12">
          <h4 class='mb-3 text-primary'>ADMIN</h4>
        <?php
        require "connection.php";
        $result = mysqli_query($con,"SELECT * FROM signup WHERE role='admin'");
        if(mysqli_affected_rows($con)>0){
        
            echo"<hr>";
            echo"<table class='table table-hover table-responsive-sm table-responsive-md text-center table-sm' width='100%'>
                <tr  style='background-color:#03cafc;'>
                <th>NAME</th>
                <th>Email</th>
                <th>Password</th>
                <th>Gender</th>
                <th>Date of birth</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Update</th>
                <th>Delete</th>
                </tr>";
        
            while($r = mysqli_fetch_array($result))
            {
                echo"<tr>";
                echo"<td>$r[0]</td>";
                echo"<td>$r[1]</td>";
                echo"<td>$r[2]</td>";
                echo"<td>$r[3]</td>";
                echo"<td>$r[4]</td>";
                echo"<td>$r[5]</td>";
                echo"<td>$r[6]</td>";
                echo "<td><a href='edit_user.php?email=$r[1]'><input type='button' class='btn btn-success btn-sm' value='Update'></a></td>";
                echo "<td><a href='delete_user.php?email=$r[1]'><input type='button' class='btn btn-danger btn-sm' value='Delete'></a></td>";
                echo "</tr>";
            }
            echo "</table>";
            echo"<hr>";
        }else{
            echo  "<h3>No Record Found !!!!</h3>";
        }
        ?>
        <h4 class='mb-3  text-primary'>EMPLOYEE</h4>
         <?php
        require "connection.php";
        $result = mysqli_query($con,"SELECT * FROM signup WHERE role='employee'");
         if(mysqli_affected_rows($con)>0){
        
            echo"<table class='table table-hover table-responsive-sm table-responsive-md text-center table-sm' width='100%'>
                <tr  style='background-color:#03cafc;'>
                <th>NAME</th>
                <th>Email</th>
                <th>Password</th>
                <th>Gender</th>
                <th>Date of birth</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Update</th>
                <th>Delete</th>
                </tr>";
       
            while($r = mysqli_fetch_array($result)){
                echo "<tr>";
                echo"<td>$r[0]</td>";
                echo"<td>$r[1]</td>";
                echo"<td>$r[2]</td>";
                echo"<td>$r[3]</td>";
                echo"<td>$r[4]</td>";
                echo"<td>$r[5]</td>";
                echo"<td>$r[6]</td>";
                echo "<td><a href='edit_user.php?email=$r[1]'><input type='button' class='btn btn-success btn-sm' value='Update'></a></td>";
                echo "<td><a href='delete_user.php?email=$r[1]'><input type='button' class='btn btn-danger btn-sm' value='Delete'></a></td>";
                echo "</tr>";
            }
            echo "</table>";
            echo"<hr>";
        }else{
            echo  "<h3>No Record Found !!!!</h3>";
        }

        ?><h4 class='mb-3 text-primary'>CLIENT</h4>
         <?php
        require "connection.php";
        $result = mysqli_query($con,"SELECT * FROM signup WHERE role='client'");
        if(mysqli_affected_rows($con)>0){
            echo"<hr>";
            echo"<table class='table table-hover table-responsive-sm table-responsive-md text-center table-sm' width='100%'>
                <tr  style='background-color:#03cafc;'>
                <th>NAME</th>
                <th>Email</th>
                <th>Password</th>
                <th>Gender</th>
                <th>Date of birth</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Update</th>
                <th>Delete</th>
                </tr>";
            while($r = mysqli_fetch_array($result)){
                echo "<tr>";
                echo"<td>$r[0]</td>";
                echo"<td>$r[1]</td>";
                echo"<td>$r[2]</td>";
                echo"<td>$r[3]</td>";
                echo"<td>$r[4]</td>";
                echo"<td>$r[5]</td>";
                echo"<td>$r[6]</td>";
                echo "<td><a href='edit_user.php?email=$r[1]'><input type='button' class='btn btn-success btn-sm' value='Update'></a></td>";
                echo "<td><a href='delete_user.php?email=$r[1]'><input type='button' class='btn btn-danger btn-sm' value='Delete'></a></td>";
                echo "</tr>";
            }
            echo "</table>";
            echo"<hr>";
        }else{
            echo  "<h3>No Record Found !!!!</h3>";
        }

        ?>
    </div>
    </section>
    <footer style="margin-top: 250px;">
        <?php include"footer.php"?>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>