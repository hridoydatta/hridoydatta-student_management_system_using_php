<h1 class="text-primary"><i class="fa fa-pencil-square-o"></i> Update Student <small>Edit Student Information</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-dashboard"></i> <a href="index.php?page=dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-users"></i> <a href="index.php?page=all-student">All Student</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-pencil-square-o"></i> <a href="index.php?page=update-student">Update Student</a></li>
  </ol>
</nav>
<?php
$id = base64_decode($_GET['id']);
$db_data = mysqli_query($link, "SELECT * FROM student_info WHERE id = $id;");
$db_row = mysqli_fetch_assoc($db_data);
if(isset($_POST['update-student'])){
	$name = $_POST['name'];
	$roll = $_POST['roll'];
	$class = $_POST['class'];
	$city = $_POST['city'];
	$pcontact = $_POST['pcontact'];
	$query = "UPDATE `student_info` SET `name`='$name', `roll`=$roll, `class`='$class', `city`='$city',`parents_contact`=$pcontact WHERE `id` =$id";
	$result = mysqli_query($link, $query);
	if($result){
		$success = "Data Updated Successfully";
		header("location: index.php?page=all-student");
	} else{
		$error = "Wrong";
	}
}
?>
<div class="row">
	<div class="col-sm-6">
		<?php
		if(isset($success)){
			echo "<p class='alert alert-success'>$success</p>";
		}
		if(isset($error)){
			echo "<p class='alert alert-danger'>$error</p>";
		}
		?>
	</div>
</div>
<div class="row">
	<div class="col-sm-6">
		<form action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="name">Student Name</label>
				<input id="name" class="form-control" type="text" name="name" value="<?php echo $db_row['name'] ?>" required="">
			</div>
			<div class="form-group">
				<label for="roll">Student Roll</label>
				<input id="roll" class="form-control" type="number" name="roll" value="<?php echo $db_row['roll'] ?>" required="">
			</div>
			<div class="form-group">
				<label for="class">Class</label>
				<select class="form-control" name="class" id="class" required="">
					<option value="<?php echo $db_row['class'] ?>"><?php echo $db_row['class'] ?></option>
					<option value="Class 1">Class 1</option>
					<option value="Class 2">Class 2</option>
					<option value="Class 3">Class 3</option>
					<option value="Class 4">Class 4</option>
					<option value="Class 5">Class 5</option>
				</select>
			</div>
			<div class="form-group">
				<label for="city">City</label>
				<input id="city" class="form-control" type="text" name="city" value="<?php echo $db_row['city'] ?>" required="">
			</div>
			<div class="form-group">
				<label for="pcontact">Parents Contact</label>
				<input id="pcontact" class="form-control" type="number" name="pcontact" value="<?php echo $db_row['parents_contact'] ?>" required="">
			</div>
			<div class="form-group">
				<input type="submit" value="Update Student" name="update-student" class="btn btn-primary pull-right">
			</div>
		</form>
	</div>
</div>