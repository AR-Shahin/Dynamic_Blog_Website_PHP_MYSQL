<?php
include('../include/header.php');
include('../include/connectDB.php');
$id = $_GET['id'];
$con = connectDB();
//$sql = "SELECT * FROM posts WHERE id = $id";
$sql = "SELECT posts.*, categories.cat_name as categoryTitle
            FROM posts
            JOIN categories ON posts.cat_id = categories.id
            WHERE posts.id = '$id' ";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($result);
session_start();
if(!isset($_SESSION['success-login'])){
    header("location:../404.php");
    die();
}
?> 
<h2>View Post </h2>
<div class="main-content-part">
<a href="index.php" class="btn btn-success">BACK</a>
<hr>
<table class="table borderd">
<tr>
<td>Title</td>
<td><?php echo $data['title']; ?></td>
</tr>
<tr>
<td>Category</td>
<td><?php echo $data['categoryTitle']; ?></td>
</tr>
<tr>
<td>Image</td>

<td><img src="../<?= $data['image']; ?>" width='200'> </td>
</tr>
<tr>
<td>Description</td>
<td><?php echo $data['description']; ?></td>
</tr>
</table>
</div>
<style>
.main-content-part{
    border:1px solid #c0392b;
    box-shadow : 2px 2px 5px #c0392b;
    padding:15px;
}
</style>
<?php
include('../include/footer.php');
unset($_SESSION['double-title']);
unset($_SESSION['post-insert']);
?>