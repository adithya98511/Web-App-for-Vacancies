<?php

require '../core.php';
require '../database_connector.php';
require '../functions.php';

if (isset($_GET['user_id'])) {

  //ASSIGNING THE JOB CATEGORY TO THE VARIABLE
  $user_id = $_GET['user_id'];

  $query1 = "DELETE FROM users WHERE user_id='$user_id'";
  $query_run1 = mysqli_query($con, $query1);

  $query2 = "DELETE FROM login WHERE user_id='$user_id'";
  $query_run2 = mysqli_query($con, $query2);

  $query3 = "DELETE FROM jobs WHERE user_id='$user_id'";
  $query_run3 = mysqli_query($con, $query3);

  header("Location: registeredUsers.php");
} else {
  header("Location: registeredUsers.php");
}
