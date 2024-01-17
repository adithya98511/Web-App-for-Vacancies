<?php

require '../core.php';
require '../database_connector.php';
require '../functions.php';

//OPERATION OF THE logout BUTTON
if (array_key_exists('logout', $_POST)) {
  header("Location: ../logout.php");
}

if (loggedin()) {

  //COUNT OF  TOTAL USERS IN THE SYSTEM
  $users_total_query = "SELECT * FROM `users`";

  if ($query_run_total = mysqli_query($con, $users_total_query)) {
    $users_total_count = mysqli_num_rows($query_run_total);
  } else {
    $users_total_count = 0;
  }

  //COUNT OF  TOTAL JOBS IN THE SYSTEM
  $jobs_total_query = "SELECT * FROM `jobs`";

  if ($query_run_total = mysqli_query($con, $jobs_total_query)) {
    $jobs_total_count = mysqli_num_rows($query_run_total);
  } else {
    $jobs_total_count = 0;
  }

  //COUNT OF  TOTAL ACTIVE VACANCIES IN THE SYSTEM
  $jobs_total_query = "SELECT * FROM `jobs` WHERE status='active'";

  if ($query_run_total = mysqli_query($con, $jobs_total_query)) {
    $jobs_total_active = mysqli_num_rows($query_run_total);
  } else {
    $jobs_total_active = 0;
  }

  //COUNT OF  TOTAL DEACTIVE VACANCIES IN THE SYSTEM
  $jobs_total_query = "SELECT * FROM `jobs` WHERE status='deactive'";

  if ($query_run_total = mysqli_query($con, $jobs_total_query)) {
    $jobs_total_deactive = mysqli_num_rows($query_run_total);
  } else {
    $jobs_total_deactive = 0;
  }
} else {
  // header("Location: ../index.php");
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
  <link rel="stylesheet" href="adminStyle.css" type="text/css">

  <!-- End Link Bootstrap -->

</head>

<body>
  <!-- Header -->
  <header>
    <nav class="navbar navbar-expand-sm navbar mb-4 border-bottom bg-white fixed-top shadow" style="position">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="../images/logo2.png" alt="brand" width="50px" height="50px">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link btn" href="registeredUsers.php">Registered Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn" href="allPostedVacancies.php">Posted Job Vacancies</a>
            </li>
          </ul>
        </div>

        <div class='col-md-1 text-end'>
          <form method='post'>
            <input class='btn btn-primary' type='submit' name='logout' class='button' value='Logout' />
          </form>
        </div>

      </div>
    </nav>
  </header>

  <!-- End of Header -->
  <div class="container" style="margin-top:5%;">

    <div class="row" style="margin:0 auto 2%; width:80%;">

      <div class="card text-white bg-success mb-3 shadow text-center" style="max-width: 20%;">
        <a href="registeredUsers.php" style="text-decoration: none; color:#fff">
          <div class="card-header">No of registered Users</div>
          <div class="card-body">
            <h1 class="card-title"><?php echo $users_total_count; ?></h1>
          </div>
        </a>
      </div>

      <div class="card text-white bg-dark mb-3 text-center" style="max-width: 20%; margin: 0 0 0 2%">
        <div class="card-header">No of Published Vacancies</div>
        <div class="card-body">
          <h1 class="card-title"><?php echo $jobs_total_count; ?></h1>
        </div>
      </div>
      <div class="card border-warning mb-3 text-center" style="max-width: 20%; margin: 0 0 0 2%">
        <div class="card-header">No of Active Vacancies</div>
        <div class="card-body">
          <h1 class="card-title"><?php echo $jobs_total_active; ?></h1>
        </div>
      </div>
      <div class="card card border-warning mb-3 text-center" style="max-width: 20%; margin: 0 0 0 2%">
        <div class="card-header">No of Deactive Vacancies</div>
        <div class="card-body">
          <h1 class="card-title"><?php echo $jobs_total_deactive; ?></h1>
        </div>
      </div>

    </div>

    <div class="card shadow" style="width: 100%;">

      <div class="card-body">
        <h5 class="card-title">Newly Posted Vacancies For Activation</h5>
        <div class="tableFixHead">
          <table class="table table-bordered">
            <thead class="fixed">
              <tr>
                <th>Job Position</th>
                <th>Job Category</th>
                <th>District</th>
                <th>Published Date</th>
                <th>Action</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>


              <?php

              $query_p = "SELECT * FROM jobs WHERE status ='deactive' ORDER BY published_date DESC;";
              if ($query_run_p = mysqli_query($con, $query_p)) {
                while ($row = mysqli_fetch_assoc($query_run_p)) {
                  $jobPosition = $row['job_position'];
                  $jobCategory = $row['job_category'];
                  $paidSalary = $row['paid_salary'];
                  $district = $row['district'];
                  $publishedDate = $row['published_date'];
                  $workingTime = $row['working_time'];
                  $workingHours = $row['working_hours'];
                  $status = $row['status'];
                  $job_id = $row['job_id'];


                  echo "<tr>
                                    <td>$jobPosition</td>
                                    <td>$jobCategory</td>
                                    <td>$district</td>
                                    <td>$publishedDate</td>
                                    <td>
                                        <a class='btn btn-primary' href='jobView.php?job_id=$job_id'> View </a>
                                        <a class='btn btn-danger' href='activation.php?job_id=$job_id'> Activate </a>
                                    </td>
                                    <td>$status</td>                                   
                                    </tr>";
                }
              } else {
                // echo "<script type='text/javascript'>alert('Database Error ');</script>";
                echo $query_p;
              }

              ?>



            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>

  </div>
</body>

</html>