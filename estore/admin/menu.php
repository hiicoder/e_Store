<div class="container mt-2 ">
  <nav class="navbar navbar-expand-lg navbar-light ">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                 <a class="nav-link active" href="dashboard.php">Home</a>
            </li>
            <?php if($_SESSION['role']=='admin')echo "<li class='nav-item'>
              <a class='nav-link' href='user.php'>User</a>
            </li>" ;?>
            <li class="nav-item">
              <a class="nav-link" href="product.php">Product</a>
            </li>
            <?php if($_SESSION['role']=='admin')echo "<li class='nav-item'>
              <a class='nav-link' href='query.php'>Query</a>"; ?>
            </li>
             <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Profile
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="profile.php">My Profile</a>
          <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
      </li>
        </ul>
    </div>
  </nav>
</div>













                  