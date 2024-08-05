<?php
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "food_time";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_errno());
}
