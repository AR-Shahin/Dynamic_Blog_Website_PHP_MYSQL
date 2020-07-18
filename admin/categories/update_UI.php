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
    $id = $_GET['id'];
    $sql ="SELECT * FROM categories WHERE id = $id";
    $result = mysqli_query($con,$sql);
    $data = mysqli_fetch_assoc($result);
?>
<h2>Edit Category</h2>
<div class="main-content-part">
<a href="index.php" class="btn btn-success">Back</a>
<hr>
<form action="update.php?id=<?php echo $id;?>" method ="post" class="mt-3">
  <div class="form-group">
    <label for="exampleInputEmail1">Add a category: </label>
    <input type="text" class="form-control" required placeholder="Add new category " name ="newCat" value="<?php echo $data['cat_name'];?>">
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
?>