<h1 class="text-primary"><i class="fa fa-users"></i> All Users <small>All the Users</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-dashboard"></i> <a href="index.php?page=dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-users"></i> <a href="index.php?page=all-users">All Users</a></li>
  </ol>
</nav>
<div class="table-responsive">
	<table id="data" class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Email</th>
				<th>User Name</th>
				<th>Photo</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$db_info = mysqli_query($link, "SELECT * FROM `users`;");
			while($row = mysqli_fetch_assoc($db_info)){
			?>
			<tr>
				<td><?php echo $row['id'] ?></td>
				<td><?php echo $row['name'] ?></td>
				<td><?php echo $row['email'] ?></td>
				<td><?php echo $row['username'] ?></td>
				<td><img src="Images/<?php echo $row['photo'] ?>" style="width: 100px;"></td>
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div>