<?php

require '../core.php';
require '../database_connector.php';
require '../functions.php';

//OPERATION OF THE logout BUTTON
if (array_key_exists('logout', $_POST)) {
  header("Location: ../logout.php");
}

if (loggedin()) {

  if (isset($_GET['user_id'])) {

    //ASSIGNING THE JOB CATEGORY TO THE VARIABLE
    $user_id = $_GET['user_id'];
    $query_u = "SELECT * FROM login WHERE user_id='$user_id';";
    if ($query_run_u = mysqli_query($con, $query_u)) {
      while ($row = mysqli_fetch_assoc($query_run_u)) {
        $username = $row['Username'];
      }
    }
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
        <a class="navbar-brand" href="adminPanel.php"><img src="../images/logo2.png" alt="brand" width="50px" height="50px">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link btn" href="registeredUsers.php" style="color:#fff; background-color:#3E3EB0;">Registered Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="allPostedVacancies.php">Posted Job Vacancies</a>
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
  <div class="container" style="margin-top:7%;">



    <div class="card shadow" style="width: 100%;">
      <div class="card-header"><b>VACANCIES POSTED BY <?php echo strtoupper($username); ?></b></div>

      <div class="card-body">

        <div class="tableFixHead">
          <table class="table table-bordered">
            <thead class="fixed">
              <tr>
                <th>Job Position</th>
                <th>Job Category</th>
                <th>Paid Salary</th>
                <th>Working Hours</th>
                <th>Gender</th>
                <th>Published Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>


              <?php

              $query_u = "SELECT * FROM jobs WHERE user_id='$user_id';";
              if ($query_run_u = mysqli_query($con, $query_u)) {
                while ($row = mysqli_fetch_assoc($query_run_u)) {
                  $job_id_new = $row['job_id'];
                  $jobPosition = $row['job_position'];
                  $jobCategory = $row['job_category'];
                  $workingTime = $row['working_time'];
                  $workingHours = $row['working_hours'];
                  $paidSalary = $row['paid_salary'];
                  $lookingFor = $row['lookingFor'];
                  $gender = $row['gender'];
                  $jobProfile = $row['job_profile'];
                  $experienceQualifications = $row['experience_qualifications'];
                  $district = $row['district'];
                  $address = $row['address'];
                  $publishedBy = $row['published_by'];
                  $email = $row['email'];
                  $phone = $row['phone'];
                  $publishedDate = $row['published_date'];

                  echo "<tr>
                                <td>$jobPosition</td>
                                <td>$jobCategory</td>
                                <td>$paidSalary</td>
                                <td>$workingHours</td>
                                <td>$gender</td>
                                <td>$publishedDate</td>
                                <td><center>
                                    <a class='btn btn-primary' href='jobView.php?job_id=$job_id_new'> View </a>
                                    <a class='btn btn-danger' href='removeUserVacancies.php?job_id=$job_id_new&user_id=$user_id'> Remove </a>
                                    </center>
                                </td>                             
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