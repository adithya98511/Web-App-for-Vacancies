<?php

require '../core.php';
require '../database_connector.php';
require '../functions.php';


if (loggedin()) {

  if (isset($_GET['job_id'])) {

    //ASSIGNING THE JOB CATEGORY TO THE VARIABLE
    $job_id = $_GET['job_id'];

    $query3 = "UPDATE jobs SET status = 'active' WHERE job_id='$job_id'";

    $query_run = mysqli_query($con, $query3);
    header("Location: adminPanel.php");
  } else {
    header("Location: index.php");
  }
} else {
  // header("Location: ../index.php");
}
