<?php 
session_start();
if(isset($_SESSION['userlogin'])){
  header('location: index.php');
}
require_once 'dbcon.php';
if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $username_check = mysqli_query($link,"SELECT * FROM `users` where `username`= '$username';");
  if (mysqli_num_rows($username_check) > 0){
    $row = mysqli_fetch_assoc($username_check);
    if($row['password'] == md5($password)){
      if($row['status'] == 'active'){
        $_SESSION['userlogin'] = $username;
        header('location: index.php');
      } else{
        $status_inactive = "Status inactive";
      }
    } else{
      $wrong_password = "This password wrong";
    }
  } else{
    $username_not_found = "This username not found";
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
    	<h2 class="text-center">Welcome to Student Management System</h2>
    	<br>
    	<h2 class="text-center">Admin Login Form</h2>
    	<br>
    	<div class="row">
    		<div class="col-sm-4"></div>
    		<div class="col-sm-4">
	    		<form action="" method="post">
		    		Username : <input type="text" name="username" required="" class="form-control" value="<?php if(isset($username)){ echo $username; } ?>">
		    		Password : <input type="password" name="password" required="" class="form-control" value="<?php if(isset($password)){ echo $password; } ?>">
		    		<br>
		    		<input class="btn btn-outline-info" type="submit" name="login" value="Login">
	    		</form>
    		</div>
    		<div class="col-sm-4"></div>
    	</div>
      <br>
      <div class="row">
        <div class="col col-sm-4"></div>
          <?php
          if(isset($username_not_found)){
            echo '<div class="alert alert-danger col col-sm-4">'.$username_not_found.'</div>';
          }
          if(isset($wrong_password)){
            echo '<div class="alert alert-danger col col-sm-4">'.$wrong_password.'</div>';
          }
          if(isset($status_inactive)){
            echo '<div class="alert alert-danger col col-sm-4">'.$status_inactive.'</div>';
          }
          ?>
        <div class="col col-sm-4"></div>
      </div>
    </div>
  </body>
</html>