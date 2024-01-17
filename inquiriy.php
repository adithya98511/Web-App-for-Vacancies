<?php

require 'core.php';
require 'database_connector.php';
require 'functions.php';

//OPERATION OF THE USER PROFILE BUTTON
if (array_key_exists('profile', $_POST)) {
  header("Location: user/userProfile.php");
}

//OPERATION OF THE logout BUTTON
if (array_key_exists('logout', $_POST)) {
  header("Location: logout.php");
}

if (isset($_GET['job_id'])) {

  //ASSIGNING THE JOB CATEGORY TO THE VARIABLE
  $job_id = $_GET['job_id'];

  $query = "SELECT * FROM `jobs` WHERE `job_id`= $job_id";

  if ($query_run = mysqli_query($con, $query)) {
    while ($row = mysqli_fetch_assoc($query_run)) {
      $job_id_new = $row['job_id'];
      $jobPosition = $row['job_position'];
      $email = $row['email'];
    }

    if (isset($_POST['submit'])) {
      if (
        isset($_POST['email']) &&
        isset($_POST['subject']) &&
        isset($_POST['description'])
      ) {

        $userEmail = $_POST['email'];
        $subjectSub = $_POST['subject'];
        $description = $_POST['description'];


        if (!empty($email) && !empty($subjectSub) && !empty($description)) {
          $message = "$subjectSub \n$description  \n\nSent by $userEmail";
          $subject = "Inquiring regarding the job position - $jobPosition";
          $sender = "From: jeevakeperera@gmail.com";


          if (mail($email, $subject, $message, $sender)) {
            // echo "<script type='text/javascript'>alert('success');</script>";
          } else {
            echo "<script type='text/javascript'>alert('Unsuccess');</script>";
          }
        } else {
          echo "empty";
        }
      } else {
        echo "Not Set";
      }
    } else {
      echo "Not Submited";
    }
  } else {
    echo "<script type='text/javascript'>alert('Database Error ');</script>";
  }
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
      <h5 class="card-header text-center">Confirmation</h5>
      <div class="card-body">
        <p class="card-text">Your inquiriy regarding the job position <b><?php echo $jobPosition; ?></b> has been sent. We will get back to you as soon as possible.</p>
        <p class="card-text">Thank you.</p>
        <p class="card-text"><a href="individualJob.php?job_id=<?php echo $job_id_new; ?>" class="link-primary">Go back to Job vacancy</a></p>


      </div>
    </div>

    <!-- <footer class="py-3 my-4" style="position:relative; ">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
        </ul>
        <p class="text-center text-muted">© 2022 Finance planner. All Rights Reserved.</p>
    </footer> -->


  </div>
</body>

</html>