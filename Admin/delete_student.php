<?php
require_once 'dbcon.php';
if(isset($_GET['id'])){
	$id = base64_decode($_GET['id']);
	$query = mysqli_query($link, "DELETE FROM student_info WHERE id = $id;");
	header("location: index.php?page=all-student");
}
?>