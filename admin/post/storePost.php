<?php
include('../include/connectDB.php');
session_start();
$rand = rand(11,6666666);
function dataFilter($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function doubleData_check($data){
    $con = connectDB();
    $sql = "SELECT * FROM `posts` WHERE title = '$data'";
    $result = mysqli_query($con, $sql);
   $count = mysqli_num_rows($result);
   if($count>0){
        return TRUE;
   }else{
       return FALSE;
   }
}
if(isset($_POST['btn'])){

 $title = dataFilter($_POST['title']);
 $descrip = dataFilter($_POST['description']);
 $date = $_POST['date'];
 $cat_id = $_POST['cat_id'];
 $image =  'uploads/' . $rand .$_FILES['image']['name'];
$upload =  '../uploads/' . $rand . $_FILES['image']['name'];
 
 move_uploaded_file($_FILES['image']['tmp_name'], $upload);


 if(doubleData_check($title) == TRUE ){
     $_SESSION['double-title'] = 1;
     header('Location:addNewpost.php');
 }else{
    $con = connectDB();
    $sql = "INSERT INTO `posts` VALUES(NULL,$cat_id, '$title',' $descrip','$image','$date') ";
    mysqli_query($con,$sql);
    $_SESSION['post-insert'] = 1;
    header('Location:addNewpost.php');
 }
} //isset

?>