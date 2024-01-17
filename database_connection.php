<?php

$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$con = @mysqli_connect($mysql_host, $mysql_user, $mysql_pass, 'job_opportunities');


// if (!$con)
// {
//    die('Connection error');
// }else{
//     echo 'Connection successful';
// }
