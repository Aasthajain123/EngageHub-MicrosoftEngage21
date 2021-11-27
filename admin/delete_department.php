<?php 
include('include/dbcon.php');
if (isset($_GET['value'])) {
	$id =$_GET['value'];
	mysqli_query($sql_con,"DELETE from departments where id = '$id'");
	echo "<script>alert('Department Successfully Deleted')</script>";
	echo "<script>window.location = 'manage_department.php'</script>";
}
?>
