<?php
include('../include/connectDB.php');
session_start();
$id = $_GET['id'];
$con = connectDB();
$sql = "DELETE FROM `categories` WHERE `id` = $id";
mysqli_query($con,$sql);
$_SESSION['delete_cat'] = 1;
header('location:index.php');

?>