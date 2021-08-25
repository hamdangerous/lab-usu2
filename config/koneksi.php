<?php
$db_username = "root";
$db_password = "";
$db_name = "lab";
$db_host = "localhost";
$con = mysqli_connect($db_host, $db_username, $db_password, $db_name);
if (!$con) {
  return false;
}
