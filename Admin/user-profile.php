<h1 class="text-primary"><i class="fa fa-user"></i> User Profile <small>My Profile</small></h1>
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
<div class="row">
	<div class="col-sm-6">
		<table class="table table-bordered">
			<tr>
				<td>User Id</td>
				<td><?php echo $user_row['id']; ?></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><?php echo ucwords($user_row['name']); ?></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><?php echo $user_row['username']; ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?php echo $user_row['email']; ?></td>
			</tr>
			<tr>
				<td>Status</td>
				<td><?php echo ucwords($user_row['status']); ?></td>
			</tr>
			<tr>
				<td>Signup Date</td>
				<td><?php echo $user_row['datetime']; ?></td>
			</tr>
		</table>
		<a href="index.php?page=update-user-profile" class="btn btn-info btn-sm pull-right">Edit Profile</a>
	</div>

	<div class="col-sm-6">
		<img src="Images/<?php echo $user_row['photo']; ?>" alt="my profile" class="img-thumbnail" style="width: 190px; height: 190px;">
		<br><br>

		<?php 
		if(isset($_POST['upload'])){
			$photo = explode(".", $_FILES['photo']['name']);
  			$photo = end($photo);
  			$photo_name = $sesson_user.".".$photo;

  			$upload = mysqli_query($link, "UPDATE `users` SET `photo`= '$photo_name' WHERE `username`='$sesson_user';");
  			if($upload){
  				move_uploaded_file($_FILES['photo']['tmp_name'], 'Images/'.$photo_name);
  			}
		}
		?>

		<form action="" enctype="multipart/form-data" method="post">
			<label for="photo"><b>Profile Picture</b></label><br>
			<input type="file" name="photo" required="" id="photo"><br><br>
			<input type="submit" value="Upload" name="upload" class="btn btn-sm btn-info">
		</form>
	</div>
</div>