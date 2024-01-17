<?php

require '../core.php';
require '../database_connector.php';
require '../functions.php';

//OPERATION OF THE logout BUTTON
if (array_key_exists('logout', $_POST)) {
  header("Location: ../logout.php");
}

//OPERATION OF THE USER PROFILE BUTTON
if (array_key_exists('profile', $_POST)) {
  header("Location: userProfile.php");
}

/*--- IF THE USER NOT LOG IN ---*/
if (loggedin()) {

  $username = getfield('login', 'Username', 'user_id', $con);

  $user_id = getfield('users', 'user_id', 'user_id', $con);

  $query = "SELECT * FROM `login` WHERE `user_id`= $user_id";

  if ($query_run = mysqli_query($con, $query)) {

    /*  FETCHING THE DATA FROM THE DATABASE */
    while ($row = mysqli_fetch_assoc($query_run)) {
      $db_password_old = $row['Password'];
    }
  } else {
    echo 'Error in the query';
  }
}

if (isset($_POST["submit"])) {
  if (
    isset($_POST['old_password']) &&
    isset($_POST['new_password']) &&
    isset($_POST['new_passwordagain'])
  ) {

    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $new_passwordagain = $_POST['new_passwordagain'];

    /*--- ENCRYPTING THE OLD PASSWORD ---*/
    $password_hash_old = md5($old_password);


    if (!empty($old_password) && !empty($new_password) && !empty($new_passwordagain)) {

      if ($db_password_old == $password_hash_old) {

        /*--- ENCRYPTING THE NEW PASSWORD ---*/
        $password_hash_new = md5($new_password);

        /*--- CHECKING THE MAXIMUM LENGTH ---*/
        if (strlen($new_password) > 20) {
          echo "<script type='text/javascript'>alert('Please look to maxlength of fields');location='userProfile.php';</script>";
        } else {

          if ($new_password != $new_passwordagain) {

            echo "<script type='text/javascript'>alert('Passwords do not match');location='userProfile.php';</script>";
          } else {
            //UPDATING USER PASSWORD TABLE
            $query1 = "UPDATE login SET Password='" . mysqli_real_escape_string($con, $password_hash_new) . "' WHERE user_id=$user_id";


            if ($query_run1 = mysqli_query($con, $query1)) {

              $message = "Password Successfully changed";
              echo "<script type='text/javascript'>alert('$message');location='userProfile.php';</script>";
            } else {
              echo "<script type='text/javascript'>alert('Try again');location='userProfile.php';</script>";
            }
          }
        }
      } else {
        echo "old password does not match";
      }
    } else {
      echo "All fields are required";
    }
  }
}



/*--- IF THE USER LOG IN ---*/ else if (!loggedin()) {
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

</head>

<body>
  <!-- Header -->
  <header>
    <nav class="navbar navbar-expand-sm navbar mb-4 border-bottom bg-white shadow" style="position">
      <div class="container">
        <a class="navbar-brand" href="../index.php"> <img src="../images/logo2.png" alt="brand" width="50px" height="50px"> JOB WORLD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="btn btn-success" href="../postJob.php">Post a Job</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="../jobOpportunities.php" style="font-weight:bold;">Job Vacancies</a>
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
      <p class="h2 text-center">UPDATE PASSWORD </p>
      <div class="card mt-3 mb-5 shadow" style="margin: 0 auto 0; width: 70%;">
        <div class="card-body">
          <form class="form" role="form" action="updatePassword.php" method="POST" autocomplete="off">
            <div class="form-group">
              <label for="inputPasswordOld">Current Password</label>
              <input type="password" class="form-control" name="old_password" id="inputPasswordOld" required="">
            </div></br>
            <div class="form-group">
              <label for="inputPasswordNew">New Password</label>
              <input type="password" class="form-control" name="new_password" id="inputPasswordNew" required="">
              <span class="form-text small text-muted">
                The password must be 8-20 characters, and must <em>not</em> contain spaces.
              </span>
            </div></br>
            <div class="form-group">
              <label for="inputPasswordNewVerify">Verify</label>
              <input type="password" class="form-control" name="new_passwordagain" id="inputPasswordNewVerify" required="">
              <span class="form-text small text-muted">
                To confirm, type the new password again.
              </span>
            </div></br>
            <div class="form-group">
              <button type="submit" name="submit" class="btn btn-primary btn-main btn-main-w float-right">Update Password</button>
            </div>
          </form>


        </div>
      </div>

    </div>

    <!-- <footer class="py-3 my-4">
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