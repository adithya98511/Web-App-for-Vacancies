<?php

require '../core.php';
require '../database_connector.php';
require '../functions.php';

if (isset($_GET['job_id'])) {

  //ASSIGNING THE JOB CATEGORY TO THE VARIABLE
  $job_id = $_GET['job_id'];

  $query3 = "DELETE FROM jobs WHERE job_id='$job_id'";

  $query_run = mysqli_query($con, $query3);
  header("Location: userProfile.php");
} else {
  header("Location: userProfile.php");
}
