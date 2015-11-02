<?php
session_start();
require 'connection.php';

if ($_SESSION['id']=="") {
	header("location:Registration.html");
}

$uid = $_SESSION['id'];
$location = $_GET['location'];
$latlong = $_GET['latlong'];
$units = $_GET['units'];
$sql = "INSERT INTO `prefs`(`id`, `uid`, `latlong`, `units`, `name`) VALUES (' ', '$uid', '$latlong', '$units', '$location');";
mysql_query($sql, $connection) or (mysql_error("record not inserted"));
header("location:view.php");
?>