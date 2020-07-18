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
$sql = " SELECT count(id) as total FROM posts ";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($result);

$skip = 0;
$take = 4;
$page = 1;
if (isset($_GET['page'])) {
	$page = $_GET['page'];
	$skip = ( $page - 1 ) * $take;
}
$totalPost = $data['total'] ;
if($totalPost%4!=0)
{
    $totalPost++;
}

$totalPage = $totalPost / $take;
$sql = "SELECT * FROM `posts` ORDER BY id DESC
LIMIT $skip ,$take";
$result = mysqli_query($con,$sql);
if($totalPage+1 < $page)
{
    header("location:index.php");
}
?>
<h2>Post Page</h2>
<div class="main-content-part">
<a href="addNewpost.php" class="btn btn-success">+ ADD NEW POST</a>
<div class="alert-text clearfix" style="float:right;display:inline-block">
<?php if(isset($_SESSION['update-cat'])){?>
<div class="alert alert-success alert-dismissible fade show" role="alert" style="display:inline-block">
  <strong>Update Successfully! </strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php }?>
<?php if(isset($_SESSION['delete_post'])){?>
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
      <th scope="col">Title</th>
      <th scope="col">Image</th>
      <th scope="col">Date</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php
    while($row = mysqli_fetch_assoc($result)){?>
    <tr>
    
      <td><?php echo $row['title'];?></td>
      <td>
      <img src="../<?= $row['image']; ?>" width='100'> 
      </td>
      <td><?php echo $row['date'];?>
      </td>
      <td>
      <a href="viewPost.php?id=<?php echo $row['id'];?>" class="btn btn-info">VIEW</a>
      <a href="updatePost.php?id=<?php echo $row['id'];?>" class="btn btn-warning">EDIT</a>
      <a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger btn-small" onclick="return confirm('Are you sure ?')">DELETE</a>
      </td>

    </tr>
    
    
    <?php }   
      
      
      ?>
  </tbody>
</table>
  <div class="pagination-section my-2">
                 <div class="row">
                     <div class="col-6">
                        <?php if ($page>1){ ?>
                         <a href="index.php?page=<?=$page - 1;?>" class="btn btn-info">&larr; Prev</a>
                         <?php }?>
                     </div>
                     <div class="col-6 text-right">
                        
                        <?php if($totalPage > $page) { ?>
                         <a href="index.php?page=<?=$page + 1;?>"class="btn btn-info">Next &rarr;</a>
                         <?php } ?>
                     </div>
                 </div>
             </div>
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
unset($_SESSION['delete_post']);
?>