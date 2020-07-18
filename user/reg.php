<?php
include('../admin/include/connectDB.php');
session_start();
$rand = rand(11,6666666);
function dataFilter($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function userName_Validation($userName)
{
    $con = connectDB();
    $sql = "SELECT  * FROM `admins` WHERE username = '$userName'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0)
    {
        return True;
    }
    else
    {
        return False;
    }
}
function emailValidation($email)
{
    $con = connectDB();
    $sql = "SELECT  * FROM `admins` WHERE email = '$email'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0)
    {
        return True;
    }
    else
    {
        return False;
    }
}
function passValidation($pass, $conPass)
{
    if ($pass === $conPass)
    {
        return True;
    }
    else
    {
        return False;
    }
}

if (isset($_POST['btn']))
{
    $name = dataFilter($_POST['name']);
    $userName = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $conPass = $_POST['conPass'];
     $image =  $_FILES['image']['name'];

    if (passValidation($pass, $conPass) == True)
    {
        if (emailValidation($email) == True)
        {
            $_SESSION['doubleEmail'] = 1;
            header("Location:reg_UI.php");
        }
       else if (userName_Validation($userName) == True)
        {
            $_SESSION['doubleName'] = 1;
            header("Location:reg_UI.php");
        }
        else
        {
            $image = $rand . $image;
            $con = connectDB();
            $sql = "INSERT INTO `admins` (`id`, `name`,`username`, `email`, `password`,`image`) VALUES (NULL, ' $name','$userName', '$email', '$pass','$image')";
            if (mysqli_query($con, $sql))
            {
                $_SESSION['insert_sucess'] = 1;
                $upload =  'img/'. $rand . $_FILES['image']['name'];

                 move_uploaded_file($_FILES['image']['tmp_name'], $upload);
                header("Location:reg_UI.php");
            }
        } //passvalid
        
    }

    else
    {
        $_SESSION['invalid_pass'] = 1;
        header("Location:reg_UI.php");
    }
} //isset



?>
