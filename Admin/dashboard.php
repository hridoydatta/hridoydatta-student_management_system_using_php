<div class="content">
	<h1 class="text-primary"><i class="fa fa-dashboard"></i> Dashboard <small>statistics overview</small></h1>
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-dashboard"></i> Dashboard</li>
	  </ol>
	</nav>
	<?php 
	$count_student = mysqli_query($link,"SELECT * FROM `student_info`");
	$total_student = mysqli_num_rows($count_student);
	$count_user = mysqli_query($link,"SELECT * FROM `users`");
	$total_user = mysqli_num_rows($count_user);
	?>
	<div class="row">
		<div class="col-lg-4 mb-4 mb-lg-0">
			<div class="bg-primary" style="box-shadow: 1px 1px 10px; border-radius: 5px;">
				<div class="p-3 text-light mb-0">
					<i class="fa fa-users fa-5x"></i>
					<div class="pull-right">
						<p class="mb-0" style="font-size: 40px; float: right;"><?php echo $total_student; ?></p>
						<br>
						<p class="mb-0" style="float: right;">All Students</p>
					</div>
				</div>
				<div class="bg-light">
				   	<a href="index.php?page=all-users">
					  	<div style="padding: 10px;">
					  		<span class="ml-1">View All Students</span>
					  		<span class="text-primary mr-1" style="float: right;"><i class="fa fa-arrow-circle-o-right"></i></span>
					  	</div>
				    </a>
				</div>
			</div>
		</div>
		<div class="col-lg-4 mb-4 mb-lg-0">
			<div class="bg-primary" style="box-shadow: 1px 1px 10px; border-radius: 5px;">
				<div class="p-3 text-light mb-0">
					<i class="fa fa-users fa-5x"></i>
					<div class="pull-right">
						<p class="mb-0" style="font-size: 40px; float: right;"><?php echo $total_user; ?></p>
						<br>
						<p class="mb-0" style="float: right;">All Users</p>
					</div>
				</div>
				<div class="bg-light">
				   	<a href="index.php?page=all-users">
					  	<div style="padding: 10px;">
					  		<span class="ml-1">View All Users</span>
					  		<span class="text-primary mr-1" style="float: right;"><i class="fa fa-arrow-circle-o-right"></i></span>
					  	</div>
				    </a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>
<h3 class="mt-5 mb-4">New Students</h3>
<div class="table-responsive">
	<table id="data" class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Roll</th>
				<th>City</th>
				<th>Contact</th>
				<th>Photo</th>
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
				<td><?php echo ucwords($row['city']) ?></td>
				<td><?php echo $row['parents_contact'] ?></td>
				<td><img src="Student_Img/<?php echo $row['photo'] ?>" style="width: 100px;"></td>
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div>