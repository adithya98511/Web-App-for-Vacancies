<?php

require 'core.php';
require 'database_connector.php';
require 'functions.php';

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

  <!-- End Link Bootstrap -->
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
  <!-- Header -->
  <header>
    <nav class="navbar navbar-expand-sm navbar mb-4 border-bottom bg-white shadow" style="position">
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

    <div class="card shadow" style="margin: 0 auto 5%; width:50%">
      <h5 class="card-header text-center text-white bg-danger">Error Message</h5>
      <div class="card-body">
        <p class="card-text">Please <a href="login.php" class="link-primary">Sign in</a> to post a Job</p>
        <p class="card-text">Thank you.</p>
        <p class="card-text">Go to <a href="login.php" class="link-primary">Log in</a> or <a href="userRegistration.php" class="link-primary">Register</a></p>


      </div>
    </div>




  </div>
</body>

</html>