<?php 
require_once 'dbcon.php';
session_start();
if(isset($_POST['registration'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $c_password = $_POST['c_password'];
  $photo = explode(".", $_FILES['photo']['name']);
  $photo = end($photo);
  $photo_name = $username.".".$photo;

  $input_error = array();
  if(empty($name)){
    $input_error['name'] = "The name filed is required";
  }
  if(empty($email)){
    $input_error['email'] = "The email filed is required";
  }
  if(empty($username)){
    $input_error['username'] = "The username filed is required";
  }
  if(empty($password)){
      $input_error['password'] = "The password filed is required";
    }
  if(empty($c_password)){
    $input_error['c_password'] = "The confirm password filed is required";
  }
  if(count($input_error) == 0){
    $ck_mail = mysqli_query($link,"SELECT * FROM `users` WHERE `email` = '$email';");
    if(mysqli_num_rows($ck_mail) == 0){
      $ck_user = mysqli_query($link,"SELECT * FROM `users` WHERE `username` = '$username';");
      if(mysqli_num_rows($ck_user) == 0){
        if(strlen($password) > 7){
          if($c_password == $password){
            $password = md5($password);
            $query = "INSERT INTO `users`(`name`, `email`, `username`, `password`, `photo`, `status`) VALUES ('$name', '$email', '$username', '$password', '$photo_name', 'active');";
            $result = mysqli_query($link, $query);
            if($result){
              $_SESSION['data_insart_success'] = "Data insarted successfully";
              move_uploaded_file($_FILES['photo']['tmp_name'], 'Images/'.$photo_name);
              header('location:registration.php');

            }
            else{
              $_SESSION['data_insart_error'] = "Data insarted error";
            }
          } else{
            $input_error['c_password'] = "Don't matched";
          }
        } else{
          $input_error['password'] = "Password more than 8 character";
        }
      } else{
        $input_error['username'] = "This username already exits";
      }
    } else{
      $input_error['email'] = "This email address already exits";
    }
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Student Management System</title>
  </head>
  <body>
     <div class="container">
     	<br>
    	<h2>User Registration Form</h2>
        <?php
        if(isset($_SESSION['data_insart_success'])){
          echo "<div class='alert alert-success'>".$_SESSION['data_insart_success']."</div>";
        }
        if(isset($_SESSION['data_insart_error'])){
          echo "<div class='alert alert-warning'>".$_SESSION['data_insart_error']."</div>";
        }
        ?>
    	<hr>
      <div class="row">
        <div class="col-md-12">
          <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="form-group">
              <label for="name" class="control-label col-sm-1">Name</label>
              <div class="col-sm-4">
                <input class="form-control" id="name" type="text" name="name" placeholder="Enter your name" value="<?php if(isset($name)){ echo $name;} ?>">
              </div>
              <label class="error ml-3">
                <?php 
                if(isset($input_error['name'])){
                  echo $input_error['name'];
                }
                ?>
              </label>
            </div>
              <div class="form-group">
              <label for="email" class="control-label col-sm-1">Email</label>
              <div class="col-sm-4">
                <input class="form-control" id="email" type="email" name="email" placeholder="Enter your email" value="<?php if(isset($email)){ echo $email;} ?>">
              </div>
              <label class="error ml-3">
                <?php 
                if(isset($input_error['email'])){
                  echo $input_error['email'];
                }
                ?>
              </label>
            </div>
              <div class="form-group">
              <label for="username" class="control-label col-sm-1">Username</label>
              <div class="col-sm-4">
                <input class="form-control" id="username" type="text" name="username" placeholder="Enter your username" value="<?php if(isset($username)){ echo $username;} ?>">
              </div>
              <label class="error ml-3">
                <?php 
                if(isset($input_error['username'])){
                  echo $input_error['username'];
                }
                ?>
              </label>
            </div>
              <div class="form-group">
              <label for="password" class="control-label col-sm-1">Password</label>
              <div class="col-sm-4">
                <input class="form-control" id="password" type="password" name="password" placeholder="Enter your password" value="<?php if(isset($password)){ echo $password;} ?>">
              </div>
              <label class="error ml-3">
                <?php 
                if(isset($input_error['password'])){
                  echo $input_error['password'];
                }
                ?>
              </label>
            </div>
              <div class="form-group">
              <label for="c_password" class="control-label col-sm-2">Confirm Password</label>
              <div class="col-sm-4">
                <input class="form-control" id="c_password" type="password" name="c_password" placeholder="Enter confirm password" value="<?php if(isset($c_password)){ echo $c_password;} ?>">
              </div>
              <label class="error ml-3">
                <?php 
                if(isset($input_error['c_password'])){
                  echo $input_error['c_password'];
                }
                ?>
              </label>
            </div>
              <div class="form-group">
              <label for="photo" class="control-label col-sm-1">Photo</label>
              <div class="col-sm-4">
                <input id="photo" type="file" name="photo">
              </div>
            </div>
            <div class="col-sm-4">
                <input class="btn btn-primary" type="submit" value="Registration" name="registration">
            </div>
          </form>
        </div>
      </div>
      <br>
      <p>If you have an account then <a href="login.php">Login</a></p>
    </div>
  </body>
</html>