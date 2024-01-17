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

  $query = "SELECT * FROM `users` WHERE `user_id`= $user_id";

  if ($query_run = mysqli_query($con, $query)) {

    /*  FETCHING THE DATA FROM THE DATABASE */
    while ($row = mysqli_fetch_assoc($query_run)) {
      $fname = $row['F_name'];
      $lname = $row['L_name'];
      $email = $row['Email'];
      $phone = $row['Phone_number'];
      $address = $row['Address'];
      $gender = $row['Gender'];
      $image = $row['profilepic'];
      $district = $row['District'];
    }
  } else {
    echo 'Error in the query';
  }
}

if (isset($_POST["submit"])) {
  if (
    isset($_POST['firstname']) &&
    isset($_POST['lastname']) &&
    isset($_POST['gender']) &&
    isset($_POST['email']) &&
    isset($_POST['phone']) &&
    isset($_POST['district']) &&
    isset($_POST['address'])
  ) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $district = $_POST['district'];

    if (!empty($firstname) && !empty($lastname) && !empty($gender) && !empty($email) && !empty($phone) && !empty($address) && !empty($district)) {

      //INSERTING VALUES TO THE JOBS TABLE
      $query = "UPDATE users SET F_name ='" . mysqli_real_escape_string($con, $firstname) . "',L_name ='" . mysqli_real_escape_string($con, $lastname) . "',Gender ='" . mysqli_real_escape_string($con, $gender) . "',Phone_number ='" . mysqli_real_escape_string($con, $phone) . "',Address ='" . mysqli_real_escape_string($con, $address) . "',Email ='" . mysqli_real_escape_string($con, $email) . "',District ='" . mysqli_real_escape_string($con, $district) . "' WHERE user_id=$user_id";


      if ($query_run = mysqli_query($con, $query)) {

        $message = "Successful";
        echo "<script type='text/javascript'>alert('$message');location='userProfile.php';</script>";
      } else {
        echo "Plz register again";
        echo $query;
      }
    } else {
      echo "All fields are required";
    }
  } else {
    echo "Not set";
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
    <nav class="navbar navbar-expand-sm navbar mb-4 border-bottom fixed-top bg-white shadow" style="position">
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
      <p class="h2 text-center">UPDATE YOUR PERSONAL DEATIALS </p>
      <div class="card mt-3 mb-5 shadow" style="margin: 0 auto 0; width: 70%;">
        <div class="card-body">
          <form action="updatePersonalDetails.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="row">
              <div class="col-md mt-3">
                <div class="mb-3">
                  <label for="username" class="form-label">First Name</label>
                  <input class="form-control" id="firstname" aria-describedby="firstname" type="text" name="firstname" placeholder="first name " value="<?php echo $fname; ?>" required>
                </div>
              </div>
              <div class="col-md mt-3">
                <div class="mb-3">
                  <label for="username" class="form-label">Last Name</label>
                  <input class="form-control" id="lastname" aria-describedby="username" type="text" name="lastname" placeholder="last name " value="<?php echo $lname; ?>" required>
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="example@gmail.com" value="<?php echo $email; ?>" required>
            </div>

            <div class="mb-3">
              <label for="gender" class="form-label">Gender</label><br>

              <?php if ($gender == "Male") {
                echo "<div class='form-check form-check-inline'>
                                            <input class='form-check-input' type='radio' name='gender' id='male' value='Male' checked>
                                            <label class='form-check-label' for='male'>Male</label>
                                          </div>

                                          <div class='form-check form-check-inline'>
                                            <input class='form-check-input' type='radio' id='female' name='gender' value='Female'>
                                            <label class='form-check-label' for='female'>Female</label>
                                          </div>";
              } else if ($gender == "Female") {
                echo "<div class='form-check form-check-inline'>
                                    <input class='form-check-input' type='radio' name='gender' id='male' value='Male'>
                                    <label class='form-check-label' for='male'>Male</label>
                                  </div>

                                  <div class='form-check form-check-inline'>
                                    <input class='form-check-input' type='radio' id='female' name='gender' value='Female' checked>
                                    <label class='form-check-label' for='female'>Female</label>
                                  </div>";
              } ?>

            </div>

            <div class="mb-3">
              <label for="address" class="form-label">Address</label>
              <textarea type="address" rows="2" name="address" id="address" class="form-control" value="" required><?php echo $address; ?></textarea>
            </div>

            <div class="row">
              <div class="col-md mt-3">
                <div class="mb-3">
                  <label for="district" class="form-label">Select District :</label>
                  <select class="form-select" name="district">
                    <option value="<?php echo $district ?>" selected><?php echo $district ?></option>
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
                  <input type="text" class="form-control" id="phone" placeholder="mobile number" aria-describedby="phone" type="tel" placeholder="0713456789" pattern="[0-9]{10}" name="phone" value="<?php echo $phone; ?>" required>
                </div>
              </div>
            </div>
            <input type="submit" name="submit" class="btn btn-primary btn-main mb-3 mt-3" value="Update">
            <!-- <a href="login_form.php" class="ms-3">Login</a> -->
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