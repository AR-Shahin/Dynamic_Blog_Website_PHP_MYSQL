<?php
session_start();

include('admin/include/connectDB.php');

$con = connectDB();
$sql = " SELECT count(id) as total FROM posts ";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($result);

$skip = 0;
$take = 2;
$page = 1;
if (isset($_GET['page'])) {
	$page = $_GET['page'];
	$skip = ( $page - 1 ) * $take;
}
$totalPost = $data['total'] ;
if($totalPost%2!=0)
{
    $totalPost++;
}
$totalPage = $totalPost / $take;

if($totalPage < $page)
{
    header("location:index.php");
}
$sql = "SELECT * FROM posts
ORDER BY id DESC
LIMIT $skip ,$take
";
$result = mysqli_query($con,$sql);
?>
<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <title>Simple Blog Site</title>
   </head>
   <body>
   <nav class="navbar navbar-light bg-light justify-content-between">
    <div class="container">
            <a class="navbar-brand" href="index.php"><img src="admin/black-logo.png" alt=""></a>
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
Admin
</button>
    </div>
</nav>
<div class="main-content py-4">
   <div class="container-fluid">
       <div class="row">
          <div class="col-3 text-center">
              <h3>Latest News</h3>
              <ul class="list-group">
                     <li class="list-group-item"> <a href="">Country</a></li>
                     <li class="list-group-item">
                     <a href="index.php" class="btn btn-link">International</a>
                     </li>
                     <li class="list-group-item">
                     <a href="post/index.php" class="btn btn-link">Education</a>
                     </li>
                     <li class="list-group-item">
                     <a href="index.php" class="btn btn-link">Sports</a>
                     </li>
                      <li class="list-group-item">
                     <a href="index.php" class="btn btn-link">Entertainment</a>
                     </li>
                      <li class="list-group-item">
                     <a href="index.php" class="btn btn-link">Adults</a>
                     </li>
                     <li class="list-group-item">
                     <a href="index.php" class="btn btn-link">Others</a>
                     </li>
                  </ul>
          </div>
           <div class="col-6 border">
              <h3 class="text-center mt-1">All News</h3>
              <hr>
              <?php while($row = mysqli_fetch_assoc($result)){?>
               <div class="single-post">
                   <h2 class="mt-0"><a href="singlePage.php?id=<?= $row['id']; ?>"><?php echo $row['title'];?></a></h2>
                   <div class="row no-gutters">
                       <div class="col-4">
                           <img src="admin/<?php echo $row['image'] ;?>" alt="" class="img-fluid w-75">
                       </div>
                       <div class="col-8 align-self-center">
                           <?php echo substr($row['description'],0,450) ;?>
                       </div>
                   </div>
                   <hr>
               </div>
            
             <?php }?>
             <div style="margin-bottom: 15px;">
					Showing page <?php echo $page; ?> of <?php  echo $totalPage; ?> pages.
				</div>
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
              
           </div> <!-- col6 -->
           <div class="col-3 text-center">
               <h3>All Categories</h3>
               <ul class="list-group ">
                    <?php 
                   $sql = "SELECT * FROM `categories`";
                $result = mysqli_query($con,$sql);
                  while($row =mysqli_fetch_assoc($result)){
                   ?>
                     <a href=""><li class="list-group-item"><?= $row['cat_name']?> </li></a>
                     <?php }?>
                   
                  </ul>
           </div>
       </div>
   </div>
</div>
  
      <footer>
        <div class="container">
          <p class="m-0">All rights deserved | Design by Shahin with &hearts; 2020</p>
        </div>
    </footer>
    
    <!-- ADMIN MODAL -->
    <div class="modal fade text-center" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Login OR Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  <a href="user/index.php" class="btn btn-success">LOG IN</a>
  <a href="user/reg_UI.php" class="btn btn-info">REGISTER</a>
     <?php
          if(isset($_SESSION['success-login']))
          {?>
              <a href="admin/index.php" class="btn btn-primary">ADMIN PANNEL</a>
              <a href="user/logout.php" class="btn btn-danger">Logout</a>
        <?php }
          
          ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <style>
     footer{
            background: rgba(189, 195, 199, 0.85);
            color: #e74c3c;
            text-align: center;
            padding: 15px 0;
            margin-top:10px;
        }
      
        h2{
            margin: 0;
            padding: 0;
            margin-bottom: 10px;
            font-size: 22px;
        }
       </style>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   </body>
</html>