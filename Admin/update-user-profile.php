<h1 class="text-primary"><i class="fa fa-user"></i> Edit Profile <small>Update My Profile</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-dashboard"></i> <a href="index.php?page=dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-user"></i> <a href="index.php?page=user-profile">My Profile</a></li>
  </ol>
</nav>
<?php
$sesson_user = $_SESSION['userlogin'];
$user_data = mysqli_query($link,"SELECT * FROM `users` WHERE `username`= '$sesson_user';");
$user_row = mysqli_fetch_assoc($user_data);
?>
<?php
if(isset($_POST['update'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$query = "UPDATE `users` SET `name`='$name',`email`='$email' WHERE `username`='$sesson_user'";
	$result = mysqli_query($link, $query);
	if($result){
		$res = "Data Updated Successfully";
		$sesson_user = $_SESSION['userlogin'];
	} else{
		$res = "Wrong";
	}
}
?>
<div class="row">
	<div class="col-md-6">
		<?php if(isset($res)){ echo "<div class='alert alert-success'>".$res."</div>"; } ?>
		<form action="" method="post">
			<label>Name</label>
			<input name="name" class="form-control" type="text" value="<?php echo ucwords($user_row['name']); ?>"><br>
			<label>Email</label>
			<input name="email" class="form-control" type="email" value="<?php echo $user_row['email']; ?>"><br>
			<input class="btn btn-success" type="submit" value="Update" name="update">
		</form>
	</div>
</div>