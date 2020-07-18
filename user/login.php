<?php
include('../admin/include/connectDB.php');
session_start();


if(isset($_POST['btn'])){
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $sql = "SELECT  * FROM `admins` WHERE username = '$username' AND password = '$pass' ";
    $con = connectDB();
    $result = mysqli_query($con,$sql);
    $data = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) >0){
        $_SESSION['success-login'] = True;
        $_SESSION['success-login-alert'] = True;
        $_SESSION['user_id'] = $data['id'];
        header("location:../admin/index.php");
    }else{
        $_SESSION['invalid_email_pass'] = 1;
        header("location:index.php");
    }
}
?>