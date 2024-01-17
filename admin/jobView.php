<?php

require '../core.php';
require '../database_connector.php';
require '../functions.php';

//OPERATION OF THE USER PROFILE BUTTON
if (array_key_exists('profile', $_POST)) {
  header("Location: user/userProfile.php");
}

//OPERATION OF THE logout BUTTON
if (array_key_exists('logout', $_POST)) {
  header("Location: ../logout.php");
}

if (isset($_GET['job_id'])) {

  //ASSIGNING THE JOB CATEGORY TO THE VARIABLE
  $job_id = $_GET['job_id'];

  $query = "SELECT * FROM `jobs` WHERE `job_id`= $job_id";

  if ($query_run = mysqli_query($con, $query)) {
    while ($row = mysqli_fetch_assoc($query_run)) {
      $jobPosition = $row['job_position'];
      $jobCategory = $row['job_category'];
      $workingTime = $row['working_time'];
      $workingHours = $row['working_hours'];
      $paidSalary = $row['paid_salary'];
      $lookingFor = $row['lookingFor'];
      $jobProfile = $row['job_profile'];
      $experienceQualifications = $row['experience_qualifications'];
      $district = $row['district'];
      $address = $row['address'];
      $publishedBy = $row['published_by'];
      $email = $row['email'];
      $phone = $row['phone'];
      $publishedDate = $row['published_date'];
      $status = $row['status'];
      $gender = $row['gender'];
    }
  } else {
    echo "<script type='text/javascript'>alert('Database Error ');</script>";
  }
} else {
  header("Location: index.php");
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job Opportunities</title>
  <link rel="shortcut icon" href="../images/logo1.png" type="image/x-icon">

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
    <nav class="navbar navbar-expand-sm navbar mb-4 border-bottom bg-white fixed-top shadow" style="position">
      <div class="container">
        <a class="navbar-brand" href="adminPanel.php"><img src="../images/logo2.png" alt="brand" width="50px" height="50px">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link btn" href="registeredUsers.php">Registered Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn" href="allPostedVacancies.php">Posted Job Vacancies</a>
          </li>
        </ul>

        <div class='col-md-1 text-end'>
          <form method='post'>
            <input class='btn btn-primary' type='submit' name='logout' class='button' value='Logout' />
          </form>
        </div>

      </div>
    </nav>
  </header>

  <div class="row">
    <div class="col-sm-8">
      <h5 class="card-text d-flex justify-content-sm-end"> <?php echo $jobPosition; ?></h5>
    </div>
    <div class="col-sm-4">
      <p class="card-text d-flex justify-content-sm-end" style="color:#FF0000; font-weight:bold;"> <?php echo $status; ?></p>
    </div>
  </div>
  <!-- End of Header -->
  <div class="container" style="margin-top:5%;">

    <div class="card shadow" style="margin: 0 auto 5%; width:80%">
      <h5 class="card-header text-center">
        <div class="row">
          <div class="col-sm-8">
            <h5 class="card-text d-flex justify-content-sm-end"> <?php echo $jobPosition; ?></h5>
          </div>
          <div class="col-sm-4">
            <p class="card-text d-flex justify-content-sm-end" style="color:#FF0000; font-weight:bold;"> <?php echo $status; ?></p>
          </div>
        </div>
      </h5>
      <div class="card-body p-4">

        <div class="row">
          <div class="col-sm-9">
            <h5 class="card-title">Who we are looking for?</h5>
            <p class="card-text"><?php echo $lookingFor; ?></p>
          </div>
          <div class="col-sm-3">
            <div class="card border border-info text-center shadow" style="width: 90%; margin: 0 auto 0; background-color:#931212;">
              <div class="card-body">
                <h4 class="card-title" style="color:#fff; font-weight:bold; font-style:italic; font-size:15pt;">Salary Rs.<?php echo $paidSalary; ?>/=</h4>
                <p class="card-text"></p>
              </div>
            </div>
          </div>
        </div>

        <h5 class="card-title">Job Profile</h5>
        <p class="card-text"><?php echo $jobProfile; ?></p>
        <h5 class="card-title">Experience and Qualifications</h5>
        <p class="card-text"><?php echo nl2br($experienceQualifications); ?></p>

        <div class="card border border-success shadow-sm" style="width:90%; margin: 0 auto 2%;">
          <div class="card-body">
            <div class="row" style="margin: 0 auto 0;">
              <div class="col-sm-6 text-center">
                <div class="row">
                  <div class="col-sm-6 text-center">
                    <h6 class="card-title">Working Time</h6>
                    <p class="card-subtitle mb-2 text-muted"><?php echo $workingTime; ?></p>
                  </div>
                  <div class="col-sm-6 text-center">
                    <h6 class="card-title">Working Hours</h6>
                    <p class="card-subtitle mb-2 text-muted"><?php echo $workingHours; ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 text-center">
                    <h6 class="card-title">Gender</h6>
                    <p class="card-subtitle mb-2 text-muted"><?php echo $gender; ?></p>
                  </div>
                </div>
              </div>

              <div class="col-sm-6 text-center shadow" style="color:#FF0000; font-weight:bold; font-style:italic; font-size:18pt; margin: auto;">
                <p>Apply Now - Send your CV to <?php echo $email; ?></p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <h5 class="card-title text-center" style="color:#06541B; font-weight:bold; margin: 0 auto 2%;">Contact Us</h5>
          <div class="col-sm-4 text-center">
            <h6 class="card-title">Email</h6>
            <p class="card-subtitle mb-2 text-muted"><?php echo $email; ?></p>
          </div>
          <div class="col-sm-4 text-center">
            <h6 class="card-title">Phone</h6>
            <p class="card-subtitle mb-2 text-muted"><?php echo $phone; ?></p>
          </div>
          <div class="col-sm-4 text-center">
            <h6 class="card-title">Address</h6>
            <p class="card-subtitle mb-2 text-muted"><?php echo $address; ?></p>
          </div>
        </div>

        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->

        <div class="card border border-info shadow-sm" style="width:80%; margin: 2% auto 2%;">
          <h5 class="card-title" style="color:#06541B; font-weight:bold; margin: 2% auto 2%;">Send us your inquiries regarding this vacancy</h5>
          <form action="inquiriy.php?job_id='<?php echo $job_id_new; ?>'" method="POST" style="width:80%; margin:2% auto 2%;">

            <div class="mb-3">
              <label for="subject" class="form-label">Subject</label>
              <input type="subject" class="form-control" name="subject" id="subject" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea type="description" rows="2" name="description" id="description" class="form-control" value="" required></textarea>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Your Email</label>
              <input type="email" class="form-control" name="email" id="email" aria-describedby="email">
              <div id="email" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit your Inquiry</button>
          </form>
        </div>

      </div>
      <div class="card-footer text-muted">
        <div class="row">
          <div class="col-sm-6">
            <p class="card-text"> Published by <?php echo $publishedBy; ?></p>
          </div>
          <div class="col-sm-6">
            <p class="card-text d-flex justify-content-sm-end"> Published on <?php echo $publishedDate; ?></p>
          </div>
        </div>
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