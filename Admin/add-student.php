<h1 class="text-primary"><i class="fa fa-user-plus"></i> Add Student <small>Add New Student</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-dashboard"></i> <a href="index.php?page=dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-user-plus"></i> <a href="index.php?page=add-student">Add Student</a></li>
  </ol>
</nav>
<?php
if(isset($_POST['add-student'])){
	$name = $_POST['name'];
	$roll = $_POST['roll'];
	$class = $_POST['class'];
	$city = $_POST['city'];
	$pcontact = $_POST['pcontact'];
	$picture = explode('.', $_FILES['picture']['name']);
	$picture = end($picture);
	$picture = $roll.".".$picture;
	$query = "INSERT INTO `student_info`(`name`, `roll`, `class`, `city`, `parents_contact`, `photo`) VALUES ('$name', '$roll', '$class', '$city', '$pcontact', '$picture');";
	$result = mysqli_query($link, $query);
	if($result){
		$success = "Data Insertes Successfully";
		move_uploaded_file($_FILES['picture']['tmp_name'], 'Student_Img/'.$picture);
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
				<input id="name" class="form-control" type="text" name="name" placeholder="Student Name" required="">
			</div>
			<div class="form-group">
				<label for="class">Class</label>
				<select class="form-control" name="class" id="class" required="">
					<option value="">Select</option>
					<option value="Class 1">Class 1</option>
					<option value="Class 2">Class 2</option>
					<option value="Class 3">Class 3</option>
					<option value="Class 4">Class 4</option>
					<option value="Class 5">Class 5</option>
				</select>
			</div>
			<div class="form-group">
				<label for="roll">Student Roll</label>
				<input id="roll" class="form-control" type="number" name="roll" placeholder="Roll" required="">
			</div>
			<div class="form-group">
				<label for="city">City</label>
				<input id="city" class="form-control" type="text" name="city" placeholder="City" required="">
			</div>
			<div class="form-group">
				<label for="pcontact">Parents Contact</label>
				<input id="pcontact" class="form-control" type="number" name="pcontact" placeholder="01*********" required="">
			</div>
			<div class="form-group">
				<label for="picture">Picture</label>
				<input class="form-control" type="file" id="picture" name="picture" required="">
			</div>
			<div class="form-group">
				<input type="submit" value="Add Student" name="add-student" class="btn btn-primary pull-right">
			</div>
		</form>
	</div>
</div>