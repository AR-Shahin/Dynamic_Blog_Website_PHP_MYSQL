<?php
include('../include/connectDB.php');
session_start();
$id = $_GET['id'];
$con = connectDB();
$sql = "SELECT * FROM posts WHERE id = $id";
$result = mysqli_query($con,$sql);
$data = mysqli_fetch_assoc($result);
$file_location = '../' . $data['image'];

if(file_exists($file_location)){
    unlink($file_location);
}
$sql = "DELETE FROM `posts` WHERE `id` = $id";
mysqli_query($con,$sql);
$_SESSION['delete_post'] = 1;
header('location:index.php');

?>