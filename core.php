<?php

//SETTING SESSIONS AFTER LOGIN TO THE WEBSITE

ob_start();

if (!isset($_SESSION)) {
  session_start();
}

$current_file = $_SERVER['SCRIPT_NAME'];

if (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
  $http_referer = $_SERVER['HTTP_REFERER'];
}
