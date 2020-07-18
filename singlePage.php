<?php
session_start();

include('admin/include/connectDB.php');


$id = $_GET['id'];
$con = connectDB();
$sql = "SELECT posts.*, categories.cat_name as categoryTitle
            FROM posts
            JOIN categories ON posts.cat_id = categories.id
            WHERE posts.id = '$id' ";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <title>Single post page</title>
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
          <div class="col-2 text-center">
              <h3>Latest News</h3>
              <ul class="list-group">
                     <li class="list-group-item">Country</li>
                     <li class="list-group-item">
                     <a href="../categories/index.php" class="btn btn-link">International</a>
                     </li>
                     <li class="list-group-item">
                     <a href="../post/index.php" class="btn btn-link">Study</a>
                     </li>
                     <li class="list-group-item">
                     <a href="../index.php" class="btn btn-link">Sports</a>
                     </li>
                  </ul>
          </div>
          <div class="col-8 border">
              <h1><?= $data['title'] ?></h1>
              <h6>Category : <span><?= $data['categoryTitle'] ?></span></h6>
              <hr>
              <div class="col-12 text-center my-1">
                   <img src="admin/<?= $data['image'] ?>" alt="" class ="img-fluid">
              </div>
             <p class="lead"><?= $data['description'] ?></p>
          </div>
        <div class="col-2 text-center">
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
            background: rgba(189, 195, 199, 0.87);
            color: #e74c3c;
            text-align: center;
            padding: 15px 0;
            margin-top:10px;
        }
      
        h1{
            margin: 0;
            padding: 0;
            margin-bottom: 10px;
            font-size: 32px;
            color: #2c3e50;
        }
        h6 span{
            color:#3498db;
        }
        p{
            color: #2c3e50;
            text-align: justify;
            margin-top: 15px;
        }
        footer p{
            text-align: center;
            color: #e74c3c;
        }
         .main-content{
            min-height: 625px;
        }
       </style>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   </body>
</html>