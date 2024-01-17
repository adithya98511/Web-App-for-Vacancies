<?php

require '../core.php';
require '../database_connector.php';
require '../functions.php';

//OPERATION OF THE logout BUTTON
if (array_key_exists('logout', $_POST)) {
  header("Location: ../logout.php");
}

if (loggedin()) {
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
              <a class="nav-link btn" href="#" style="color:#fff; background-color:#3E3EB0;">Registered Users</a>
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
      <div class="card-header"><b>REGISTERED USERS</b></div>

      <div class="card-body">

        <div class="tableFixHead">
          <table class="table table-bordered">
            <thead class="fixed">
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Vacancies posted</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>


              <?php

              $query_u = "SELECT * FROM users;";
              if ($query_run_u = mysqli_query($con, $query_u)) {
                while ($row = mysqli_fetch_assoc($query_run_u)) {
                  $user_id = $row['user_id'];
                  $fname = $row['F_name'];
                  $lname = $row['L_name'];
                  $email = $row['Email'];
                  $phone = $row['Phone_number'];
                  $address = $row['Address'];
                  $gender = $row['Gender'];
                  $district = $row['District'];


                  $query_count_v = "SELECT * FROM jobs WHERE user_id='$user_id'";

                  if ($query_run_total = mysqli_query($con, $query_count_v)) {
                    $jobs_total_count = mysqli_num_rows($query_run_total);
                  } else {
                    $jobs_total_count = 0;
                  }

                  echo "<tr>
                                    <td>$fname $lname</td>
                                    <td>$email</td>
                                    <td>$phone</td>
                                    <td>$address</td>
                                    <td><a class='btn btn-link' href='userPostedVacancies.php?user_id=$user_id'>$jobs_total_count</a></td>
                                    <td><a class='btn btn-danger' href='removeUsers.php?user_id=$user_id'> Remove </a></td>                                   
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