<?php

require '../core.php';
require '../database_connector.php';
require '../functions.php';

if (isset($_GET['job_id']) && isset($_GET['user_id'])) {

  //ASSIGNING THE JOB CATEGORY TO THE VARIABLE
  $job_id = $_GET['job_id'];
  $user_id = $_GET['user_id'];

  $query1 = "DELETE FROM jobs WHERE user_id='$user_id' AND job_id='$job_id'";
  $query_run1 = mysqli_query($con, $query1);

  header("Location: userPostedVacancies.php?user_id=$user_id");
} else {
  header("Location: adminPanel.php");
}
