<?php 
session_start();
if(isset($_SESSION['success-login'])){
    header("location:../index.php");
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Registration Page</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3 main-content">
                <form method="post" action ="reg.php" enctype="multipart/form-data">
                 <?php
                    if(isset($_SESSION['doubleEmail'])){?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>Account alreay exists : )</strong> Please login! 
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div> <?php }?> 
                      <?php
                    if(isset($_SESSION['doubleName'])){?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>User name already exists : )</strong> Please Try again! 
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div> <?php }?> 
                <?php
                    if(isset($_SESSION['invalid_pass'])){?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Password doesn't match : )</strong> Please try again! 
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div> <?php }?>
                    <style>
                    .main-content{
                      padding : 20px;
                      border:2px solid #f1c40f;
                      margin-top: 50px;
                      box-shadow: 1px 1px 6px transparent;
                     border-radius : 5px;
                      transition:.6s;
                    }
                    .main-content:hover{
                      box-shadow: 1px 1px 6px #f1c40f;
            
                    </style>
                    <?php
                    if(isset($_SESSION['insert_sucess'])){?>
                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Sucessfuly registration!</strong> Please login! 
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div> <?php }?>
                 <h3 class="text-center">Please Registration</h3>
                 <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control"placeholder="Enter name" required name="name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">User Name</label>
                    <input type="text" class="form-control"placeholder="User name" required name="username">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control"placeholder="Enter email" name="email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control"  placeholder="Password" name="pass" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" class="form-control"  placeholder="Confirm Password" name="conPass"> 
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" class="form-control"  name="image"> 
                  </div>
                  <button type="submit" class="btn btn-primary w-100 mb-1 mt-2" name="btn">Submit</button>
                    </form>
                    <a href="index.php" class="btn btn-info mt-1 w-100">Login</a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
  
  <style>
     
      form h3{
          margin-top: 20px;
      }
      body{
          background: #ecf0f1;
      }
    </style>
</html>


<?php

unset($_SESSION['invalid_pass']);
unset($_SESSION['insert_sucess']);
unset($_SESSION['doubleEmail']);
unset($_SESSION['doubleName']);
?>
