<?php

require 'core.php';
require 'database_connector.php';
require 'functions.php';

//OPERATION OF THE LOGIN BUTTON
if (array_key_exists('login', $_POST)) {
  header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job Opportunities</title>
  <link rel="shortcut icon" href="images/logo1.png" type="image/x-icon">

  <!-- Link Bootstrap -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="style.css" type="text/css">
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

          </ul>
        </div>

        <div class="col-md-1 text-end">
          <form method='post'>
            <input class='btn btn-outline-primary me-2' type='submit' name='login' class='button' value='Login' />
          </form>
        </div>

        <div class="col-md-1 text-end">
          <form method='post'>
            <input class='btn btn-primary' type='submit' name='signup' class='button' value='Sign-up' />
          </form>
        </div>


      </div>
    </nav>
  </header>

  <!-- End of Header -->
  <div class="container" style="margin-top:5%;">

    <!-- START OF ROW_1 -->
    <div class="row ">
      <p class="h2 text-center">REGISTRATION FORM</p>
      <div class="card mt-3 mb-5 shadow" style="margin: 0 auto 0; width: 70%;">
        <div class="card-body">
          <form action="user/userDisplay.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="row">
              <div class="col-md mt-3">
                <div class="mb-3">
                  <label for="username" class="form-label">First Name</label>
                  <input class="form-control" id="firstname" aria-describedby="firstname" type="text" name="firstname" placeholder="first name" required>
                </div>
              </div>
              <div class="col-md mt-3">
                <div class="mb-3">
                  <label for="username" class="form-label">Last Name</label>
                  <input class="form-control" id="lastname" aria-describedby="username" type="text" name="lastname" placeholder="last name " required>
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="example@gmail.com" required>
            </div>

            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="username" aria-describedby="username" required>
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="enter password" required>
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Confirm Password</label>
              <input type="password" class="form-control" id="Cpassword" name="password_again" placeholder="confirm password" required>
            </div>

            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" onclick="showhide()">
              <label class="form-check-label" for="show-pw">Show Password</label>
            </div>

            <div class="mb-3">
              <label for="gender" class="form-label">Gender</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="male" value="Male" checked>
                <label class="form-check-label" for="male">Male</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="female" name="gender" value="Female">
                <label class="form-check-label" for="female">Female</label>
              </div>
            </div>

            <div class="mb-3">
              <label for="address" class="form-label">Address</label>
              <textarea type="address" rows="2" name="address" id="address" class="form-control" value="<?php if (isset($address)) {
                                                                                                          echo $address;
                                                                                                        } ?>" required></textarea>
            </div>

            <div class="row">
              <div class="col-md mt-3">
                <div class="mb-3">
                  <label for="district" class="form-label">Select District :</label>
                  <select class="form-select" name="district">
                    <option value="Gampaha">Gampaha</option>
                    <option value="Colombo">Colombo</option>
                    <option value="Kalutara">Kalutara</option>
                    <option value="Anuradhapura">Anuradhapura</option>
                    <option value="Polonnaruwa">Polonnaruwa</option>
                    <option value="Matale">Matale</option>
                    <option value="Kandy">Kandy</option>
                    <option value="Nuwara Eliya">Nuwara Eliya</option>
                    <option value="Puttalam">Puttalam</option>
                    <option value="Kurunegala">Kurunegala</option>
                    <option value="Kegalle">Kegalle</option>
                    <option value="Ratnapura">Ratnapura</option>
                    <option value="Jaffna">Jaffna</option>
                    <option value="Kilinochchi">Kilinochchi</option>
                    <option value="Mannar">Mannar</option>
                    <option value="Mullaitivu">Mullaitivu</option>
                    <option value="Vavuniya">Vavuniya</option>
                    <option value="Trincomalee">Trincomalee</option>
                    <option value="Batticaloa">Batticaloa</option>
                    <option value="Ampara">Ampara</option>
                    <option value="Badulla">Badulla</option>
                    <option value="Monaragala">Monaragala</option>
                    <option value="Hambantota">Hambantota</option>
                    <option value="Matara">Matara</option>
                    <option value="Galle">Galle</option>
                  </select>
                </div>
              </div>
              <div class="col-md mt-3">
                <div class="mb-3">
                  <label for="phone" class="form-label">Mobile No</label>
                  <input type="text" class="form-control" id="phone" placeholder="mobile number" aria-describedby="phone" type="tel" placeholder="0713456789" pattern="[0-9]{10}" name="phone" required>
                </div>
              </div>
            </div>


            <div class="mb-3">
              <label for="propic" class="form-label">Profile Picture</label>
              <input type="file" id="propic" name="propic" class="form-control" required>
            </div>

            <input type="submit" class="btn btn-primary btn-main mb-3 mt-3" value="Submit">
            <input type="reset" class="btn btn-secondary mb-3 mt-3 ms-3" style="border-radius:30px" value="Reset">
          </form>

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

  <script>
    function showhide() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
      var y = document.getElementById("Cpassword");
      if (y.type === "password") {
        y.type = "text";
      } else {
        y.type = "password";
      }
    }

    function showhidep() {
      var x = document.getElementById("hpassword");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
      var y = document.getElementById("hCpassword");
      if (y.type === "password") {
        y.type = "text";
      } else {
        y.type = "password";
      }
    }
  </script>

</body>

</html>