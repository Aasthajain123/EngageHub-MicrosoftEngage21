<?php 
include('include/dbcon.php');
if (isset($_GET['value'])) {
	$id = $_GET['value'];
	$data = mysqli_query($sql_con,"SELECT * FROM result WHERE id='$id'");
	$row = mysqli_fetch_array($data);
	$file = $row['file'];
	if (file_exists($file)) {
		unlink($file);
	}
	mysqli_query($sql_con,"DELETE from result where id = '$id'");
	echo "<script>alert('Result successfully deleted')</script>";
	echo "<script>window.location='manage_result.php'</script>";
}
 ?>