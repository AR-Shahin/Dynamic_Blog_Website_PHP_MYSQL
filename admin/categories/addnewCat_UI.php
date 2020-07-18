<?php
include('../include/header.php');
session_start();
if(!isset($_SESSION['success-login'])){
    header("location:../404.php");
    die();
}
?> 
<h2>Add New Category</h2>
<div class="main-content-part">
<a href="index.php" class="btn btn-success">BACK</a>
<div class="alert-text clearfix" style="float:right;display:inline-block">
<?php if(isset($_SESSION['double-category'])){?>
<div class="alert alert-warning alert-dismissible fade show" role="alert" style="display:inline-block">
  <strong>Category Exists :) </strong>Please try again!!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php }?>
<?php if(isset($_SESSION['category-insert'])){?>
<div class="alert alert-success alert-dismissible fade show" role="alert" style="display:inline-block">
  <strong>Category Inserted Successfully!!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php }?>
</div>
<hr>
<form action="addCat.php" method ="post" class="mt-3">
  <div class="form-group">
    <label for="exampleInputEmail1">Add a category: </label>
    <input type="text" class="form-control" placeholder="Add new category " required name ="newCat">
  </div>
  <button type="submit" class="btn btn-primary" name="btn">Submit</button>
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
unset($_SESSION['double-category']);
unset($_SESSION['category-insert']);
?>