<?php
session_start();

/** DATABASE SETUP **/
include("database_credentials.php"); // define variables

/** SETUP **/
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$db = new mysqli($dbhost, $dbusername, $dbpasswd, $dbname);

$request = "???";
if (isset($_GET["command"])) {
  $request = $_GET["command"];
}

if ($request == "get_name") {
  if (isset($_SESSION["name"])) { // validate the email coming in
    $name = $_SESSION["name"];
    echo json_encode($name, JSON_PRETTY_PRINT);
  } else {
    $name = "Name Not Found";
    echo json_encode($name, JSON_PRETTY_PRINT);
  }
} else {
  $msg = "Request Error";
  echo json_encode($msg, JSON_PRETTY_PRINT);
}

?>