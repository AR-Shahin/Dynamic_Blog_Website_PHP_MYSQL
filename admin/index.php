<?php 
session_start();
if(!isset($_SESSION['success-login'])){
    header("location:../404.php");
    die();
}
include('include/connectDB.php');
$con = connectDB();
$id =  $_SESSION['user_id'] ;
$sql = "SELECT * FROM `admins`WHERE id = $id ";
$result = mysqli_query($con,$sql);
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

    <title>Admin page</title>
  </head>
  <body>
    <!-- Image and text -->
    <nav class="navbar navbar-light bg-light justify-content-between">
    <div class="container">
        <a class="navbar-brand" href="../index.php"><img src="black-logo.png" alt=""></a>
            <h6>Dashboard</h6>
            </div>
</nav>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">View Profile</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                                                      <table class="table table-bordered">
                                      <tbody>
                                        <tr>
                                          <th scope="row">Name  </th>
                                          <td><?= $data['name'];?></td>
                                        </tr>
                                        <tr>
                                          <th scope="row">User Name </th>
                                          <td><?= $data['username'];?></td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Email</th>
                                          <td><?= $data['email'];?></td>
                                        </tr>
                                         <tr>
                                          <th scope="row">Password</th>
                                          <td><?= $data['password'];?></td>
                                        </tr>
                                      </tbody>
                                    </table>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
    <div class="user-content my-1">
        <div class="container">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h3>Hello <span style="font-size:18px;"><?php echo $data['name'] ;?></span></h3>
                </div>
                <div class="col-4 align-self-center text-center">
                     <?php
                    if(isset($_SESSION['success-login-alert'])) {?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Successfully login !!</strong> 
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div> <?php }?>
                </div>
                <div class="col-3 user-img">
                   <div class="img-box">
                       <img src="../user/img/<?= $data['image'] ;?>" alt="" class="img-fluid">
                   </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content py-3" style="background:#ecf0f1">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <div class="list-group">
                  <button type="button" class="list-group-item list-group-item-action active">
                    Dashboard
                  </button>
                  <a type="button" class="list-group-item list-group-item-action" href="../index.php">Website</a>
                  <a type="button" class="list-group-item list-group-item-action" href="categories/index.php">Category</a>
                  <a type="button" class="list-group-item list-group-item-action" href="post/index.php">Post</a>
                  <a type="button" class="list-group-item list-group-item-action" href="">Statistics</a>
                  <a type="button" class="list-group-item list-group-item-action" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">View Profile</a>
                  <a type="button" class="list-group-item list-group-item-action">Update Profile</a>
                  <a type="button" class="list-group-item list-group-item-action bg-danger" href="../user/logout.php"><span style="color:#fff">Logout</span></a>
                </div>
                </div>
                
                <?php 
                $sql = "SELECT * FROM posts";
                $res = mysqli_query($con,$sql);
                $data = mysqli_num_rows($res);
                ?>
                <div class="col-9">
                  <div class="row">
                      <div class="col-4">
                          <div class="card text-center" style="border:1.5px solid #2d3436">
                              <h5 class="card-title mt-3">Total Post</h5>  
                               <div class="card-footer">
                                   <h6><?= $data?></h6>
                               </div>
                          </div>
                      </div>
                           <?php 
                            $sql = "SELECT * FROM categories";
                            $res = mysqli_query($con,$sql);
                            $data = mysqli_num_rows($res);
                            ?>
                       <div class="col-4">
                          <div class="card text-center" style="border:1.5px solid #2d3436">
                              <h5 class="card-title mt-3">Total Category</h5>  
                               <div class="card-footer">
                                   <h6><?= $data?></h6>
                               </div>
                          </div>
                      </div>
                  </div>
                  
                  
                  
                  
 
                    </div>      
                 
                </div>
            </div>
        </div>
    <footer>
        <div class="container">
            <p class="m-0">All rights deserved | Design by Shahin with &hearts; 2020</p>
        </div>
    </footer>
    <style>
        .img-box{
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 2px solid #0984e3;
            display: flex;
         overflow: hidden;
            background: #636e72;
            align-items: center;
            justify-content: center;
        }
        .user-img{
            display: flex;
            justify-content: flex-end;
        }
        .img-box img{
            width: 100%;
        }
        footer{
            background: #bdc3c7;
            color: #e74c3c;
            text-align: center;
            padding: 15px 0;
        }
        .main-content{
            min-height: 547px;
        }
      </style>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
</html>






<?php 
unset($_SESSION['success-login-alert']);
?>