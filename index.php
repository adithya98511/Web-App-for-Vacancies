<?php

require 'core.php';
require 'database_connector.php';
require 'functions.php';

//OPERATION OF THE SIGN-UP BUTTON
if (array_key_exists('signup', $_POST)) {
  header("Location: userRegistration.php");
}

//OPERATION OF THE LOGIN BUTTON
if (array_key_exists('login', $_POST)) {
  header("Location: login.php");
}

//OPERATION OF THE logout BUTTON
if (array_key_exists('logout', $_POST)) {
  header("Location: logout.php");
}

//OPERATION OF THE USER PROFILE BUTTON
if (array_key_exists('profile', $_POST)) {
  header("Location: user/userProfile.php");
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JOB WORLD</title>

  <!-- Link Bootstrap -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="style.css" type="text/css">
  <link rel="shortcut icon" href="images/logo1.png" type="image/x-icon">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

  <!-- End Link Bootstrap -->

</head>

<body>
  <!-- Header -->
  <header>
    <nav class="navbar navbar-expand-sm navbar mb-4 border-bottom fixed-top bg-white shadow" style="position">
      <div class="container">
        <a class="navbar-brand" href="index.php"> <img src="images/logo2.png" alt="brand" width="50px" height="50px"> JOB WORLD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="btn btn-success" href="postJob.php">Post a Job</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="jobOpportunities.php" style="font-weight:bold;">Job Vacancies</a>
            </li>

          </ul>
        </div>

        <?php
        if (loggedin()) {

          echo "<div class='col-md-1 text-end'>
                        <form method='post'>
                        <input class='btn btn-outline-primary me-2' type='submit' name='profile' class='button' value='User Profile' />
                        </form>
                        </div>

                        <div class='col-md-1 text-end'>
                            <form method='post'>
                            <input class='btn btn-primary' type='submit' name='logout' class='button' value='Logout' />
                        </form>
                        </div>";
        } else {

          echo "<div class='col-md-1 text-end'>
                            <form method='post'>
                            <input class='btn btn-outline-primary me-2' type='submit' name='login' class='button' value='Login' />
                        </form>
                        </div>

                        <div class='col-md-1 text-end'>
                            <form method='post'>
                            <input class='btn btn-primary' type='submit' name='signup' class='button' value='Sign-up' />
                        </form>
                        </div>";
        }
        ?>
      </div>
    </nav>
  </header>

  <!-- End of Header -->
  <div class="container" style="margin-top:5%;">

    <!-- START OF ROW_1 -->
    <div class="row ">
      <div class="col-sm-12 mb-4">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="images/2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="images/1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="images/3.png" class="d-block w-100" alt="...">
            </div>
          </div>

        </div>
      </div>

      <!-- <div class="col-sm-6 mb-4">
                <p class="h2">About Us</p>
            </div> -->
      <div>

        <!-- START OF ROW_2 -->

        <div class="row">
          <div class="col-sm-12 mb-4">
            <div class="card">
              <h5 class="card-header">ABOUT US</h5>
              <div class="card-body">
                <p class="card-text" style="text-align:justify;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                <ul>
                  <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                  <li>Proin quis dui et neque ultrices luctus.</li>
                  <li>Nam ac nisl blandit, sodales odio id, porttitor justo.</li>
                  <li>Suspendisse hendrerit orci quis varius molestie.</li>
                  <li>Vivamus lacinia nisl at augue viverra convallis.</li>
                  <li>Nullam vitae turpis sit amet lorem convallis pulvinar.</li>
                </ul>
              </div>
            </div>
          </div>

        </div>

        <div class="row">
          <div class="col-sm-6">
            <div class="card">
              <h5 class="card-header">OUR SERVICES</h5>
              <div class="card-body">
                <p class="card-text" style="text-align:justify;">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</br> If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="card">
              <h5 class="card-header">OUR GOALS</h5>
              <div class="card-body">
                <p class="card-text">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. </br></br>Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Footer -->
        <footer class="text-center text-lg-start bg-light text-muted py-3 my-4">

          <!-- Section: Social media -->
          <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
              <span>Get connected with us on social networks:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
              <a href="" class="me-4 text-reset">
                <i class="fab fa-facebook-f" style='color:#0064FF'></i>
              </a>
              <a href="" class="me-4 text-reset">
                <i class="fab fa-twitter" style='color:#4672D0'></i>
              </a>
              <a href="" class="me-4 text-reset">
                <i class="fab fa-google" style='color:#3F7A00'></i>
              </a>
              <a href="" class="me-4 text-reset">
                <i class="fab fa-instagram" style='color:#FA1814'></i>
              </a>
              <a href="" class="me-4 text-reset">
                <i class="fab fa-linkedin" style='color:#0400FF'></i>
              </a>
              <a href="" class="me-4 text-reset">
                <i class="fab fa-github" style='color:#000000'></i>
              </a>
            </div>
            <!-- Right -->
          </section>
          <!-- Section: Social media -->

          <!-- Section: Links  -->
          <section class="">
            <div class="container text-center text-md-start mt-5">
              <!-- Grid row -->
              <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                  <!-- Content -->
                  <h6 class="text-uppercase fw-bold mb-4">
                    <img src="images/logo2.png" alt="brand" width="40px" height="40px"> JOB WORLD</a>
                  </h6>
                  <p style="text-align:justify;">
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                  </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                  <!-- Links -->
                  <h6 class="text-uppercase fw-bold mb-4">
                    useful links
                  </h6>
                  <p>
                    <a href="login.php" class="text-reset">Sign in</a>
                  </p>
                  <p>
                    <a href="userRegistration.php" class="text-reset">Sign Up</a>
                  </p>
                  <p>
                    <a href="jobOpportunities.php" class="text-reset">Job Vacancies</a>
                  </p>
                  <p>
                    <a href="postJob.php" class="text-reset">Post a Job</a>
                  </p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                  <!-- Links -->
                  <h6 class="text-uppercase fw-bold mb-4">
                    AIMS
                  </h6>
                  <p>
                    Provide Service
                  </p>
                  <p>
                    User Confidentiality
                  </p>
                  <p>
                    Terms and Conditions
                  </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                  <!-- Links -->
                  <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                  <p><i class="fas fa-home me-3"></i> Colombo, Sri Lanka</p>
                  <p>
                    <i class="fas fa-envelope me-3"></i>
                    jobworld782@gmail.com
                  </p>
                  <p><i class="fas fa-phone me-3"></i> +94 284 267 87</p>
                  <p><i class="fas fa-print me-3"></i> +94 533 921 59</p>
                </div>
                <!-- Grid column -->
              </div>
              <!-- Grid row -->
            </div>
          </section>
          <!-- Section: Links  -->

          <!-- Copyright -->
          <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.5); color:#fff">
            © 2022 Copyright: Created By - K.J.M. Perera (UWU/CST/19/041)
          </div>
          <!-- Copyright -->
        </footer>
        <!-- Footer -->


      </div>
</body>

</html>