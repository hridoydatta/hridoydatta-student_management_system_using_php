<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Student Management System</title>
  </head>
  <body>
    <div class="container">
    	<br>
    	<a class="btn btn-primary login_admin" href="Admin/login.php">Login</a>
    	<br><br>
    	<h2 class="text-center">Welcome to Student Management System</h2>
    	<br>
    	<div class="row">
    		<div class="col-sm-4"></div>
    		<div class="col-sm-4">
	    		<form action="" method="post">
		    		<table class="table table-bordered">
		    			<tr>
		    				<td class="text-center" colspan="2"><label>Student Information</label></td>
		    			</tr>
		    			<tr>
		    				<td><label for="chose">Chose Class</label></td>
		    				<td>
		    					<select class="form-control" id="chose" name="chose">
		    						<option value="">Select</option>
		    						<option value="Class 1">Class 1</option>
		    						<option value="Class 2">Class 2</option>
		    						<option value="Class 3">Class 3</option>
		    						<option value="Class 4">Class 4</option>
		    						<option value="Class 5">Class 5</option>
		    					</select>
		    				</td>
		    			</tr>
		    			<tr>
		    				<td><label for="roll">Roll</label></td>
		    				<td><input class="form-control" type="number" placeholder="Enter student Roll" name="roll"></td>
		    			</tr>
		    			<tr>
		    				<td colspan="2" class="text-center">
		    					<input class="btn btn-default" type="submit" name="show_info" value="Show Info">
		    				</td>
		    			</tr>
		    		</table>
	    		</form>
    		</div>
    		<div class="col-sm-4"></div>
    	</div>
    	<br><br>
    	<?php
    	require_once 'Admin/dbcon.php';
    	if(isset($_POST['show_info'])){
    		$class = $_POST['chose'];
    		$roll = $_POST['roll'];
    		$result = mysqli_query($link,"SELECT * FROM `student_info` WHERE `roll`=$roll AND `class`='$class'");
    		if(mysqli_num_rows($result)==1){
    			$row = mysqli_fetch_assoc($result);
    	?>
    	<div class="row">
    		<div class="col-md-3"></div>
    		<div class="col-md-6">
    			<table class="table table-bordered">
    				<tr>
    					<td rowspan="5"><img style="height: 200px; width: 200px;" src="Admin/Student_Img/<?php echo $row['photo']; ?>" class="img-thumbnail" alt="student_photo"></td>
    					<td>Name</td>
    					<td><?php echo $row['name']; ?></td>
    				</tr>
    				<tr>
    					<td>Roll</td>
    					<td><?php echo $row['roll']; ?></td>
    				</tr>
    				<tr>
    					<td>Class</td>
    					<td><?php echo $row['class']; ?></td>
    				</tr>
    				<tr>
    					<td>City</td>
    					<td><?php echo $row['city']; ?></td>
    				</tr>
    				<tr>
    					<td>Parent Contact</td>
    					<td><?php echo $row['parents_contact'];?></td>
    				</tr>
    			</table>
    		</div>
    		<div class="col-md-3"></div>
    	</div>
    	<?php
    		}
    		else{
    			?>
    			<script>
    				alert("Data Not Found");
    			</script>
    			<?php
    		}
    	}
    	?>
    </div>
   <script src="js/jquery-slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>