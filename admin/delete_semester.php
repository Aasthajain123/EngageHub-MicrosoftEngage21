<?php 
include('include/dbcon.php');
if (isset($_GET['value'])) {
	$id = $_GET['value'];
	mysqli_query($sql_con,"DELETE from semester where id = '$id'");
	echo "<script>alert('Semester deleted successfully')</script>";
	echo "<script>window.location = 'manage_semester.php'</script>";
}
 ?>