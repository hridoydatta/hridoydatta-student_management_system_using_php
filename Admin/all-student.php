<h1 class="text-primary"><i class="fa fa-users"></i> All Student <small>All the Students</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-dashboard"></i> <a href="index.php?page=dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-users"></i> <a href="index.php?page=all-student">All Students</a></li>
  </ol>
</nav>
<div class="table-responsive">
	<table id="data" class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Roll</th>
				<th>Class</th>
				<th>City</th>
				<th>Contact</th>
				<th>Photo</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$db_info = mysqli_query($link, "SELECT * FROM `student_info`;");
			while($row = mysqli_fetch_assoc($db_info)){
			?>
			<tr>
				<td><?php echo $row['id'] ?></td>
				<td><?php echo ucwords($row['name']) ?></td>
				<td><?php echo $row['roll'] ?></td>
				<td><?php echo $row['class'] ?></td>
				<td><?php echo ucwords($row['city']) ?></td>
				<td><?php echo $row['parents_contact'] ?></td>
				<td><img src="Student_Img/<?php echo $row['photo'] ?>" style="width: 100px;"></td>
				<td><a class="btn btn-xs btn-warning" href="index.php?page=update-student&id=<?php echo  base64_encode($row['id']) ?>"><i class="fa fa-pencil"></i> Edit</a>&nbsp;&nbsp;&nbsp;<a class="btn btn-xs btn-danger" href="delete_student.php?id=<?php echo  base64_encode($row['id']) ?>"><i class="fa fa-trash"></i> Delete</a></td>
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div>