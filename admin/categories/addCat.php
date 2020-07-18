<?php
include('../include/connectDB.php');
session_start();
function dataFilter($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function doubleData_check($data){
    $con = connectDB();
    $sql = "SELECT * FROM `categories` WHERE cat_name = '$data'";
    $result = mysqli_query($con, $sql);
   $count = mysqli_num_rows($result);
   if($count>0){
        return TRUE;
   }else{
       return FALSE;
   }
}
if(isset($_POST['btn'])){

 $cat = dataFilter($_POST['newCat']);

 if(doubleData_check($cat) == TRUE ){
     $_SESSION['double-category'] = 1;
     header('Location:addnewCat_UI.php');
 }else{
    $con = connectDB();
    $sql = "INSERT INTO `categories` (`id`, `cat_name`) VALUES (NULL, '$cat') ";
    mysqli_query($con, $sql);
    $_SESSION['category-insert'] = 1;
    header('Location:addnewCat_UI.php');
 }
} //isset

?>