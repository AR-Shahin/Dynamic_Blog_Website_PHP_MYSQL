<?php
include('../include/header.php');
include('../include/connectDB.php');
$con = connectDB();
$sql = "SELECT * FROM categories";
$result = mysqli_query($con,$sql);
session_start();
if(!isset($_SESSION['success-login'])){
    header("location:../404.php");
    die();
}
?> 
<h2>Add New Post</h2>
<div class="main-content-part">
<a href="index.php" class="btn btn-success">BACK</a>
<div class="alert-text clearfix" style="float:right;display:inline-block">
<?php if(isset($_SESSION['double-title'])){?>
<div class="alert alert-warning alert-dismissible fade show" role="alert" style="display:inline-block">
  <strong>Title Exists :) </strong>Please try again!!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php }?>
<?php if(isset($_SESSION['post-insert'])){?>
<div class="alert alert-success alert-dismissible fade show" role="alert" style="display:inline-block">
  <strong>Post Added Successfully!!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php }?>
</div>
<hr>
<form action="storePost.php" method ="post" class="mt-3" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" placeholder="Add new title " required name ="title">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Category</label>
    <select name="cat_id" class="form-control">
    <option selected>Select Category</option>
    <?php while($row = mysqli_fetch_assoc($result)){ ?>
      <option value = "<?= $row['id'];?>"><?= $row['cat_name'];?></option>
      <?php }?>
    </select>
  
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <textarea name="description" cols="30" rows="5" class="form-control" placeholder ="Write description . . ."></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Image</label>
    <input type="file" class="form-control" name ="image">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Date</label>
    <input type="date" class="form-control" name ="date">
  </div>
  <button type="submit" class="btn btn-primary" name="btn">Post</button>
</form>
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