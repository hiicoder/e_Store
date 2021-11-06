 
              <div class="bd-example">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="image/banner04.jpg" alt="First slide" />
                      <div class="carousel-caption  d-md-block">
                        <h1>Latest Apple Iphone Collections</h1>
                        <p class="d-none d-md-block">We Have all the latest Apple products!</p>
                        <?php if(!isset($_SESSION['name']))
                        echo"<a href='Signin.php' class='btn btn-primary'>Signup Now</a>";?>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="image/banner05.jpg" alt="Second slide" />
                      <div class="carousel-caption  d-md-block">
                        <h1>Latest Apple Iphone Collections</h1>
                        <p class="d-none d-md-block">We Have all the latest Apple products!</p>
                       <?php if(!isset($_SESSION['name']))
                        echo"<a href='Signin.php' class='btn btn-primary'>Signup Now</a>";?>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="image/banner03.jpg" alt="Third slide" />
                      <div class="carousel-caption  d-md-block">
                        <h1>Latest Apple Iphone Collections</h1>
                        <p class="d-none d-md-block">We Have all the latest Apple products!</p>
                        <?php if(!isset($_SESSION['name']))
                        echo"<a href='Signin.php' class='btn btn-primary'>Signup Now</a>";?>
                      </div>
                    </div>
                  <div class="carousel-item">
                      <img class="d-block w-100" src="image/banner01.jpg" alt="Fourth slide" />
                      <div class="carousel-caption  d-md-block">
                        <h1>Latest Apple Iphone Collections</h1>
                        <p class="d-none d-md-block">We Have all the latest Iphones!</p>
                        <?php if(!isset($_SESSION['name']))
                        echo"<a href='Signin.php' class='btn btn-primary'>Signup Now</a>";?>
                      </div>
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
 