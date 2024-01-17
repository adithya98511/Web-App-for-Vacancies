<?php

require 'core.php';
require 'database_connector.php';
require 'functions.php';

//OPERATION OF THE USER PROFILE BUTTON
if (array_key_exists('profile', $_POST)) {
  header("Location: userProfile.php");
}

//OPERATION OF THE logout BUTTON
if (array_key_exists('logout', $_POST)) {
  header("Location: logout.php");
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

    <p class="h1 text-center">JOB OPPORTUNITIES</p>

    <?php

    $query = "SELECT DISTINCT job_category FROM `jobs` WHERE status='active'";

    if ($query_run = mysqli_query($con, $query)) {
      while ($row = mysqli_fetch_assoc($query_run)) {
        $jobCategory = $row['job_category'];

        $jobCategory_query = "SELECT * FROM `jobs` WHERE `job_category`= '$jobCategory' AND status='active'";

        if ($query_run_jobCategory = mysqli_query($con, $jobCategory_query)) {
          $jobCategory_count = mysqli_num_rows($query_run_jobCategory);
        } else {
          $jobCategory_count = 0;
        }

        $lastupdated_query = "SELECT published_date FROM `jobs` WHERE `job_category`= '$jobCategory' Order By 'published_date' Desc LIMIT 1";

        if ($query_run_lastupdated = mysqli_query($con, $lastupdated_query)) {
          while ($row = mysqli_fetch_assoc($query_run_lastupdated)) {
            $lastupdated_date = $row['published_date'];
          }
        } else {
          $lastupdated_date = date('Y-m-d');
        }
    ?>

        <div class="col-sm-5" style="position:realtive; float:left; margin:0 3% 0 3%;">
          <div class="card mb-3 shadow" style="background-image: linear-gradient(to right,rgba(157,202,241,0.5), rgba(255,0,0,0) );">
            <div class="row g-0">
              <div class="col-md-12">
                <div class="card-body">
                  <h5 class="card-title text-center" style="font-weight:bold;"><?php echo $jobCategory; ?></h5>
                  <h6 class="card-title" style="font-style:italic;">Number of Jobs available - <?php echo $jobCategory_count; ?></h6>
                  <div class="row">
                    <div class="col-sm-8">
                      <p class="card-text bottom">Last Updated - <?php echo $lastupdated_date; ?></p>

                    </div>
                    <div class="col-sm-4">
                      <form method='post' action="selectjob.php?job_category=<?php echo $jobCategory; ?>">
                        <input class='btn btn-outline-primary me-2' type='submit' name='login' class='button' value='View Vacancies' />
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

    <?php
      }
    } else {
      echo "<script type='text/javascript'>alert('Database Error ');</script>";
    }

    ?>


  </div>

</body>

</html>