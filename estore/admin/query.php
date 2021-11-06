<?php
session_start();
    if(!isset($_SESSION['name'])){
        header("location:index.php");
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
            <h4>Query</h4>
        </nav>
    </div>
    </header>
    <section class="container mt-5 ">
        <div class="row my-3">
</div>
    <div class="col-sm-12">
        <?php
        require "connection.php";
        $result = mysqli_query($con,"SELECT * FROM query");
        if(mysqli_affected_rows($con)>0){
            echo"<table class='table table-striped text-center' width='100%'>";
            echo"<tr>";
            echo"<th>NAME</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Subject</th>
                <th>View Query</th>
                <th>Delete</th>";
            echo"</tr>";
            while($r = mysqli_fetch_array($result)){
                echo "<tr>";
                echo"<td>$r[0]</td>";
                echo"<td>$r[1]</td>";
                echo"<td>$r[2]</td>";
                echo"<td>$r[3]</td>";
                echo "<td><a href='view_query.php?name=$r[0]'><input type='button' class='btn btn-success' value='View'></td>";
                echo "<td><a href='delete_query.php?name=$r[0]'><input type='button' class='btn btn-danger' value='Delete'></td>";
                echo "</tr>";
            }
            echo "</table>";
        }else{
            echo  "<h3>No Record Found !!!!</h3>";
        }

        ?>
    </div>
    </section>
     <footer style="margin-top: 456px;">
        <?php include"footer.php"?>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>