<?php
$msg="";
if(isset($_POST['submit'])){

  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $phone = htmlspecialchars($_POST['phone']);
  $subject = htmlspecialchars($_POST['subject']);
  $query = htmlspecialchars($_POST['query']);
    require "admin/connection.php";
    $query = "INSERT INTO query(name,email,phone,subject,query)VALUES('$name', '$email','$phone','$subject','$query')";
    mysqli_query($con,$query);
    if(mysqli_affected_rows($con)>0){
        $msg = "<font color='green'><strong>Your query is submitted. We will Contact You ASAP.</strong></font>";
    }else {
         $msg = "<font color='red'>Sorry! Your query is not Submitted!!!!</font>";
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
        <div class="row mt-2">
          <div class=" col-md-6 col-sm-12 col-xs-12 mt-3">
             <div class="card text-center">
                    <div class="card-body">
                        <img class="img-fluid"src="image/banner2.jpg" alt="banner iamge" />
                    </div>
                  </div> 
                   <div class="card text-left">
                    <div class="card-body">
                      <h2>Contact Us</h2>
                      <table class="table-hover table-responsive text-left">
                        <tr><th>Email ID :</th><td> <a href="#"> estore@123.in</a></td></tr>
                        <tr><th>Contact :</th><td> +91-12300000</td></tr>
                        <tr><th>Address :</th><td> Patna,Bihar (800014)</td></tr>
                        <tr><th>Website :</th><td><a href="#"> www.estore.com</a></td></tr>
                      </table>
                    </div>
                  </div>
          </div>
          <div class=" col-md-6 col-sm-12 col-xs-12">
               <h2>Contact Us</h2>
              <form method="post" onsubmit="return validate()">
                <div class="form-group">
                  <label for="Name">Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Your Name" id="name2">
                   <span class="text-danger"id="name1"></span>
                </div>
                 <div class="form-group">
                  <label for="Email">Email</label>
                  <input type="email" name="email" class="form-control" placeholder="name@example.com" id="emailid">
                  <span class="text-danger"id="email1"></span>
                </div>
                 <div class="form-group">
                  <label for="Contact No">Contact No.</label>
                  <input type="text" name="phone" class="form-control" placeholder="Contact No." id="phone">
                   <span class="text-danger"id="phone1"></span>
                </div>
                 <div class="form-group">
                  <label for="Subject">Subject</label>
                  <input type="text" name="subject" class="form-control" placeholder="Subject" id="sub">
                   <span class="text-danger"id="sub1"></span>
                </div>
                <div class="form-group">
                  <label for="query">Your Query</label>
                  <textarea class="form-control"rows="3" name="query" id="txt"></textarea>
                   <span class="text-danger"id="txt1"></span>
                </div>
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  <?php echo $msg ?>
              </form>
          </div>
        </div>
    </section>
    <footer style="margin-top:61px;">
      <?php include"footer.php"?>
    </footer>
    <script type="text/javascript">
      
      function validate() {
      var name=document.getElementById('name2').value;
      var email=document.getElementById('emailid').value;
      var phone=document.getElementById('phone').value;
      var sub=document.getElementById('sub').value;
      var txt=document.getElementById('txt').value;
       var emailcheck = email.charAt(0);
      if(name=="")
      {
        document.getElementById("name2").style = "border-color:#e52213";
        return false;
      }
      if((name.length <= 2)||(name.length > 20))
      {
        document.getElementById("name2").style = "border-color:#e52213";
        document.getElementById("name1").innerHTML = "*Name must be between 3-20 character.";
        return false;
      }
      
       if(!/^[a-zA-Z]*$/.test(name)){
          document.getElementById("name2").style="border-color:#e52213";
         document.getElementById("name1").innerHTML="*Number not allowed.";
          return false;
      }
      else{
        document.getElementById("name2").style = "border-color:#006400";
        document.getElementById("name1").innerHTML = "";
      }

      if(email=="")
      {
        document.getElementById("emailid").style="border-color:#e52213";
        return false;
      }
      if(emailcheck<='9' && emailcheck>='0')
      {
        document.getElementById("emailid").style="border-color:#e52213";
        document.getElementById("email1").innerHTML="Email must start with a Alphabet letter";
        return false;
      }
      if(email.indexOf('@')<=0)
      {
        document.getElementById("emailid").style="border-color:#e52213";
        document.getElementById("email1").innerHTML="Invalid email";
        return false;
      }

      if((email.charAt(email.length-4)!=".")&&(email.charAt(email.length-3)!="."))
      {
        document.getElementById("emailid").style="border-color:#e52213";
        document.getElementById("email1").innerHTML="*. is at invalid position or not found.";
        return false;
      }

      else{
        document.getElementById("emailid").style="border-color:#006400";
        document.getElementById("email1").innerHTML="";
      }

        if(phone=="")
      {
        document.getElementById("phone").style="border-color:#e52213";
      return false;
      }
      if(!/^[0-9]*$/g.test(phone)){
          document.getElementById("phone").style="border-color:#e52213";
         document.getElementById("phone1").innerHTML="*Only Number allowed.";
       return false;
      }
      if(phone.length!=10)
      {
        document.getElementById("phone").style="border-color:#e52213";
        document.getElementById("phone1").innerHTML="*Must be 10 digit Number.";
      return false;
      }
      else{

        document.getElementById("phone").style="border-color:#006400";
        document.getElementById("phone1").innerHTML="";
      }

      if(sub=="")
      {
        document.getElementById("sub").style="border-color:#e52213";
        return false;
      }
      if((sub.length <= 5)||(sub.length > 20))
      {
        document.getElementById("sub").style = "border-color:#e52213";
        document.getElementById("sub1").innerHTML = "*Subject must be between 5-20 character.";
        return false;
      }
      if(!/^[a-zA-Z]*$/.test(sub)){
          document.getElementById("sub").style="border-color:#e52213";
         document.getElementById("sub1").innerHTML="*Number not allowed.";
          return false;
      }
       else{

        document.getElementById("sub").style="border-color:#006400";
        document.getElementById("sub1").innerHTML="";
      }

      if(txt=="")
      {
        document.getElementById("txt").style="border-color:#e52213";
        return false;
      }
      if((txt.length <= 5)||(txt.length > 100))
      {
        document.getElementById("txt").style = "border-color:#e52213";
        document.getElementById("txt1").innerHTML = "*Query must be between 5-100 character.";
        return false;
      }
       else{

        document.getElementById("txt").style="border-color:#006400";
        document.getElementById("txt1").innerHTML="";
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