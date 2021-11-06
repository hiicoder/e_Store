<nav class="navbar navbar-expand-lg navbar-light "style="background-color:#03cafc;">
<div class="container">

    <a class='navbar-brand' href='index.php'><h4>iStore</h4></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
    <ul class="navbar-nav text-end">
      <li class='nav-item mr-4'>
        <a class='nav-link active' href='index.php'>Home</a>
      </li>
      <li class="nav-item mr-4">
        <a class="nav-link" href="about.php">About Us</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Products
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="mobile.php">Mobiles</a>
          <a class="dropdown-item" href="#">Ipads</a>
          <a class="dropdown-item" href="#">Laptops</a>
          <a class="dropdown-item" href="#">Accessories</a>
        </div>
      </li> 
      <?php if(isset($_SESSION['name']))
      {echo"
       <li class='nav-item dropdown'>
        <a class='nav-link dropdown-toggle' data-toggle='dropdown'>
         Account
        </a>
        <div class='dropdown-menu'>
          <a class='dropdown-item' href='cart.php'>Cart</a>
          <div class='dropdown-divider'></div>
            <a class='dropdown-item' href='profile.php'>View Profile</a>
          <div class='dropdown-divider'></div>
            <a class='dropdown-item' href='logout.php'>Logout</a>
          </div>
        </li>   
       ";}else{echo"
         <li class='nav-item dropdown'>
        <a class='nav-link dropdown-toggle' data-toggle='dropdown'>
         Account
        </a> 
        <div class='dropdown-menu'>
          <a class='dropdown-item' href='login.php'>Login</a>
          <div class='dropdown-divider'></div>
            <a class='dropdown-item' href='signin.php'>Sign In</a>
          </div>
      </li>";}?>
      <li class="nav-item mr-4">
        <a class="nav-link" href="view_cart.php">Cart <sup><font color="#fff" size="3"><?php
          if(isset($_COOKIE['cart'])){
            $data = $_COOKIE['cart'];
            $arr = explode(",", $data);
            echo "<b>".count($arr)."</b>";
          }
        ?></font></sup></a>
        
      </li>
      <li class="nav-item mr-4">
        <a class="nav-link" href="contact.php">Contact Us</a>
      </li>
    </ul>
  </div>
</div>
</nav>