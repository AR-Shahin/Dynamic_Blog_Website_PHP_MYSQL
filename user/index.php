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

    <title>Login Page</title>
  </head>
  <body >
    <div class="container">
    <div class="success-logout-text text-center">
    <?php  if(isset($_SESSION['logout-txt'])){ ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Logout success!! </strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php }?>
    </div>
        <div class="row">
            <div class="col-6 offset-3 main-content">
                <form method="post" action="login.php"> 
                <?php
                    if(isset($_SESSION['wrong-try'])) {?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Please Login : )</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div> <?php }?>


                    <style>
                    .main-content{
                      padding : 20px;
                      border:2px solid #f1c40f;
                      margin-top: 150px;
                      box-shadow: 1px 1px 6px transparent;
                     border-radius : 5px;
                      transition:.6s;
                    }
                    .main-content:hover{
                      box-shadow: 1px 1px 6px #f1c40f;
            
                    </style>
                <?php
                    if(isset($_SESSION['invalid_email_pass'])) {?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Invalid User and Password : )</strong> Please try again! 
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div> <?php }?>
                 <h3 style="text-align :center;">Please login</h3>
                  <div class="form-group">
                    <label for="exampleInputEmail1">User Name : </label>
                    <input type="text" class="form-control"placeholder="User name" name ="username" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password : </label>
                    <input type="password" class="form-control"  placeholder="Password" name="password">
                  </div>
              
                  <button type="submit" class="btn btn-primary d-block" name="btn">Submit</button>
                    </form>
                    <a href="../index.php" class="btn btn-info mt-1 d-block">Back to Website</a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
  
  <style>
     body{
       background-color: #ecf0f1;
     }
      form h3{
          margin-top: 20px;
      }
      .btn.btn-primary.d-block {
    display: block;
    width: 100%;
    margin-bottom: 6px;
}
    </style>
</html>
<?php 
unset($_SESSION['invalid_email_pass']);
unset($_SESSION['wrong-try']);
unset($_SESSION['logout-txt']);
?>