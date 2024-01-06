<?php

/* --- User login validation --- */

function loggedin()
{
  if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    return true;
  } else {
    return false;
  }
}

/* --- Fetch user data --- */

function getfield($table, $field, $where, $con)
{

  $query = "SELECT `$field` FROM `$table` WHERE `$where`='" . $_SESSION['id'] . "'";
  if ($query_run = mysqli_query($con, $query)) {
    $query_num_rows = mysqli_num_rows($query_run);

    if (!$query_num_rows == 0) {
      while ($userid = mysqli_fetch_assoc($query_run)) {
        $id = $userid[$field];
        return $id;
      }
    }
  }
}
