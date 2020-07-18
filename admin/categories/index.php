<?php
include('../include/connectDB.php');
include('../include/header.php');
session_start();

if(!isset($_SESSION['success-login'])){
    header("location:../404.php");
    die();
}
?> 
<?php
$con = connectDB();
$sql = "SELECT * FROM `categories`";
$result = mysqli_query($con,$sql);
?>
<h2>Category Page</h2>
<div class="main-content-part">
<a href="addnewCat_UI.php" class="btn btn-success">+ ADD NEW CATEGORY</a>
<div class="alert-text clearfix" style="float:right;display:inline-block">
<?php if(isset($_SESSION['update-cat'])){?>
<div class="alert alert-success alert-dismissible fade show" role="alert" style="display:inline-block">
  <strong>Update Successfully! </strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php }?>
<?php if(isset($_SESSION['delete_cat'])){?>
<div class="alert alert-success alert-dismissible fade show" role="alert" style="display:inline-block">
  <strong>Delete Successfully! </strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php }?>
</div>
<hr>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Category</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php
    while($row = mysqli_fetch_assoc($result)){?>
    <tr>
      <td><?php echo $row['cat_name'];?></td>
      <td>
      <a href="update_UI.php?id=<?php echo $row['id'];?>" class="btn btn-warning">EDIT</a>
      <a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure ?')">DELETE</a>
      </td>
    </tr>
    <?php }?>
  </tbody>
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
unset($_SESSION['update-cat']);
unset($_SESSION['delete_cat']);
?>