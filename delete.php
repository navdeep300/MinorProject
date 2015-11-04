<?php
session_start();
require 'connection.php';

if ($_SESSION['id']=="") {
	header("location:Registration.html");
}

$id = $_GET['id'];
$sql = "DELETE FROM prefs WHERE id='$id'";
mysql_query($sql, $connection) or (mysql_error("record not deleted"));
header("location:view.php");
?>