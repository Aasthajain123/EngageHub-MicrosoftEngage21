<?php 
include('include/dbcon.php');
if (isset($_GET['value'])) {
	$id = $_GET['value'];
	$data = mysqli_query($sql_con,"SELECT * FROM material WHERE id='$id'");
	$row = mysqli_fetch_array($data);
	$file = $row['file'];
	if (file_exists($file)) {
		unlink($file);
	}
	mysqli_query($sql_con,"DELETE from material where id = '$id'");
	echo "<script>alert('Material successfully deleted')</script>";
	echo "<script>window.location='manage_material.php'</script>";
}
 ?>