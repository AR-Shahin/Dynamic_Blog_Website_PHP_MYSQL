<?php
include('../include/connectDB.php');

session_start();
if(isset($_POST['btn'])){
    $id = $_GET['id'];
    $cat = $_POST['newCat'];
    $con = connectDB();
    $sql = "UPDATE `categories` SET `cat_name` = '$cat' WHERE `categories`.`id` = $id";
    mysqli_query($con,$sql);
    $_SESSION['update-cat'] = 1;
    header("location:index.php");
}

?>