<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "registration";

$koneksi = mysqli_connect($host, $user, $pass, $dbname);
if (!$koneksi) {
  die("Connection Failed:" . mysqli_connect_error());
}
