<?php
session_start();
require_once 'dbcon.php';
if(!isset($_SESSION['userlogin'])){
	header('location: login.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap4.min.js"></script>
    <script src="../js/script.js"></script>
    <title>Student Management System</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="#">SMS</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<div class="navbar-nav ml-auto">
		  <a class="nav-item nav-link" href="index.php?page=dashboard"><i class="fa fa-user"></i> Welcome</a>
		  <a class="nav-item nav-link" href="registration.php"><i class="fa fa-user-plus"></i> Add User</a>
		  <a class="nav-item nav-link" href="index.php?page=user-profile"><i class="fa fa-user"></i> Profile</a>
		  <a class="nav-item nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
		</div>
	</div>
</nav>
<div class="container-fluid mt-4">
	<div style="min-height: 500px;" class="row">
		<div class="col-md-3">
			<div class="list-group">
			  <a href="index.php?page=dashboard" class="list-group-item list-group-item-action active"><i class="fa fa-dashboard"></i> Dashboard</a>
			  <a href="index.php?page=add-student" class="list-group-item list-group-item-action"><i class="fa fa-user-plus"></i> Add Student</a>
			  <a href="index.php?page=all-student" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> All Student</a>
			  <a href="index.php?page=all-users" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> All Users</a>
			  <a href="index.php?page=user-profile" class="list-group-item list-group-item-action"><i class="fa fa-user"></i> Profile</a>
			  <a href="logout.php" class="list-group-item list-group-item-action"><i class="fa fa-power-off"></i> Logout</a>
			</div>
		</div>
		<div class="col-md-9 mt-5 mt-md-0">
			<?php
			if(isset($_GET['page'])){
				$page = $_GET['page'].".php";
			} else{
				$page = "dashboard.php";
			}
			if (file_exists($page)) {
				require_once $page;
			} else{
				require_once "404.php";
			}
			?>
		</div>
	</div>
</div>
<div class="bg-primary p-3 mt-3">
<p class="text-center text-white mb-0">&copy; Copyright Hridoy Datta 2021</p>
</div>
</body>
</html>