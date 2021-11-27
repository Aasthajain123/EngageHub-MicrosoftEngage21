<?php 
include('include/dbcon.php');
if (isset($_GET['value'])) {
	$id = $_GET['value'];
	$data = mysqli_query($sql_con,"SELECT * FROM noticeboard WHERE id='$id'");
	$row = mysqli_fetch_array($data);
	$file = $row['file'];
	if (isset($file)) {
		unlink($file);
	}
	mysqli_query($sql_con,"DELETE from noticeboard where id = '$id'");
	echo "<script>alert('File successfully deleted')</script>";
	echo "<script>window.location='manage_noticeboard.php'</script>";
}
 ?>