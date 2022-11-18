<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "strong_db";

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


$_SESSION['conn'] = $conn;

define("ROOT", "http://localhost/Strong-towerv2/");
