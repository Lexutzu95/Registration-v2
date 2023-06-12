<?php

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "registrationdb";
$connection = "";

try {
  $connection = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
} catch (mysqli_sql_exception) {
  echo "<h2><b>Error!!! Could NOT connect!</b></h2>";
}
